@extends('master')

@section('content')
 

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
			<legend>Displaying All categories</legend> <p align="center">{{ HTML::link('categories/addcategory', 'Add Category') }}</p>
			{{ Form::open(array('url' => 'login')) }}
			@if($errors->any())
			<div class="alert alert-error">	
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif

			 <table border="1" cellpadding='10px;'  cellspacing='10px;'>
			 	<tr>
			 		<td id="usertab">Category Id</td>
			 		<td id="usertab">Category Name</td>
			 		<td id="usertab">Parent Name</td>
			 		<!--<td id="usertab">Updated Date</td>-->
			 		<td id="usertab">Action</td>
			 	</tr>
			
			 @foreach($categories as $cat)


				<tr>
			 		<td>{{ $cat->id }}</td>
			 		<td>{{ $cat->catname }}</td>
			 		<td>{{ $cat->parentid }}</td>
			 		<!--<td>{{ $cat->updated_at }}</td>-->
			 		<td>


		 			    {{ Form::open(array('url' => 'categories/' . $cat->id, 'class' => 'pull-right')) }}
							{{ Form::hidden('_method', 'DELETE') }}
							{{ Form::submit('Delete this User', array('class' => 'btn btn-warning')) }}
						{{ Form::close() }}
			 			<a class="btn btn-small btn-info" href="{{ URL::to('categories/' . $cat->id . '/edit') }}">Edit</a>

		
			 		</td>
			 	</tr>
      
		    @endforeach	

 			 </table>

		</div>
	</div>
</div>



@stop