<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class MyController extends Controller
{
    public function getDangtin(){
        if (session()->has('sdt')){
            $danhmuc = DB::select('call getDanhMucChung();');
    	   return view('DangTinChung.chonDanhMuc',['danhmuc'=>$danhmuc]);
        }
        else return view('Account.login');
    }

    public function getDanhMucCon(Request $request){
        $danhmuc = $request->input('danhmuc');
        $request->session()->put('danhmuc', $danhmuc);
        $num = DB::select('select countNumbersOfDanhMucCon(?) as num',[$danhmuc]);
        $i = 0;
        foreach ($num  as $value) {
            $i = $value->num;
        }
        
        if ($i > 0){
            $danhmuccon = DB::select('call get_danhmuccon(?);',[$danhmuc]);
            return view('DangTinChung.chonDanhMuc',['danhmuc'=>$danhmuccon]);
        } 
        else {
            $mien = DB::select('Select * from mien');
            return view('DangTinChung.chonmien',['mien'=>$mien]);
        }
        
    }


    public function getTinhThanh(Request $request){
    	$mien = $request->input('mien');
        $request->session()->put('mien', $mien);
		$tinhthanh = DB::select('Select * from tinhthanh where tenMien = ?',[$mien]);
		return view('DangTinChung.chontinhthanh',['tinhthanh' => $tinhthanh]);
    }

    public function getQuanHuyen(Request $request){
		$tinhthanh = $request->input('tinhthanh');
        $request->session()->put('tinhthanh', $tinhthanh);
		$quanhuyen = DB::select('Select * from quanhuyen where tenTinhTP = ?',[$tinhthanh]);
		return view('DangTinChung.chonquanhuyen',['quanhuyen'=>$quanhuyen]);
    }

    public function getLoaiTin(Request $request){
        $quanhuyen = $request->input('quanhuyen');
        $request->session()->put('quanhuyen', $quanhuyen);
        return view('DangTinChung.chonLoaiTin');
    }

    public function getLoaiNguoiDang(Request $request){
        $loaitin = $request->input('loaitin');
        $request->session()->put('loaitin', $loaitin);
        $loainguoidang = DB::select('Select * from loaitindang');
        return view('DangTinChung.chonLoaiNguoiDang',['loainguoidang' => $loainguoidang]);
    }

    public function layThongTinChung(Request $request){
        $loainguoidang = $request->input('loainguoidang');
        $request->session()->put('loainguoidang', $loainguoidang);
        return view('DangTinChung.ThongTinChung');
    }

    public function image(Request $request){
        $mota = $request->input('mota');
        $tieude = $request->input('tieude');
        $thongtinvanchuyen = $request->input('thongtinvanchuyen');
        $tinhtrangsanpham = $request->input('tinhtrangsanpham');

        $request->session()->put('mota', $mota);
        $request->session()->put('tieude', $tieude);
        $request->session()->put('thongtinvanchuyen', $thongtinvanchuyen);
        $request->session()->put('tinhtrangsanpham', $tinhtrangsanpham);
        return view('DangTinChung.uploadImage');

    }

    public function uploadImage(Request $request){
        $image = array();
        if($request->hasFile(trim('image'))){
          $file = $request->image;
          $time = getdate()[0];
          foreach($file as $value){
              $filename = $value->getClientOriginalName();
              $value->move('img', $time.$filename);
              array_push($image, $time.$filename);
          }
        }
        $request->session()->put('image', $image);
        if (trim($request->session()->get('loaitin')) == "Cần mua"){  
            return view('tinmua.xemLaiTinDang');  
        }
        else {
            return view('tinban.chonGia');

        }
    }

    public function chuyenTiep(Request $request){
        $gia = $request->input('gia');
        $request->session()->put('gia', $gia);
        if (trim($request->session()->get('danhmuc')) == "Ô tô"){
           $hsxoto = DB::select('select tenHang from hsxoto');
            return view('oto.ChonHSXOto',['hsxoto'=>$hsxoto]);
        }  
        elseif(trim($request->session()->get('danhmuc')) == "Xe máy") {
            $hsxxemay = DB::select('select tenHang from hsxxemay');
            return view('xemay.chonHSXXeMay',['hsxxemay'=>$hsxxemay]);
        }
    }


    public function locTin(Request $request){
        $loaiNgDang = $request->input('loaiNgDang');
        $loailoc = $request->input('loailoc');

        $tinUutien = DB::select("call locTinUuTien()");
        $tinDacbiet = DB::select("call locTinDacBiet()");

        if (trim($loailoc) == 0){
            if (trim($loaiNgDang ==  "Cá nhân")){
                $tin = DB::select("select * from tindang where trangThaiTin = 'Kích hoạt'
                and loaiNguoiDang = 'Cá nhân' order by ngaydang desc");
            }
            elseif (trim($loaiNgDang == "Bán chuyên")){
                $tin = DB::select("select * from tindang where trangThaiTin = 'Kích hoạt' and loaiNguoiDang = 'Bán chuyên' order by ngaydang desc");
            }
            else {
                 $tin = DB::select("select * from tindang where trangThaiTin = 'Kích hoạt' order by ngaydang desc");
            }
        }
        else if (trim($loailoc) == 1){
            if (trim($loaiNgDang ==  "Cá nhân")){
                $tin = DB::select("select * from tindang,tinban where tinID = tinBanID and trangThaiTin = 'Kích hoạt'
                and loaiNguoiDang = 'Cá nhân' order by price asc");
            }
            elseif (trim($loaiNgDang == "Bán chuyên")){
                $tin = DB::select("select * from tindang,tinban where tinID = tinBanID and trangThaiTin = 'Kích hoạt' and loaiNguoiDang = 'Bán chuyên' order by price asc");
            }
            else {
                 $tin = DB::select("select * from tindang,tinban where tinID = tinBanID and trangThaiTin = 'Kích hoạt' order by price asc");
            }
        }
        return view('trangchu',['tin'=>$tin,'loaiNgDang' => $loaiNgDang, 'tinUutien'=>$tinUutien,'tinDacbiet'=>$tinDacbiet]);
    }
}
