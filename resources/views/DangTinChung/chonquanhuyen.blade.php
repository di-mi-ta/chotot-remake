@extends('layout.UserHeader')
@section('content')

<form action="{{url('chon-loai-tin')}}"  method="POST"  role="form" name="form5">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Quận huyện</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input id="hidden-input-common" type="hidden" name="quanhuyen" value="">
		        	<?php
		            	foreach($quanhuyen as  $value){
		            		$item = "<button class='item-danhmuc' onclick=\"get_value_final('".$value->tenQuanHuyen."')\" type='button'><span class='vertical-align-middle'>";
		          			$item .= $value->tenQuanHuyen."</span>";
		          			$item .= "<div class='pull-right'><i class='fa fa-angle-right'></i></div></button>";
		          			echo $item;
		          		}
		          	?>
		    	</div>
		    	<script>
   					function get_value_final(value_final) {
   						var input = document.getElementById('hidden-input-common');
						input.value = value_final;
						document.form5.submit();
   					}
   				</script>
	        </div>
	     </div>
  </div>
</form>

@endsection