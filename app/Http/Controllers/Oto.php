<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Oto extends Controller
{
	public function getDong(Request $request){
    	$hsxoto = $request->input('hsxoto');
    	$request->session()->put('hsxoto',$hsxoto);
    	$dongoto = DB::select('Select distinct DongOto.tenDong from DongOto where 
    	 DongOto.tenHang = ?',[trim($hsxoto)]);
    	return view('oto.chonDong',['dongoto'=>$dongoto]);
    }
    public function getKieuDang(Request $request){
    	$hsxoto =  $request->session()->get('hsxoto');
    	$dongoto = $request->input('dongoto');
    	$request->session()->put('dongoto',$dongoto);
    	$kieudang = DB::select('Select distinct kieuDang from DongOto where 
    		 DongOto.tenHang = ? and DongOto.tenDong = ? ',
    		[trim($hsxoto), trim($dongoto)]);
    	return view('oto.chonKieuDang',['kieudang'=>$kieudang]);
    }

    public function getSoCho(Request $request){
    	$kieudang = $request->input('kieudang');
    	$request->session()->put('kieudang',$kieudang);
    	$dongoto =  $request->session()->get('dongoto');
 		$hsxoto =  $request->session()->get('hsxoto');
    	$socho = DB::select('Select distinct soCho from DongOto where 
    		DongOto.tenHang = ? and DongOto.kieuDang = ?  and DongOto.tenDong = ? ',
    		[trim($hsxoto),trim($kieudang), trim($dongoto)]);
    	return view('oto.chonSoCho',['socho'=>$socho]);
    }

    public function xemLaiTinDang(Request $request){
    	$socho = $request->input('socho');
    	$request->session()->put('socho',$socho);
    	return view('oto.xemLaiTinDang');
    }

    public function xemTinOto(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinBanOto(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemTinBanOto',['info' => $info, 'image'=>$image]);
    }

    public function dangTinOto(Request $request){
        $sdt = $request->session()->get('sdt');
        $mien =  $request->session()->get('mien');
        $tinhthanh =  $request->session()->get('tinhthanh');
        $quanhuyen =  $request->session()->get('quanhuyen');
        $danhmuc =  $request->session()->get('danhmuc');
        $loaitin =  $request->session()->get('loaitin');
        $loainguoidang =  $request->session()->get('loainguoidang');
        $mota = $request->session()->get('mota');
        $thongtinvanchuyen=  $request->session()->get('thongtinvanchuyen');
        $tieude = $request->session()->get('tieude');
        $images = $request->session()->get('image');
        $hsxoto =  $request->session()->get('hsxoto');
        $dongoto = $request->session()->get('dongoto');
        $kieudang = $request->session()->get('kieudang');
        $socho = $request->session()->get('socho');
        $tinhtrangsanpham = $request->session()->get('tinhtrangsanpham');
        $gia = $request->session()->get('gia');

        $tin = DB::select('select dang_tin_ban_oto(?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
            trim($mien),
            trim($tinhthanh), 
            trim($quanhuyen),
            trim($tieude),
            trim($mota),
            trim($thongtinvanchuyen),
            trim($loainguoidang),
            trim($sdt),
            trim($hsxoto),
            trim($dongoto),
            trim($kieudang),
            trim($socho),
            trim($tinhtrangsanpham),
            trim($gia)
        ]);
        $tin_id = 0;
        foreach($tin as $value)
            foreach ($value as $value1) {
                $tin_id = $value1;
            }
        if ($tin_id > 0){
            foreach ($images as $image){
                DB::insert('insert into image values (?)',[trim($image)]);
                DB::insert('insert into tinimage values (?,?)',[trim($tin_id), trim($image)]);
            }
        }

        $request->session()->forget('mien');
        $request->session()->forget('tinhthanh');
        $request->session()->forget('quanhuyen');
        $request->session()->forget('danhmuc');
        $request->session()->forget('loaitin');
        $request->session()->forget('loainguoidang');
        $request->session()->forget('mota');
        $request->session()->forget('thongtinvanchuyen');
        $request->session()->forget('tieude');
        $request->session()->forget('image');
        $request->session()->forget('tinhtrangsanpham');
        $request->session()->forget('hsxoto');
        $request->session()->forget('dongoto');
        $request->session()->forget('kieudang');
        $request->session()->forget('socho');

        return redirect('trang-chu');
        
    }
}
