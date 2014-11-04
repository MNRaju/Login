@extends('master')

@section('content')

<?php 

// These three are working 1): Default Query 2): Using Conrtole and 3): Using moddel.

//$categories = DB::select('select * from categories');
//$categories = Categorie::all();

//$categories = DB::table('categories')->lists('catname' ,'id');

//$categories = Categorie::lists('catname' ,'id');
//print_r($categories);



//To get the records using joins.


//$usercat=DB::table('users')  ->leftJoin('categories', 'users.catid', '=', 'categories.id')  ->get();

//echo "<pre>";

//print_r($usercat);


?>

<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Add Category</legend>
			{{ Form::open(array('url' => 'categories/addcategory' ,'files' => true )) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('catname', '', array('placeholder' => 'Category Name')) }}<br>

			{{ Form::submit('Add', array('class' => 'btn btn-success')) }}
			{{ HTML::link('categories/categories', 'Cancel', array('class' => 'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>	
</div>


@stop