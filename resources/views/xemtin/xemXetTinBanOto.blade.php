@extends('layout.AdminHeader')
@section('content')


<div class="super-super-container">
<h2 style='font-weight:bold;padding-top:10px;padding-left:11px;font-family:Arial;font-size:16px;'>Nội dung chi tiết</h2>
<div class="super-container">
<div class="best-best-container best-column">
<div class="best-container" style="padding: 5px 11px;">
<form action="{{url('xu-li-tin')}}"  method="POST"  role="form" name="xform">
  {{ csrf_field()}}
  <div class="luan-panel-group">
<div class="luan-panel luan-panel-default">
<div class="form-group" style="margin:0px; width: 100%;">
<div style="width: 100%;margin:0px;">
	
<?php 
	$value = $info[0]; 
	$select_image = "SELECT tenImage from tinimage where tinID = ".$value->tinID;
	$images = DB::Select($select_image);
	$num_img = count($images);
	//$images[0]->tenImage
	echo '<div class="super-slideshow">';
	echo '<div class="slideshow-container style="max-width:90%;margin:auto;">';
	for ($i = 0; $i < $num_img; ++$i)
	{
		echo '<div class="mySlides fade-1 img-container" style="width:100%;">';
		echo '<div class="numbertext">'.$i.'/'.$num_img.'</div>';
		echo '<img class="img-1" src="img/'.$images[$i]->tenImage.'" style="width:100%;max-height:350px;" alt="Image">';
		echo '<div class="img-content">';
		$d = strtotime($value->ngayDang);
		echo '<span style="color:white;font-size:15px;">Tin '.$value->loaiNguoiDang.' đăng Ngày '.date("d", $d).' tháng '.date("m", $d).' năm '.date("Y", $d).' lúc '.date("h:i", $d).'</span>';
		echo '</div>';
		echo '</div>';
	}
	if ($num_img > 1)
	{
		echo '<a class="prev" onclick="plusSlides(-1)" style="text-decoration:none;">&#10094;</a>';
		echo '<a class="next" onclick="plusSlides(1)" style="text-decoration:none;">&#10095;</a>';
	}
	echo '</div>';
	echo '<br><div style="text-align:center;';
	if ($num_img == 1)
		echo 'display:none;';
	echo '">';
	for ($i = 0; $i < $num_img; ++$i)
		echo '<span class="dot" onclick="currentSlide('.($i + 1).')"></span>';
	echo '</div></div>';
?>	
	<div id="Content-super">
		<h4 id="title" style="font-weight:bold;font-family:Tahoma;"><?php echo $value->tieuDe; ?></h4>
		<h4 id="gia-hoac-mua" style="font-weight:bold;color:#c90927;font-family:Arial">
			<?php 
				$ttinxe = false;
				$check = "SELECT price from tinban where tinBanID = ".$value->tinID;
				$prices = DB::Select($check);
				if (count($prices) == 0)
					echo "Xe cần mua";
				else
				{	
					echo number_format($prices[0]->price, 0, ".", ".").' đ';
					$ttinxe = true;
				}
			?>
		</h4>
		<div id="mo-ta" style="color:inherit;font-family:Verdana;">
			<?php echo $value->moTa; ?>
		</div>
		<div id="thong-tin-vc" style="color:inherit;font-family:Verdana;">
			<?php echo "Thông tin vận chuyển: ".$value->TTVanChuyen; ?>
		</div>
		<?php
			if ($ttinxe)
			{
				$tenDong = ""; $soCho = 0;
				$tenHang = ""; $kieuDang = "";
				$kiHieuHang = "";
				$kiHieuDong = "";
				$select_oto = "Select * from tinbanoto where tinBanOtoID = ".$value->tinID;
				$t = DB::Select($select_oto);
				if (count($t) > 0)
				{
					//Tin bán ô tô
					$select_dong_oto = "Select * from dongoto where idDongOto = ".$t[0]->idDongOto;
					$dongoto = DB::Select($select_dong_oto);
					$tenHang = $dongoto[0]->tenHang;
					$tenDong = $dongoto[0]->tenDong;
					$soCho = $dongoto[0]->soCho;
					$kieuDang = $dongoto[0]->kieuDang;
					$kiHieuHang = "fa fa-car";
					$kiHieuDong = "fa fa-taxi";
				}
				else 
				{
					$select_xemay = "Select * from tinbanxemay where tinBanXeMay_ID = ".$value->tinID;
					$p = DB::Select($select_xemay);
					$select_dong_xemay = "Select * from dongxemay where idDongXeMay = ".$p[0]->idDongXeMay;
					$dongxemay = DB::Select($select_dong_xemay);
					$tenHang = $dongxemay[0]->tenHang;
					$tenDong = $dongxemay[0]->tenDong;
					$kiHieuHang = "fa fa-motorcycle";
					$kiHieuDong = "fa fa-bycicle";
				}
				echo "<div id='full-info' style='margin-top:30px;font-size:14px;font-family:Arial;'>";
				echo "<div class='row-num-1'>";
				
				echo "<div class='column-tra-luan'>";
				echo "<div style='display:table;'>";
				echo "<i class='".$kiHieuHang."' style='font-size:22px;color:green;'></i><span style='display:table-cell;vertical-align:middle;padding-left:10px;'> ".$tenHang."</span>";
				echo "</div></div>";
				echo "<div class='column-tra-luan'>";
				echo "<div style='display:table;'>";
				echo "<i class='".$kiHieuDong."' style='font-size:22px;color:green;'></i><span style='display:table-cell;vertical-align:middle;padding-left:10px;'> ".$tenDong."</span>";
				echo "</div></div>";
				echo "<div class='column-tra-luan'>";
				echo "<div style='display:table;'>";
				$kihieuTT = "";
				if (trim($value->tinhTrangSP) == "Mới")
					$kihieuTT = "fa fa-battery-4";
				else
					$kihieuTT = "fa fa-battery-2";
				echo "<i class='".$kihieuTT."' style='font-size:22px;color:green;'></i><span style='display:table-cell;vertical-align:middle;padding-left:10px;'> ".$value->tinhTrangSP."</span>";
				echo "</div></div>";

				if ($soCho > 0 && $kieuDang != "")
				{
					echo "<div class='column-tra-luan'>";
					echo "<div style='display:table;'>";
					echo "<i class='fa fa-database' style='font-size:22px;color:green;'></i><span style='display:table-cell;vertical-align:middle;padding-left:10px;'> ".$soCho."</span>";
					echo "</div></div>";
					echo "<div class='column-tra-luan'>";
					echo "<div style='display:table;'>";
					echo "<i class='fa fa-star-half-full' style='font-size:22px;color:green;'></i><span style='display:table-cell;vertical-align:middle;padding-left:10px;'> ".$kieuDang."</span>";
					echo "</div></div>";
				}
				echo "</div>";
				echo "</div>";
			} 
		?>
		<hr>
		<div style="margin-top:20px;">
			<h4 style="font-size:15px;color:gray;font-family:Verdana;">Khu vực</h4>
			<div style="display:table"><i class="material-icons" style="font-size:22px;">place</i><span style="padding-left:8px;display:table-cell;vertical-align:middle;">
				<?php 
					$select_local = "select ID_loc from tindang where tinID = ".$value->tinID;
					$local = DB::Select($select_local);
					$select_tinhthanh = "select tenTinhTP from quanhuyen where ID_loc = ".$local[0]->ID_loc;
					$tinhTP = DB::Select($select_tinhthanh);
					echo " ".$tinhTP[0]->tenTinhTP;
					?>
				</span>
			</div>
		</div>
	</div>
<?php	echo "<input type=\"hidden\" name=\"tinID\" value=\"".$value->tinID."\">";?> 
  	<div class="for-admin">
  		<hr>
  	 <div class="check-box-item row-check-box" style="border:none;">
  	 	<div class="column-check-box" style="width:50%;">
  	 		<label class="label-container">
  	 			<span class="cont">Duyệt tin</span>
  	 			<input type="radio" checked="checked" name="xuli" value="duyettin">
  	 			<span class="checkmark"></span>
  	 		</label>
  	 	</div>
  	 	<div class="column-check-box" style="width:50%;">
  	 		<label class="label-container">
  	 			<span class="cont">Từ chối tin</span>
  	 			<input type="radio" checked="checked" name="xuli" value="tuchoitin">
  	 			<span class="checkmark"></span>
  	 		</label>
  	 	</div>
     <button class='continue' type='submit'>
	    <div id="over" style="max-width: 100%;margin: auto;display:table">
	     	<span class='vertical-align-middle-1'>Xử lí</span>
			<div class='pull-right-1'><i class='fa fa-angle-right' style="font-size:24px;"></i></div>
		</div>
	</button>
</div>
</div>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="best-column-1" style="background-color: transparent;">
	<div class="content-aside">
		<?php
			$select_name = "SELECT name from account where sdt = ".$value->sdt_acc_dang;
			$names = DB::Select($select_name);
			$name = $names[0];
			if (strlen($name->name) > 21)
			{
				if (strlen($name->name) > 24)
					$name->name = substr($name->name, 0, 24);
				for ($j = 21; $j < strlen($name->name); ++$j)
					$name->name[$j] = '.';
			}
		?>
		<div class="info-user" style="width:100%;border-bottom:1px solid #ddd;margin:0;padding:0px 10px 10px 10px;">
			<h4 style="font-family:Arial;margin-top:0;font-weight:600;"><?php echo $name->name; ?></h4>
			<div style='font-family:Verdana;'>
			<?php 
				if (trim($value->loaiNguoiDang) == "Cá nhân")
					echo "<i class=\"fa fa-google-plus-circle\" style='font-size:20px;color:blue;'></i>";
				else
					echo "<i class=\"fa fa-html5\" style='font-size:20px;color:blue;'></i>";
				echo "<span style='padding:0px 5px;'>". $value->loaiNguoiDang."</span>";
			?>

			</div>
		</div>
		<div id="button-visible-number" style="margin:8px 0px 15px;">
			<button onclick="Visible()"><i class="fa fa-phone" style="font-size:20px;"></i><span> Nhấn để hiện số</span></button>
		</div>
		<div id="phone-user" style="width:100%;border:none;padding:10px;text-align:center;position:relative;">
			<h4 style="font-weight:bold;font-size:20px;font-family:'Comic Sans MS';color:#221098;"><?php echo "0".$value->sdt_acc_dang; ?></h4>
			<div style="font-size:12px;margin-bottom:25px;">Nhắc đến Chợ Tốt khi liên hệ người bán để giao dịch thuận lợi hơn nhé!</div>
			<button style="background-color:transparent;font-size:20px;border:none;position:absolute;right:0;bottom:0;" title="Ẩn số điện thoại" onclick="Hidden()"><i class="fa fa-toggle-up"></i></button>
		</div>
		
	</div>
</div>
</div>
</div>

<script>
	function Visible() {
		var phone = document.getElementById("phone-user");
		phone.style.display = "block";
		var btn = document.getElementById("button-visible-number");
		btn.style.display = "none";
	}

	function Hidden() {
		var btn = document.getElementById("button-visible-number");
		btn.style.display = "block";
		var phone = document.getElementById("phone-user");
		phone.style.display = "none";
	}
</script>
@endsection