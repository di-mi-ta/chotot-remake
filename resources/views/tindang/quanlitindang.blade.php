@extends('layout.UserHeader')
@section('content') 
<?php
	function TODO($tin) {
		foreach ($tin as $value) {
		echo "<div class='tra-column tra-row-1' style='width:100%;padding:10px;padding-left:0;'>";
		$select_img = 'select tenImage from tinimage where tinID = '.$value->tinID;
		$hinh = DB::select($select_img);
		$select_local = 'select tenTinhTP from quanhuyen where ID_loc = '.$value->ID_loc;
		$local = DB::select($select_local);

		$cTinMua = DB::select("select checkIsTinMua(?) as check_",[$value->tinID]);
		$j = 0;
		foreach ($cTinMua as $value2) {
			$j = $value2->check_;
		}
		if ($j == 0){
			$id_danhmuc = DB::select("select getIDDanhMuc('Ô tô') as _id_danhmuc");
			$i = -1;
			foreach ($id_danhmuc as $value1) {
				$i = $value1->_id_danhmuc;
			}

			$id_danhmuc2 = DB::select("select getIDDanhMuc('Xe máy') as _id_danhmuc");
			$i2 = -1;
			foreach ($id_danhmuc2 as $value2) {
				$i2 = $value2->_id_danhmuc;
			}
			if ($value->id_danhmuc == $i){
				
				$select_price = 'select price from tinban where tinBanID = '.$value->tinID;
				$price = DB::select($select_price);
				
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".$value->tieuDe."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>".number_format($price[0]->price, 0, ".", ".")." đ</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				if ($value->trangThaiTin == 'Kích hoạt'){
					echo "<span class='vitri-thoigian' style='font-family:Tahoma;'><form action='mua-dich-vu' method=\"POST\"  role=\"form\" style='display:inline;color:#6495ED;'>";
					echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>"; 
					echo "<button id='sdDV' type = 'submit'> Sử dụng dịch vụ </button>";
					echo "</form>";
				}
				echo "<form action='xoa-tin' method=\"POST\"  role=\"form\" style='float:right;text-align:right;color:Tomato'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button id='xoaTD' type='submit'>Xóa</button>";
				echo "</form>";
				echo "</span>";
				echo "</div>";
			}	
			elseif ($value->id_danhmuc == $i2){
				
				$select_price = 'select price from tinban where tinBanID = '.$value->tinID;
				$price = DB::select($select_price);
				
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-ban-xe-may' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".$value->tieuDe."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>".number_format($price[0]->price, 0, ".", ".")." đ</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				if ($value->trangThaiTin == 'Kích hoạt'){
					echo "<span class='vitri-thoigian' style='font-family:Tahoma;'><form action='mua-dich-vu' method=\"POST\"  role=\"form\" style='display:inline;color:#6495ED;'>";
					echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>"; 
					echo "<button id='sdDV' type = 'submit'> Sử dụng dịch vụ </button>";
					echo "</form>";
				}
				echo "<form action='xoa-tin' method=\"POST\"  role=\"form\" style='float:right;text-align:right;color:Tomato'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button id='xoaTD' type='submit'>Xóa</button>";
				echo "</form>";
				echo "</span>";
				echo "</div>";
			}	
		}
		else{
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-mua' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".$value->tieuDe."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>Xe cần mua</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				if ($value->trangThaiTin == 'Kích hoạt'){
					echo "<span class='vitri-thoigian' style='font-family:Tahoma;'><form action='mua-dich-vu' method=\"POST\"  role=\"form\" style='display:inline;color:#6495ED;'>";
					echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>"; 
					echo "<button id='sdDV' type = 'submit'> Sử dụng dịch vụ </button>";
					echo "</form>";
				}
				echo "<form action='mua-dich-vu' method=\"POST\"  role=\"form\" style='float:right;text-align:right;color:Tomato'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button id='xoaTD' type='submit'>Xóa</button>";
				echo "</form>";
				echo "</span>";
				echo "</div>";
		}
		echo "</div>";
	}
}?>


 @if (session('status'))
    <div class="alert alert-info">{{session('status')}}</div>
 @endif

<div class="super-super-container">
<h4 style='font-weight:bold;padding-top:10px;padding-left:11px;font-family:Verdana;'>Quản lí tin đăng</h4>
<hr style="margin-bottom: 10px;">
<div id="avatar">
	<div id="img-div">
		<img src="img/AVATAR_2.png" alt="Avatar" style="width:100%;">
	</div>
	<div id="name-div">
		<h4 style="font-weight:bold;"><?php echo Session::get('name'); ?></h4>
		<?php echo '<a target="_blank" style="font-size:16px;" onclick="Hello(\''.Session::get('name').'\')">Nhận lời chào từ chợ tốt Bách Khoa</a>'; ?>
	</div>
</div>
<div style='padding: 5px 11px;'>
<div class="super-container">
<div class="best-best-container best-column">
<div class="all-filter tab" style="display:block;">
	<button class="tablinks xx-btn xx-active" onclick="openType(event, 'dangkichhoat')">Đang kích hoạt (<?php echo count($tinbt);?>)</button>
  	<button class="tablinks xx-btn" onclick="openType(event, 'bituchoi')">Bị từ chối (<?php echo count($tinan);?>)</button>
</div>
<div class="best-container">
<div id="dangkichhoat" class="tabcontent" style="display:block;">
	<?php
		TODO($tinbt);
		if(count($tinbt) == 0)
			echo "<div class='no-item'>Bạn chưa có tin nào trong mục này</div>";
	?>
</div>
<div id="bituchoi" class="tabcontent">
  <?php 
  		TODO($tinan);
		if(count($tinan) == 0)
			echo "<div class='no-item'>Bạn chưa có tin nào trong mục này</div>"; ?>
</div>
</div>
</div>
<div class="best-column-1">
	<div class="content-aside">
		<h4 style='font-weight:bold;font-family:Verdana;margin-top:0px;margin-bottom: 20px;'>Liên hệ chúng tôi</h4>
		<div class="chip">
  			<img src="https://scontent.fsgn1-1.fna.fbcdn.net/v/t1.0-9/17309555_615458735320502_8460108034701602737_n.jpg?_nc_cat=0&oh=94bb802370df9456d3611ade2ee81cad&oe=5B8FB4BC" alt="Minh-Tan" width="96" height="96">
  			Minh Tân
		</div>
		<div class="chip">
  			<img src="https://scontent.fsgn1-1.fna.fbcdn.net/v/t1.0-9/13239160_886555374823052_6233992001662968855_n.jpg?_nc_cat=0&oh=4f75024d3bd813dd295de24c7e18296a&oe=5B927C17" alt="Anh-Tuan" width="96" height="96">
  			Anh Tuấn
		</div>
		<div class="chip">
  			<img src="https://scontent.fsgn1-1.fna.fbcdn.net/v/t1.0-9/29543179_499249487194775_3000089352620813655_n.jpg?_nc_cat=0&oh=9ab317afee2fe9e19e6dd5d24e960418&oe=5B82799F" alt="Tuan-Phat" width="96" height="96">
  			Tuấn Phát
		</div>
		<div class="chip">
  			<img src="https://scontent.fsgn1-1.fna.fbcdn.net/v/t1.0-1/27072420_2482334011990872_6046924942464521673_n.jpg?_nc_cat=0&oh=107ae61921edbe67f2ebbadf92035da0&oe=5B8422F5" width="96" height="96">
  			Văn Trường 
		</div>
 
		<div class="chip">
  			<img src="https://scontent.fsgn1-1.fna.fbcdn.net/v/t1.0-1/32238345_1863050800654617_3993616168421163008_n.jpg?_nc_cat=0&oh=3cd937c1276dd6de625f2a389370db63&oe=5B8E3092" width="96" height="96">
  			Trọng Luân
		</div>
	</div>
</div>
</div>
</div>
</div>
<script>
function openType(evt, typeName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" xx-active", "");
    }
    document.getElementById(typeName).style.display = "block";
    evt.currentTarget.className += " xx-active";
}
	
</script>
@endsection