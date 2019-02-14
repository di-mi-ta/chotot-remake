@extends('layout.UserHeader')
@section('content')

<form action="{{url('chon-tinh-thanh')}}"  method="POST"  role="form" name="form3">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Khu vực</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input id="hidden-input-common-1" type="hidden" name="mien" value="">
		        	<?php
		            	foreach($mien as  $value){
		            		$item = "<button class='item-danhmuc' onclick=\"get_value_final('".$value->tenMien."')\" type='button'><span class='vertical-align-middle'>";
		          			$item .= $value->tenMien."</span>";
		          			$item .= "<div class='pull-right'><i class='fa fa-angle-right'></i></div></button>";
		          			echo $item;
		          		}
		          	?>
		    	</div>
		    	<script>
   					function get_value_final(value_final) {
   						var input = document.getElementById('hidden-input-common-1');
						input.value = value_final;
						document.form3.submit();
   					}
   				</script>
	        </div>
	     </div>
  </div>
</form>

@endsection