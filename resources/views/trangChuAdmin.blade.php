@extends('layout.AdminHeader')
@section('content')
<?php
	function myTrim($tname, $x)
	{
		$name = $tname;
		if (strlen($name) > $x)
		{

			if (strlen($name) > ($x + 3))
				$name = substr($name, 0, $x + 3);
			for ($j = $x; $j < strlen($name); ++$j)
				$name[$j] = '.';
		}
		return $name;
	}
?>
<div class="super-super-container">
<h2 style='font-weight:bold;padding-top:10px;padding-left:11px;font-family:Arial;font-size:16px;'>Danh sách tin đợi duyệt</h2>
<div class="super-container">
<div class="best-best-container best-column">
<div class="best-container" style="padding: 5px 11px;">
<?php
	$tin = DB::select('call locTinChuaDuyet()');
	foreach ($tin as $value) {

		echo "<div class='tra-row-1' style='width:100%;padding:10px;padding-left:0;position:relative;'>";

		$select_img = 'select tenImage from tinimage where tinID = '.trim($value->tinID);
		$hinh = DB::select($select_img);

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
				echo "<div class='tra-column-01'>";
				echo "<form action='xem-xet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 style='margin:0;font-weight:400;font-size:18px;font-family:Tahoma;'>".myTrim($value->tieuDe, 22);
				echo "<span style='font-size:16px;color:#3CB371;font-family:\"Trebuchet MS\"'> (Tin bán)</span></h3>";
				$d = strtotime($value->ngayDang);
				echo "<p><p class='vitri-thoigian'>Đăng lúc ".date("d-m-Y", $d)." ".date("h:i", $d)."</p></p>";
				echo "<h5 style='font-weight:bold;position:absolute;bottom:0;left:25% + 10px;'>0".$value->sdt_acc_dang." (".$value->loaiNguoiDang.")</h5>";
				echo "</div>";
			}
			elseif ($value->id_danhmuc == $i2){
				echo "<div class='tra-column-01'>";
				echo "<form action='xem-xet-tin-ban-xe-may' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 style='margin:0;font-weight:400;font-size:18px;font-family:Tahoma;'>".myTrim($value->tieuDe, 22);
				echo "<span style='font-size:16px;color:#3CB371;font-family:\"Trebuchet MS\"'> (Tin bán)</span></h3>";
				$d = strtotime($value->ngayDang);
				echo "<p><p class='vitri-thoigian'>Đăng lúc ".date("d-m-Y", $d)." ".date("h:i", $d)."</p></p>";
				echo "<h5 style='font-weight:bold;position:absolute;bottom:0;left:25% + 10px;'>0".$value->sdt_acc_dang." (".$value->loaiNguoiDang.")</h5>";
				echo "</div>";
			}		
		}
		else{
				echo "<div class='tra-column-01'>";
				echo "<form action='xem-xet-tin-mua' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:none;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02' >";
				echo "<h3 style='margin:0;font-weight:400;font-size:18px;font-family:Tahoma;'>".myTrim($value->tieuDe, 22);
				echo "<span style='font-size:16px;color:#3CB371;font-family:\"Trebuchet MS\"'> (Tin mua)</span></h3>";
				$d = strtotime($value->ngayDang);
				echo "<p><p class='vitri-thoigian'>Đăng lúc ".date("d-m-Y", $d)." ".date("h:i", $d)."</p></p>";
				echo "<h5 style='font-weight:bold;position:absolute;bottom:0;left:25% + 10px;'>0".$value->sdt_acc_dang." (".$value->loaiNguoiDang.")</h5>";
				echo "</div>";
		}
		echo "</div>";
	}
	if (count($tin) == 0)
		echo "<div class='no-item'>Bạn chưa có tin nào trong mục này</div>";
?>
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

@endsection