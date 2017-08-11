<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professional extends Model {
	protected $fillable = [ 'name', 'gender_id', 'birthdate' ];
	protected $dates = [ 'deleted_at' ];

	function specialty() {
		return $this->belongsTo('App\User');
	}
}
