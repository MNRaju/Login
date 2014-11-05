@extends('master')


@section('content')

<?php 
//print_r($cat);

//echo $cat['id'];

?>



<style type="text/css">
#usertab{ color: #0088cc;}

</style>


<div class="row">

    <div class="">  
        <div class="well">
            <legend>Edit Category Details</legend>
            @if($errors->any())
            <div class="alert alert-error"> 
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </div>
            @endif

             <table border="0" cellpadding='10px;'  cellspacing='10px;'>
                <tr><td>

                {{ Form::model($cat, array('route' => array('categories.update', $cat->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('catname', 'Category Name') }}
                        {{ Form::text('catname', null, array('class' => 'form-control')) }}
                    </div>
        
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}


            </td></tr>
                



@stop