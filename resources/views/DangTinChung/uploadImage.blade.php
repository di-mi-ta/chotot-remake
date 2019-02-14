@extends('layout.UserHeader')
@section('content')

<!--<form action="{{ url('upload-image') }}" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="file" name="image[]" required="true" multiple="true">
        <br/>
        <input type="submit" value="upload">
</form>-->
<form action="{{url('upload-image')}}"  enctype="multipart/form-data" method="POST" name="form8">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Chọn ảnh</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<input type="file" name="image[]" required="true" multiple="true" style="height:30px;">
		          	<div class="luan-alert" style="margin-top: 15px;margin-bottom:30px;border:1px solid #bce8f1;">
   					<div class="luan-row-1">
   						<div class="not-col">
            				<div style="padding: 12px;margin:10px;margin-bottom:0px;">
              					<p style="font-weight: bold">Nên</p>
              					<ul>
                					<li>Hình thật của sản phẩm sẽ tạo được niềm tin với người xem</li>
                					<li>Hình chụp từ nhiều góc độ của sản phẩm (mặt trước, mặt sau, mặt bên,...)</li>
                					<li>Hình chụp cận cảnh những điểm nổi ật của sản phẩm</li>
                					<li>Nên chụp rõ các điểm cần lưu ý của sản phẩm (ví dụ vết xước nếu có..)</li>
                					<li>Chụp hình ngoài trời, hoặc nơi đủ sáng để hình rõ đẹp</li>
                					<li>Dung lượng mỗi hình không quá 5MB nhưng không nên quá thấp để bảo đảm hình rõ đẹp</li>
              					</ul>
            				</div>
          				</div>
          				<div class="not-col">
            				<div style="padding: 12px;margin-bottom:10px;margin-top:0;margin-left:10px;margin-right:10px;">
              					<p style="font-weight: bold">Không nên</p>
              					<ul>
                					<li>Không chèn email/website/điện thoại/logo đè lên hình</li>
                					<li>Không dùng hình ảnh lấy từ internet</li>
              					</ul>
           					</div>
          				</div>
    				</div>
	     		</div>
	     		<button class='continue' type='submit' value="upload">
	     			<div id="over" style="max-width: 100%;margin: auto;display:table">
	     				<span class='vertical-align-middle-1'>Tiếp tục</span>
						<div class='pull-right-1'><i class='fa fa-angle-right' style="font-size:24px;"></i></div>
					</div>
				</button>
		    	</div>
  			</div>
  		</div>
  	</div>
</form>
@endsection