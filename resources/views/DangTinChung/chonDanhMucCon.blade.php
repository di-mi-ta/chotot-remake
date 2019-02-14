@extends('layout.UserHeader')
@section('content')

<form action="{{url('chon-mien')}}"  method="POST"  role="form">
  {{ csrf_field()}}
   <div class="panel-group">
	    <div class="panel panel-default">
	        <div class="form-group">
		        <label for="sel1">Danh mục đăng tin:</label>
		        <select class="form-control" id="sel1" name="danhmuccon" value="">
		          <?php 
		            	foreach($danhmuccon as  $value){
		          			echo '<option>'.$value->tenDanhMucCon.'</option>';
		          		}
		          ?>
		        </select>
	        </div>
	     </div>
	<div class="panel panel-default">
    	<button type="submit" class="btn btn-default">Tiếp tục</button>
	</div>
  </div>
    

</form>


@endsection