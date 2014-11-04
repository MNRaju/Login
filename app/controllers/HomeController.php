<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getIndex()
	{
		return View::make('home.index');
	}
	

	public function getLogin()
	{
		return View::make('home.login');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('email' => 'required', 'password' => 'required');

		$v = Validator::make($input, $rules);

		if($v->fails())
		{

			return Redirect::to('login')->withErrors($v);

		} else { 

			$credentials = array('email' => $input['email'], 'password' => $input['password']);

			if(Auth::attempt($credentials))
			{

				return Redirect::to('admin');

			} else {

				return Redirect::to('login');
			}
		}
	}

	public function getRegister()
	{
		//$categorie = Categorie::all();
		$categorie = Categorie::lists("catname","id");

      

	$usercat=DB::table('users')
        ->leftJoin('categories', 'users.catid', '=', 'categories.id')
        ->get();


		//The three are working fine.
		return View::make('home.register')->with(array('categories'=>$categorie , 'usercat'=>$usercat));
		//return View::make('home.register');
	}	

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required' , 'genre' => 'required');

		$v = Validator::make($input, $rules);

		//print_r($v);

		if($v->passes())
		{
			

			//print_r($input['qual']);	
			//if (count($input['qual']>1) {
					for ($i=0; $i <= count($input['qual']) ; $i++) { 
					# code...
					$quali=implode(",", ($input['qual']));
				}
			//}

			//echo $quali;
			//exit;


			$password = $input['password'];
			$password = Hash::make($password);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->qual = $quali;
			
			$user->genre = $input['genre'];


			//File Upload


			
	        $file = Input::file('image');
		    $destinationPath = 'uploads/images';
		    $extension = $file->getClientOriginalExtension();
		    //$extension ='.txt';
		    //$fileOriginalName = $file->getClientOriginalName();
		    //$filename =$fileOriginalName.str_random(12).".{$extension}";
		    $filename ="MyFile_".str_random(12).".{$extension}";
		    $uploadSuccess = $file->move($destinationPath, $filename);	
			    
			//File Upload end here


			$user->file = $filename;
			$user->save();

			//return Redirect::to('login');
			return Redirect::to('admin/users');

		} else {

			return Redirect::to('register')->withInput()->withErrors($v);

		}
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
	

}