@extends('layout.UserHeader')
@section('content')

<form action="{{url('lay-thong-tin-chung')}}"  method="POST"  role="form" name="form7">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Bạn là</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input id="hidden-input-common" type="hidden" name="loainguoidang" value="">
		        	<div class="check-box-item row-check-box">
		        	<?php
	        			$so_loai = count($loainguoidang);
	        			$percent = 100.0 / $so_loai;
		            	for($i = 0; $i < count($loainguoidang); ++$i){
		            		$item = '<div class="column-check-box" style="width:'.$percent.'%;"><label class="label-container"><span class="cont">'.$loainguoidang[$i]->loai.'</span><input type="radio" checked="checked" name="loai-nguoi-dang" value="'.$loainguoidang[$i]->loai.'"><span class="checkmark"></span></label></div>';
		          			echo $item;
		          		}
		          	?>
		          </div>
		          	<div class="luan-alert" style="margin-top: 15px;">
   					<div class="luan-row">
   						<div class="col-xs-12">
            				<div>
              					<p style="font-weight: bold">Bạn là "Cá nhân" nếu</p>
              					<ul>
                					<li>Bán xe của bản thân, không vì mục đích kinh doanh chuyên nghiệp</li>
                					<li>Xe thường là đã qua sử dụng, hoặc đã được mua/tặng nhưng không dùng tới</li>
                					<li>Rao bán/tìm mua tối đa 3 xe trong chuyên mục này</li>
              					</ul>
            				</div>
          				</div>
          				<div class="col-xs-12">
            				<div>
              					<p style="font-weight: bold">Bạn là "Bán chuyên" nếu</p>
              					<ul>
                					<li>Người bán hàng chuyên nghiệp, hoặc tự doanh (cò)</li>
                					<li>Rao bán xe cho công ty/cửa hàng/shop</li>
                					<li>Bất kỳ cá nhân/tập thể bán hàng vì mục đích kinh doanh</li>
                					<li>Rao bán/tìm mua trên 3 xe</li>
              					</ul>
           					</div>
          				</div>
    				</div>
	     		</div>
	     		<button class='continue' onclick="get_check_box_value()" type='button'>
	     			<div id="over" style="max-width: 100%;margin: auto;display:table">
	     				<span class='vertical-align-middle-1'>Tiếp tục</span>
						<div class='pull-right-1'><i class='fa fa-angle-right' style="font-size:24px;"></i></div>
					</div>
				</button>
		    	</div>
  			</div>
  		</div>
  	</div>
  	<script>
   		function get_check_box_value() {
			var types = document.getElementsByName("loai-nguoi-dang");
            for (var i = 0; i < types.length; i++){
                if (types[i].checked === true){
                    document.getElementById('hidden-input-common').value = types[i].value;
                    break;
                }
            }
			document.form7.submit();
   		}
   	</script>
</form>
@endsection