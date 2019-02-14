@extends('layout.UserHeader')
@section('content')

<form action="{{url('xem-lai-tin-ban-o-to')}}"  method="POST"  role="form" name="form11">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Số chỗ</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input id="hidden-input-common" type="hidden" name="socho" value="">
		        	<?php
		            	foreach($socho as  $value){
		            		$item = "<button class='item-danhmuc' onclick=\"get_value_final('".$value->soCho."')\" type='button'><span class='vertical-align-middle'>";
		          			$item .= $value->soCho."</span>";
		          			$item .= "<div class='pull-right'><i class='fa fa-angle-right'></i></div></button>";
		          			echo $item;
		          		}
		          	?>
		    	</div>
		    	<script>
   					function get_value_final(value_final) {
   						var input = document.getElementById('hidden-input-common');
						input.value = value_final;
						document.form11.submit();
   					}
   				</script>
	        </div>
	     </div>
  </div>
</form>
@endsection