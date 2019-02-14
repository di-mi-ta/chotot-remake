@extends('layout.UserHeader')
@section('content')

<form action="{{url('chon-loai-nguoi-dang')}}"  method="POST"  role="form" name="form6">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Bạn đăng tin</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input id="hidden-input-common" type="hidden" name="loaitin" value="">
		        	<button class='item-danhmuc' onclick="get_value_final('Cần bán')" type="button">
		        		<span class='vertical-align-middle'>Cần bán</span>
		        		<div class='pull-right'><i class='fa fa-angle-right'></i></div>
		        	</button>
		        	<button class='item-danhmuc' onclick="get_value_final('Cần mua')" type="button">
		        		<span class='vertical-align-middle'>Cần mua</span>
		        		<div class='pull-right'><i class='fa fa-angle-right'></i></div>
		        	</button>
		    	</div>
		    	<script>
   					function get_value_final(value_final) {
   						var input = document.getElementById('hidden-input-common');
						input.value = value_final;
						document.form6.submit();
   					}
   				</script>
	        </div>
	     </div>
  </div>
</form>


@endsection