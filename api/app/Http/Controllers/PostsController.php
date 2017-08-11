
<?php

use Illuminate\Http\Request;

class PostsController
{
	public function get()
	{
		$posts = App\Post::all();

		return response()->success('posts', $posts);
	}

	public function update(Request $request)
	{
		$this->validate($request, [
			'title' => 'required',
			'url'   => 'required|url',
		]);

		if ( !\Auth::user() ){
			return response()->error('Not Authorized', 401);
		}
	}

}