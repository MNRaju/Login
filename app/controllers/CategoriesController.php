<?php

class CategoriesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function getCategories()
	{
		$categories = Categorie::all();	
		return View::make('categories.categories')->with('categories',$categories );
	}

	public function getCategorydrop()
	{
		$categories = Categorie::lists('catname', 'id');
		return View::make('register', array('categories' => $categories));
	}

	public function addCategory()
	{
		//$categories = Categorie::all();	
		return View::make('categories.addcategory');
	}



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


	public function destroy($id)
	{
		// delete
		//echo "Test";
		$categories = Categorie::find($id);
		$categories->delete();

		// redirect
		//Session::flash('message', 'Successfully deleted the nerd!');
		return Redirect::to('categories/categories');
	}



	public function edit($id)
	{
		
		//echo "Test";
		// get the nerd
		$categories = Categorie::find($id);
		//print_r($users);
		// $model = Categorie::findOrFail($id);
        // print_r($model);


		// show the edit form and pass the categories
		//return View::make('categories.edit')->with('cat', $model);
		return View::make('categories.edit')->with('cat', $categories);


		//we can use this statment also 

	}

	
	public function update($id)
	{
		
		// validate
		// read more on validation at http://laravel.com/docs/validation

	//rules = array('username'       => 'required', 'email'          => 'required|email', 		'password'       => 'required' 		);

		//$count = DB::table('categories')->where('id','!=', $id)->count();

//$query = DB::table('users')     ->join('categories', 'categories.id', '=', 'users.catid')     ->where('categories.id','!=', $id)     ->group_by('users.id')     ->order_by('users.id', 'desc')     ->get();

        //echo "Test";


        $catname= Input::get('catname'); 
		$count = DB::table('categories')->where('catname','=', $catname)->where('id','!=', $id)->count();


		

		//echo $count;
		if($count==0  || Input::get('catname')=="")
		{
			// setting up custom error messages for the field validation
		  $messages = array(
		    'catname.required' => 'Please Enter The Category Name !' // this is for the custom validatio that we have written
		  );

			$rules = array(
			'catname'       => 'required'			
		);
		}
        else
        {
        	// setting up custom error messages for the field validation
		  $messages = array(
		    'catname.required' => 'Please Enter The Category Name !',
		    'catname.unique' => 'This Category Name Already Entered !' // this is for the custom validatio that we have written
		  );

        	$rules = array(
			'catname'       => 'required|unique:categories|min:3'			
		);

        }

		


		


		$validator = Validator::make(Input::all(), $rules, $messages);

		// process the login
		if ($validator->fails()) {
			return Redirect::to('categories/' . $id . '/edit')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$categories = Categorie::find($id);
			$categories->catname   = Input::get('catname');
			$categories->save();

			
			// redirect
			//Session::flash('message', 'Successfully updated categories!');

			return Redirect::to('categories/categories');
		}
	}
	//End New Modifications on 09-10-2014

	public function get_settings_address() {
		$cat = Categorie::address();
		return View::make('register', $cat);
	}
    
	//Add Category

    public function postCategtory()
	{
		$input = Input::all();

		$rules = array('catname' => 'required|unique:categories');

		$v = Validator::make($input, $rules);

		if($v->passes())
		{
			

			//$password = $input['password'];
			//$password = Hash::make($password);

			$categories = new Categorie();
			$categories->catname = $input['catname'];

			//File Upload

			/*
			
	        $file = Input::file('image');
		    $destinationPath = 'uploads/images';
		    $extension = $file->getClientOriginalExtension();
		    //$extension ='.txt';
		    $fileOriginalName = $file->getClientOriginalName();
		    $filename =$fileOriginalName.str_random(12).".{$extension}";
		    $uploadSuccess = $file->move($destinationPath, $filename);	
			    
			//File Upload end here

			*/

			//$categories->file = $filename;
			$categories->save();

			//return Redirect::to('login');
			return Redirect::to('categories/categories');

		} else {

			return Redirect::to('categories/addcategory')->withInput()->withErrors($v);

		}
	}
    


}