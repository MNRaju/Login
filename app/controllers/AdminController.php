<?php

class AdminController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{

		return View::make('admin.index');
		
	}

	//New Modifications on 09-10-2014
	public function getUsers()
	{
		$users = User::all();	
		return View::make('admin.users')->with('users',$users );
	}
	public function getSearchUsers($username)
	{
		//$users = User::all();	
		$users = DB::table('users')->where('username','=', $username)->get();
		return View::make('admin.users')->with('users',$users );
	}
	


	public function getDropCatgories()
	{
		$cate = Categorie::all();	
		return View::make('register')->with('categories',$cate );
	}

	public function destroy($id)
	{
		//delete
		//echo "Test";
		$users = User::find($id);
		$users->delete();

		//redirect
		//Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('admin/users');
	}



	public function edit($id)
	{
		
		//echo "Test";
		//get the nerd
		$users = User::find($id);
		//print_r($users);

		// show the edit form and pass the nerd
		return View::make('admin.edit')->with('user', $users);
	}

	
	public function update($id)
	{
		
		// validate
		// read more on validation at http://laravel.com/docs/validation

	//rules = array('username'       => 'required', 'email'          => 'required|email', 		'password'       => 'required' 		);

		$password   = Input::get('password');
		if($password!="")
		{
			$rules = array(
				'username'       => 'required',
				'email'          => 'required|email',
				'password'       => 'required'
			);
		}
		else
		{
			$rules = array(
				'username'       => 'required',
				'email'          => 'required|email'
			);
		}


		$validator = Validator::make(Input::all(), $rules);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('admin/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$users = User::find($id);

			
			//$password = $users['password'];




			if($password!="")
			{
				$password = Hash::make($password);
				$users->username   = Input::get('username');
				$users->email      = Input::get('email');
				//$users->password   = Input::get('password');
				$users->password   = $password;
			}
			else
			{
			
				$users->username   = Input::get('username');
				$users->email      = Input::get('email');
				//$users->password   = Input::get('password');
			}	



			
			
			$users->save();

			// redirect
			//Session::flash('message', 'Successfully updated User!');
			return Redirect::to('admin/users');
		}
	}
	//End New Modifications on 09-10-2014




}