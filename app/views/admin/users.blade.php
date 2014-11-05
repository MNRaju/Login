@extends('master')

@section('content')
  <!-- @foreach($users as $user)
        <p>{{ $user->username }}</p>
        <p>{{ $user->email }}</p>
        <p>{{ $user->updated_at }}</p>
    @endforeach

-->


 <script>
	function Deleteuser(id)
	{
	  if (confirm('Do you want to delete the entire details?'))
	  {
		  //window.location="delete_users.php?id="+id;
		  //window.location="delete_class.php?id="+id;


		  //alert(id);
			$.ajax({
			    url: 'destroy/'+id,
			    type: 'DELETE',
			    success: function(result) {
			        // Do something with the result

			        //alert(id);
			        console.log("success");
			    }
			});

		  return true;


	  }
	  
	  else
	  {
		  return false;
	  }
	  
	}
 </script>
<style type="text/css">
#usertab{ color: #0088cc;}

</style>


<div class="row">

	<div class="">	
		<div class="well">
			<legend>Displaying All Users</legend> 
			<table><tr><td>

				{{ Form::open(array('url' => 'admin/John David/users')) }}
					Username</td>

					<td><input type="text" name="username" id="username" placeholder="Enter Username" value="<?php echo Input::old('username'); ?>"> </td>

					<td><input type="submit" name="submit" id="submit" value="Submit"> 
				{{ Form::close() }}	
				</td></tr></table>
			{{ Form::open(array('url' => 'login')) }}
			@if($errors->any())
			<div class="alert alert-error">	
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif

			 <table border="1" cellpadding='10px;'  cellspacing='10px;'>
			 	<tr>
			 		<td id="usertab">User Name</td>
			 		<td id="usertab">Email</td>
			 		<td id="usertab">Created Date</td>
			 		<td id="usertab">Updated Date</td>
			 		<td id="usertab">Action</td>
			 	</tr>
			
			 @foreach($users as $user)


				<tr>
			 		<td>{{ $user->username }}</td>
			 		<td>{{ $user->email }}</td>
			 		<td>{{ $user->created_at }}</td>
			 		<td>{{ $user->updated_at }}</td>
			 		<td>


		 			    {{ Form::open(array('url' => 'admin/' . $user->id, 'class' => 'pull-right')) }}

							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete', array('class' => 'btn btn-warning')) }}
						
			 			 <a class="btn btn-small btn-info" href="{{ URL::to('admin/' . $user->id . '/edit') }}">Edit</a>

					    {{ Form::close() }}

					    <!-- <form action="admin" method="REQUEST" >
					    	<input type="submit" name='Submit' value="Submit"> 
					    </from>-->



			 		</td>
			 	</tr>
      
		    @endforeach	

 			 </table>

		</div>
	</div>
</div>



@stop