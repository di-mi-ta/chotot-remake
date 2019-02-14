@extends('layout.UserHeader')
@section('content')

<form action="{{url('chuyen-tiep-tin-ban')}}"  method="POST"  role="form">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	        <div class="form-group" style="margin:0px; width: 100%;">
	        	<div class="label-1">
		        	<label id="label-01" for="sel1">Giá bán</label>
		        </div>
		        <div class="danh-muc-dang-tin">
		        	<div style="width:100%;margin-bottom:8px;border-bottom:0.8px solid #ffba00;">
		        		<input type="text" class="form-control gia-ban" id="usr" name = "gia" placeholder="Giá" style="max-width:94%;border:none;display:inline;border-radius:0px;box-shadow:none;">
		        		<span style="padding-right:0;color:lightgray;">VND</span>
		        	</div>
		        	<p style="font-size:12px;color:lightgray;">Vui lòng điền tổng giá tiền</p>
		        <div class="luan-alert" style="margin-top: 15px;margin-bottom:100px;border:1px solid #bce8f1;">
   					<div class="luan-row-1">
   						<div class="not-col">
            				<div style="padding: 12px;margin-bottom:0px;">
              					<p style="font-weight: bold">Hơn 50% người xem tin sẽ không liên lạc khi tin đăng không có giá, hoặc giá không hợp lý, vì vậy hãy điền:</p>
              					<ul>
                					<li>Tổng giá tiền bằng VNĐ</li>
                					<li>Nếu thanh toán nhiều lần, vui lòng mô tả trong nội dung tin đăng</li>
              					</ul>
            				</div>
          				</div>
    				</div>
	     		</div>
		        	<button class='continue' type='submit'>
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