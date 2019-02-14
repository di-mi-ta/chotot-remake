@extends('layout.UserHeader')
@section('content')

<form action="{{url('image')}}"  method="POST"  role="form">
  {{ csrf_field()}}
   <div class="luan-panel-group">
	    <div class="luan-panel luan-panel-default">
	    	<div class="label-1">
		        	<label id="label-01" for="sel1">Thông tin chung</label>
		    </div>
	    	<div class="lay-thong-tin-chung-div" style="box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05), 0 1.5px 5px 0 rgba(0, 0, 0, 0.05); max-width: 65%; margin: auto; padding: 20px; outline: 1px solid lightblue; margin-bottom: 50px;">
	    		<div>
	    			<div class="form-group">
	        			<label for="sel1">Tiêu đề:</label>
		       			<input type="text" class="form-control" id="usr" name = "tieude"></input>
	        		</div>

	         		<div class="form-group">
	        			<label for="sel1">Mô tả:</label>
		        		<textarea class="form-control" rows="5" id="comment" name = "mota"> </textarea>
	        		</div>

	        		<div class="form-group">
	        			<label for="sel1">Thông tin vận chuyển:</label>
		        		<textarea class="form-control" rows="5" id="comment" name = "thongtinvanchuyen"> </textarea>
	        		</div>

	        		<div class="form-group">
	        			<label for="sel1">Tình trạng sản phẩm:</label>
		       			<select class="form-control" id="sel1" name="tinhtrangsanpham" value="">
		            		<option>Mới</option>
		           		 	<option>Đã sử dụng</option>
		        		</select>
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
</form>



@endsection