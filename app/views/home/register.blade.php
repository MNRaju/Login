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

 //echo $user;

$val=Input::old('genre') ;
//echo $val;

$valcheck=Input::old('username');

//echo $valcheck;

?>

<div class="row">
	<div class="span4 offset1">
		<div class="well">
			<legend>Please Register</legend>
			{{ Form::open(array('url' => 'register' ,'files' => true )) }}
			@if($errors->any())
			<div class="alert alert-error">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif
			{{ Form::text('username', '', array('placeholder' => 'Username' , 'autofocus'=>'autofocus')) }}
			{{ Form::text('email', '', array('placeholder' => 'Email')) }}<br>
			{{ Form::password('password', array('placeholder' => 'Password')) }}<br>
			
		   	Gender : Male <input type="radio" name="genre" value="M" class="radio" id="male"  <?php if(Input::old('genre')== "M") { echo 'checked="checked"'; } ?> >
			Female 		  <input type="radio" name="genre" value="F" class="radio" id="female" <?php if(Input::old('genre')== "F") { echo 'checked="checked"'; } ?> >

		   	<br>

		   	Qualification : 
		    MCA <input type="checkbox" id='MCA' name='qual[]' value='MCA' <?php if(@in_array('MCA',( Input::old('qual')))) {  echo 'checked="checked"'; } ?> > 			  
  			MBA <input type="checkbox" id='MBA' name='qual[]' value='MBA' <?php if(@in_array('MBA',( Input::old('qual')))) {  echo 'checked="checked"'; } ?> >
  			Mtech <input type="checkbox" id='Mtech' name='qual[]' value='Mtech' <?php if(@in_array('Mtech',( Input::old('qual')))) {  echo 'checked="checked"'; } ?> > 			  
  			Btech <input type="checkbox" id='Btech' name='qual[]' value='Btech' <?php if(@in_array('Btech',( Input::old('qual')))) {  echo 'checked="checked"'; } ?> >


			 <br>

		   	{{ Form::label('image','File',array('id'=>'image','class'=>'image')) }}
  			{{ Form::file('image','',array('id'=>'image','class'=>'image')) }}<br>

  			{{Form::select('catid', $categories)}}<br>

  			

  			Address {{ Form::textarea('address','',array('id'=>'address','class'=>'')) }}
  			<?php //print_r(Input::old('qual')); ?>


  			{{ Form::submit('Register', array('class' => 'btn btn-success')) }}
			{{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
			{{ Form::close() }}
		</div>
	</div>	
</div>


@stop