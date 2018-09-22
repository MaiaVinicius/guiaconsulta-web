<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resource {
	//
	protected $resourceConfig;

	function __construct( $resource ) {
		$this->resourceConfig = $this->getResourceConfig( $resource );

	}

	/**
	 * @param $resource
	 *
	 * @return \stdClass
	 */
	private function getResourceConfig( $resource ) {
		$res = DB::table( 'sys_resources' )
//		         ->select( [ "id", "resource_name" ] )
                 ->select( [ "*" ] )
		         ->where( [ "resource_table" => $resource ] )
		         ->orWhere( [ "id" => $resource ] )
		         ->first();

		return $res;
	}

	/**
	 * @return \stdClass
	 */
	private function getFields() {
		$res = DB::select( "
SELECT sf.*, subres.resource_table, subres.search_column FROM sys_fields sf 
INNER JOIN sys_resources_fields srf ON srf.field_id=sf.id
LEFT JOIN sys_resources subres ON subres.id=sf.search_resource_id 
WHERE srf.resource_id=?", [ $this->resourceConfig->id ] );

		foreach ( $res as $key => $item ) {
			if ( in_array( $item->field_type_id, [ 2, 5, 6 ] ) ) {
				$subres = DB::table( $item->resource_table );
				$subres->select( [ "id", $item->search_column ] );
				$subres->limit( 100 );

				$res[ $key ]->data = $subres->get();
			}
		}

		return $res;
	}

	/**
	 * @param string|bool $keyword
	 *
	 * @return bool|array
	 */
	public function search( $keyword = false ) {

		if ( $this->resourceConfig ) {
			$t = DB::table( $this->resourceConfig->resource_table );

			if ( $keyword ) {
				$t->whereRaw( "{$this->resourceConfig->search_column} LIKE '%{$keyword}%'" );
			}

			if ( $this->resourceConfig->search_column ) {
				$t->orderBy( $this->resourceConfig->search_column );
			}
			$t->limit( 100 );

			$res = $t->get();

			return $res;
		}

		return false;

	}

	/**
	 * @param int $id
	 *
	 * @return bool
	 */
	public function getById( $id ) {
		if ( $this->resourceConfig ) {
			$t = DB::table( $this->resourceConfig->resource_table );

			$t->where( [ "id" => $id ] );

			$res = $t->first();

			return $res;
		}

		return false;
	}

	/**
	 * @param array $data
	 * @param int $id
	 *
	 * @return int|bool
	 */
	public function updateById( $data, $id ) {
		if ( $this->resourceConfig->is_public ) {

			$t = DB::table( $this->resourceConfig->resource_table );

			$t->where( [ "id" => $id ] );

//			pega o registro atual antes da anteracao
			$oldData = $t->first();

//			altera o registro
			$affected = $t->update( $data );

//			loga o que foi alterado
			if ( $affected ) {
				$logId = $this->addLog( $id, "U" );

				$fields = $this->getFields();

				foreach ( $fields as $field ) {
					$key = $field->column_name;

					if ( isset( $data[ $key ] ) ) {
						if ( $data[ $key ] != $oldData->$key ) {
							$this->addFieldLog( $logId, $oldData->$key, $data[ $key ], $field->id );
						}
					}
				}
			}

			return $affected;

		}

		return false;
	}

	/**
	 * @return array
	 */
	public function getForm() {
		$fields = $this->getFields();

		return [
			"form_name" => $this->resourceConfig->resource_name,
			"table"     => $this->resourceConfig->resource_table,
			"fields"    => $fields
		];

	}

	/**
	 * @param int $id
	 *
	 * @return int|bool
	 */
	public function deleteById( $id ) {
		if ( $this->resourceConfig->is_public ) {
			$affected = DB::table( $this->resourceConfig->resource_table )
			              ->where( [
				              "id" => $id
			              ] )->update( [
					"active" => 0
				] );
			if ( $affected ) {
				$this->addLog( $id, "D" );
			}

			return $id;
		}

		return false;
	}

	/**
	 * @param int $logId
	 * @param string $oldValue
	 * @param string $newValue
	 * @param int $fieldId
	 *
	 * @return int|bool
	 */
	private function addFieldLog( $logId, $oldValue, $newValue, $fieldId ) {
		return DB::table( 'sys_resources_fields_log' )->insertGetId( [
			'resource_log_id' => $logId,
			'field_id'        => $fieldId,
			'old_value'       => $oldValue,
			'new_value'       => $newValue,
		] );
	}

	/**
	 * @param int $affectedId
	 * @param string $operation CRUD
	 *
	 * @return int|bool
	 */
	private function addLog( $affectedId, $operation = "U" ) {
		return DB::table( 'sys_resources_log' )->insertGetId( [
			'user_id'     => 0,
			'resource_id' => $this->resourceConfig->id,
			'operation'   => $operation,
			'affected_id' => $affectedId,
		] );
	}

	/**
	 * @param array $data
	 *
	 * @return bool|int
	 */
	public function create( $data ) {
		if ( $this->resourceConfig->is_public ) {
			$t = DB::table( $this->resourceConfig->resource_table );

			$id = $t->insertGetId( $data );

			if ( $id ) {
				$logId = $this->addLog( $id, "C" );

				$fields = $this->getFields();

				foreach ( $fields as $field ) {
					$key = $field->column_name;

					if ( isset( $data[ $key ] ) ) {
						$this->addFieldLog( $logId, null, $data[ $key ], $field->id );
					}
				}

				return $id;
			}
		}

		return false;
	}

	public function getLogs( $affectedId, $userId ) {
		$res = DB::select( "
SELECT l.* FROM sys_resources_log l  
WHERE l.resource_id=? AND l.user_id=? AND l.affected_id=?",
			[ $this->resourceConfig->id, $userId, $affectedId ] );

		foreach ( $res as $key => $item ) {
			$changes = DB::select( "
SELECT fl.*, sf.column_name, sf.label FROM sys_resources_fields_log fl
INNER JOIN sys_fields sf ON sf.id=fl.field_id
WHERE fl.resource_log_id=?",
				[ $item->id ] );

			$res[ $key ]->changes = $changes;
		}

		return $res;
	}
}
