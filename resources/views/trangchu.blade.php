@extends('layout.UserHeader')
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
<h2 style='font-weight:bold;padding-top:10px;padding-left:11px;font-family:Arial;font-size:16px;'>Mua bán Xe cộ trên toàn quốc</h2>
<div style='padding: 5px 11px;'>

		<div class="super-container">
		<div class="best-best-container best-column">
		<div class="myTitle" style="border:1px solid #ddd;border-right:none;margin-bottom: 20px;padding:0px 10px;">
			<h3 style='font-weight:bold;padding-top:10px;font-family:Arial;font-size:16px;margin:0;font-family:Verdana;'>
				<div style="width:100%;">
				<span>Tin đặc biệt</span><span style="text-align:right;width:70%;font-size:14px;float:right;font-weight:normal;"><a href="http://trogiup.chotot.com/ban-hang-tai-chotot-vn/tin-dac-biet/tin-dac-biet-la-gi/" target="_blank" style="color:DodgerBlue;font-style:italic;">Tăng gấp đôi cơ hội bán được hàng với Tin đặc biệt <i class='fa fa-question-circle-o' style="font-size:16px;"></i></a></span>
			</div>
			</h3>
		<div class="forTinDB" style="display:flex;">
			<?php
			//Xong thì mở khóa ra
			$num_1 = 5;
			if (count($tinDacbiet) < 5)
				$num_1 = count($tinDacbiet);
			for ($x = 0; $x < $num_1; ++$x)
			{
				$value = $tinDacbiet[$x];
				$select_img = 'select tenImage from tinimage where tinID = '.$value->tinID;
				$hinh = DB::select($select_img);

				$cTinMuat5 = DB::select("select checkIsTinMua(?) as check_",[$value->tinID]);
				$jt5 = 0;
				foreach ($cTinMuat5 as $valuet5) {
					$jt5 = $valuet5->check_;
				}

				echo "<div class='t-tra-column tra-row-1' style='width:20%;padding:10px;padding-left:0;display:inline;border:none;'>";
				echo "<div class='tra-column-03'>";
				if ($jt5 == 0){
					$id_danhmuct5 = DB::select("select getIDDanhMuc('Ô tô') as _id_danhmuc");
					$it5 = -1;
					foreach ($id_danhmuct5 as $valuett5) {
						$it5 = $valuett5->_id_danhmuc;
					}

					$id_danhmuct52 = DB::select("select getIDDanhMuc('Xe máy') as _id_danhmuc");
					$it52 = -1;
					foreach ($id_danhmuct52 as $valuett52) {
						$it52 = $valuett52->_id_danhmuc;
					}
					if ($value->id_danhmuc == $it5){
						echo "<form action='chi-tiet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
					}
					elseif ($value->id_danhmuc == $it52){
						echo "<form action='chi-tiet-tin-ban-xe-may' method=\"POST\"  role=\"form\" style='width:100%;'>";
					}
				}
				else {
					echo "<form action='chi-tiet-tin-mua' method=\"POST\"  role=\"form\" style='width:100%;'>";
				}

				
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:1px solid #bbb;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:80px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-04' style='padding-left:0;border-top:none;'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:16px;font-family:Arial;'>".myTrim($value->tieuDe, 14)."</h3>";
				$select_price = 'select price from tinban where tinBanID = '.$value->tinID;
				$price = DB::select($select_price);
				$y = "Tin mua";
				if (count($price) > 0)
					$y = number_format($price[0]->price, 0, ".", ".")." đ";
				echo "<p class='giaca' style='font-size:13px;color:#c90927;font-weight:600;padding-top:4px;'>".$y."</p>";
				$d = strtotime($value->ngayDang);
				echo "</div></div>";
			}
		?>
		</div>
		</div>
		<div class="myTitle" style="border:1px solid #ddd;border-right:none;margin-bottom: 20px;padding:0px 10px;">
			<h3 style='font-weight:bold;padding-top:10px;font-family:Arial;font-size:16px;margin:0;font-family:Verdana;'>
				<div style="width:100%;">
				<span>Tin ưu tiên</span><span style="text-align:right;width:70%;font-size:14px;float:right;font-weight:normal;"><a href="http://trogiup.chotot.com/ban-hang-tai-chotot-vn/tin-dac-biet/tin-dac-biet-la-gi/" target="_blank" style="color:DodgerBlue;font-style:italic;">Tăng gấp đôi cơ hội bán được hàng với Tin ưu tiên <i class='fa fa-question-circle-o' style="font-size:16px;"></i></a></span>
			</div>
			</h3>
		<div class="forTinUT" style="display:flex;">
		
		<?php
			$num_1 = 5;
			if (count($tinUutien) < 5)
				$num_1 = count($tinUutien);
			for ($x = 0; $x < $num_1; ++$x)
			{
				$value = $tinUutien[$x];
				$select_img = 'select tenImage from tinimage where tinID = '.$value->tinID;
				$hinh = DB::select($select_img);

				$cTinMuat6 = DB::select("select checkIsTinMua(?) as check_",[$value->tinID]);
				$jt6 = 0;
				foreach ($cTinMuat6 as $valuet6) {
					$jt6 = $valuet6->check_;
				}

				echo "<div class='t-tra-column tra-row-1' style='width:20%;padding:10px;padding-left:0;display:inline;border:none;'>";
				echo "<div class='tra-column-03'>";

				if ($jt6 == 0){
					$id_danhmuct6 = DB::select("select getIDDanhMuc('Ô tô') as _id_danhmuc");
					$it6 = -1;
					foreach ($id_danhmuct6 as $valuett6) {
						$it6 = $valuett6->_id_danhmuc;
					}

					$id_danhmuct62 = DB::select("select getIDDanhMuc('Xe máy') as _id_danhmuc");
					$it62 = -1;
					foreach ($id_danhmuct62 as $valuett62) {
						$it62 = $valuett62->_id_danhmuc;
					}
					if ($value->id_danhmuc == $it6){
						echo "<form action='chi-tiet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
					}
					elseif ($value->id_danhmuc == $it62){
						echo "<form action='chi-tiet-tin-ban-xe-may' method=\"POST\"  role=\"form\" style='width:100%;'>";
					}
				}
				else {
					echo "<form action='chi-tiet-tin-mua' method=\"POST\"  role=\"form\" style='width:100%;'>";
				}	

				echo "<form action='chi-tiet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:1px solid #bbb;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:80px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-04' style='padding-left:0;border-top:none;'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:16px;font-family:Arial;'>".myTrim($value->tieuDe, 14)."</h3>";
				$select_price = 'select price from tinban where tinBanID = '.$value->tinID;
				$price = DB::select($select_price);
				$y = "Tin mua";
				if (count($price) > 0)
					$y = number_format($price[0]->price, 0, ".", ".")." đ";
				echo "<p class='giaca' style='font-size:13px;color:#c90927;font-weight:600;padding-top:4px;'>".$y."</p>";
				$d = strtotime($value->ngayDang);
				echo "</div></div>";
			} 
		?>
		</div>
	</div>
		<div class="all-filter">
		<form action = 'trangchu' name ='mForm1' method = "POST" style="display:flex;">
		<div id="myBtnContainer" class="filter-column-1" style="flex:62%;border:1px solid #ddd;border-right:none;">
			<input id="hidden-input-common1" type="hidden" name="loaiNgDang" value="">
			<?php
				$x = 0;
				if ($loaiNgDang === "Tất cả")
					$x = 1;
				else if ($loaiNgDang === "Cá nhân")
					$x = 2;
				else if ($loaiNgDang === "Bán chuyên")
					$x = 3;
				else 
					$x = 1;

				echo '<button type="button" class="xx-btn'; 
				if ($x == 1)
					echo ' xx-active';
				echo '" onclick="get_value_final_1(\'Tất cả\')" > Tất cả</button>';
				echo '<button type="button" class="xx-btn'; 
				if ($x == 2)
					echo ' xx-active';
				echo '" onclick="get_value_final_1(\'Cá nhân\')" > Cá nhân</button>';
				echo '<button type="button" class="xx-btn'; 
				if ($x == 3)
					echo ' xx-active';
				echo '" onclick="get_value_final_1(\'Bán chuyên\')" > Bán chuyên</button>';
			?>
		</div>
		<div class="filter-column-1-1 custom-select" style="flex:19%;">
			<select name = 'loailoc'>
	    		<option value="0">Tin mới trước</option>
	    		<option value="1">Giá thấp trước</option>
	  		</select>
		</div>
		
	
	<div class="filter-column-2" style="flex:11%;border:1px solid #ddd;border-left:none;padding:5px;padding-right:0px;padding-left:12px;">
		<div id="btnContainer" style="max-width:90%;margin-right:0px;">
			<button class="luan-btn luan-active" onclick="listView()" type="button" title="Sắp xếp kiểu danh sách" style="padding:7px 11px;"><i class="fa fa-bars"></i></button> 
			<button class="luan-btn" onclick="gridView()" type="button" title="Sắp xếp kiểu lưới" style="padding:7px 11px;"><i class="fa fa-th-large"></i></button>
		</div>
	</div>
	</form>
</div>
<div class="best-container">
<?php 
	$i_tin_dang = 0;
	$full_tin = array_merge($tin);
	//$full_tin = array_merge($tinDacbiet, $full_tin);
	foreach ($full_tin as $value) {
		if ($i_tin_dang % 3 == 0)
			echo "<div class='tra-row'>";
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
				//$hinh[0]->tenImage

				
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-ban-o-to' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:1px solid #ddd;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".myTrim($value->tieuDe, 22)."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>".number_format($price[0]->price, 0, ".", ".")." đ</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				echo "<span class='vitri-thoigian' style='font-style:italic;color:#6495ED;'>".$value->loaiNguoiDang."</span>";
				echo "</div>";
			}	
			elseif ($value->id_danhmuc == $i2){
				
				$select_price = 'select price from tinban where tinBanID = '.$value->tinID;
				$price = DB::select($select_price);
				//$hinh[0]->tenImage

				
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-ban-xe-may' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:1px solid #ddd;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".myTrim($value->tieuDe, 22)."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>".number_format($price[0]->price, 0, ".", ".")." đ</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				echo "<span class='vitri-thoigian' style='font-style:italic;color:#6495ED;'>".$value->loaiNguoiDang."</span>";
				echo "</div>";
			}
		}
		else{
				echo "<div class='tra-column-01'>";
				echo "<form action='chi-tiet-tin-mua' method=\"POST\"  role=\"form\" style='width:100%;'>";
				echo "<input type = 'hidden' name='idTin' value='".$value->tinID."'>";
				echo "<button style='background-color:transparent;border:1px solid #ddd;padding:0;width:100%;' type='submit'><img src='img/".$hinh[0]->tenImage."' alt='".$hinh[0]->tenImage."' style='width:100%;height:100px;'></button></form>";
				echo "</div>";
				echo "<div class='tra-column-02'>";
				echo "<h3 class='tde' style='margin:0;font-weight:bold;font-size:18px;font-family:Arial;'>".myTrim($value->tieuDe, 22)."</h3>";
				echo "<p class='giaca' style='font-size:16px;color:#c90927;font-weight:600;'>Tin mua</p>";
				$d = strtotime($value->ngayDang);
				echo "<p class='vitri-thoigian'>".date("d-m-Y", $d)." ".date("h:i", $d)." | ".$local[0]->tenTinhTP."</p>";
				echo "<span class='vitri-thoigian' style='font-style:italic;color:#6495ED;'>".$value->loaiNguoiDang."</span>";
				echo "</div>";
		}
		echo "</div>";
		if ($i_tin_dang % 3 == 2)
			echo "</div>";
		$i_tin_dang++;
	}
	if ($i_tin_dang % 3 != 0)
		echo "</div>";
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
</div>
<script>
	// Get the elements with class="column"
	var elements = document.getElementsByClassName("tra-column");

	// Declare a loop variable
	var i;

	// List View
	function listView() {
    	for (i = 0; i < elements.length; i++) {
        	elements[i].style.width = "100%";
        	elements[i].style.display = "flex";
        	elements[i].style.borderBottom = "1px solid #ccc";
        	elements[i].style.float = "none";
        	var column_right = elements[i].getElementsByClassName("tra-column-02");
        	column_right[0].style.paddingLeft = "10px";
        	column_right[0].style.paddingTop = "2px";
        	column_right[0].style.border = "none";
        	column_right[0].style.boxShadow = "none";
        	var column_left = elements[i].getElementsByClassName("tra-column-01");
        	column_left[0].style.boxShadow = "none";
        	var tieuDe = column_right[0].getElementsByClassName("tde");
        	tieuDe[0].style.fontSize = "18px";
        	var gia = column_right[0].getElementsByClassName("giaca");
        	gia[0].style.fontSize = "16px";
    	}
	}

	// Grid View
	function gridView() {
    	for (i = 0; i < elements.length; i++) {
        	elements[i].style.width = "33.33%";
        	elements[i].style.display = "block";
        	elements[i].style.borderBottom = "none";
        	elements[i].style.float = "left";
        	var column_right = elements[i].getElementsByClassName("tra-column-02");
        	column_right[0].style.paddingLeft = "1px";
        	column_right[0].style.paddingTop = "10px";
        	column_right[0].style.border = "1px solid #ccc";
        	column_right[0].style.borderTop = "none";
        	column_right[0].style.boxShadow = "rgba(0, 0, 0, 0.2) 0px 4px 8px 0px";
        	var column_left = elements[i].getElementsByClassName("tra-column-01");
        	column_left[0].style.boxShadow = "rgba(0, 0, 0, 0.2) 0px 4px 8px 0px";
        	var tieuDe = column_right[0].getElementsByClassName("tde");
        	tieuDe[0].style.fontSize = "16px";
        	var gia = column_right[0].getElementsByClassName("giaca");
        	gia[0].style.fontSize = "14px";
    	}
	}

	/* Optional: Add active class to the current button (highlight it) */
	var container = document.getElementById("btnContainer");
	var btns = container.getElementsByClassName("luan-btn");
	for (var i = 0; i < btns.length; i++) {
  		btns[i].addEventListener("click", function(){
    		var current = document.getElementsByClassName("luan-active");
    		current[0].className = current[0].className.replace(" luan-active", "");
    		this.className += " luan-active";
  		});
	}
   	function get_value_final_1(value_final) {
   		//alert("C++");
   		var input = document.getElementById('hidden-input-common1');
		input.value = value_final;
		document.mForm1.submit();
   	}
</script>
@endsection