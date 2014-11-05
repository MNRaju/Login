@extends('master')


@section('content')



<style type="text/css">
#usertab{ color: #0088cc;}

</style>


<div class="row">

    <div class="">  
        <div class="well">
            <legend>Edit User Details</legend>
            @if($errors->any())
            <div class="alert alert-error"> 
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                {{ implode('', $errors->all('<li class="error">:message</li>')) }}
            </div>
            @endif

             <table border="0" cellpadding='10px;'  cellspacing='10px;'>
                <tr><td>

                {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('username', 'User Name') }}
                        {{ Form::text('username', null, array('class' => 'form-control')) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        {{ Form::email('email', null, array('class' => 'form-control')) }}
                    </div>
                     <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', null, array('class' => 'form-control')) }}
                    </div>

                  
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}


            </td></tr>
                



@stop





