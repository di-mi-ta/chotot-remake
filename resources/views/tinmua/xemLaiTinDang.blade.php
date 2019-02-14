@extends('layout.UserHeader')
@section('content')

<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<div class="label-1">
        <label id="label-01" for="sel1">Xem lại tin đăng</label>
    </div>
<div class="container-final-form">
    
    <form action="{{url('dang-tin-mua')}}"  method="POST"  role="form">
  {{ csrf_field()}}

<div class="panel-default love-div">
        <label for="sel1">Danh mục</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('danhmuc');?>">
</div>


<div class="panel-default love-div">
        <label for="sel1">Loại tin</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('loaitin');?>">
</div>

<div class="panel-default love-div">
        <label for="sel1">Người đăng</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('loainguoidang');?>">
</div>

<div class="panel-default love-div">
        <label for="sel1">Tình trạng sản phẩm</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('tinhtrangsanpham');?>">  
</div>

<div class="panel-default love-div">
        <label for="sel1">Tiêu đề</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('tieude');?>">
</div>

<div class="panel-default love-div">
        <label for="sel1">Mô tả</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('mota');?>"> 
</div>

<div class="panel-default love-div">
        <label for="sel1">Thông tin vận chuyển</label> 
        <input type="text" for="sel1" readonly="true" value="<?php echo Session::get('thongtinvanchuyen');?>">
</div>
    <button class='continue' type='submit'style="margin-top: 80px;padding:10px;">
        <div id="over" style="max-width: 100%;margin: auto;display:table;">
            <span class='vertical-align-middle-1' style="padding:0;">Hoàn tất</span>
        </div>
    </button>
    
</form>
</div>

@endsection