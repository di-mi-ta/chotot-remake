<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class XeMay extends Controller
{
	public function getDong(Request $request){
    	$hsxxemay = $request->input('hsxxemay');
    	$request->session()->put('hsxxemay',$hsxxemay);
    	$dongxemay = DB::select('Select distinct DongXeMay.tenDong from DongXeMay where 
    	 DongXeMay.tenHang = ?',[trim($hsxxemay)]);
    	return view('xemay.chonDong',['dongxemay'=>$dongxemay]);
    }

    public function xemLaiTinDang(Request $request){
    	$dongxemay = $request->input('dongxemay');
    	$request->session()->put('dongxemay',$dongxemay);
    	return view('xemay.xemLaiTinDang');
    }

    public function xemTinXeMay(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinBanXeMay(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemTinBanXeMay',['info' => $info, 'image'=>$image]);
    }

       public function dangTinXeMay(Request $request){
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
        $hsxxemay =  $request->session()->get('hsxxemay');
        $dongxemay = $request->session()->get('dongxemay');
        $tinhtrangsanpham = $request->session()->get('tinhtrangsanpham');
        $gia = $request->session()->get('gia');
        
       $tin = DB::select('select dang_tin_ban_xemay(?,?,?,?,?,?,?,?,?,?,?,?)',[
            trim($mien),
            trim($tinhthanh), 
            trim($quanhuyen),
            trim($tieude),
            trim($mota),
            trim($thongtinvanchuyen),
            trim($loainguoidang),
            trim($sdt),
            trim($hsxxemay),
            trim($dongxemay),
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
        $request->session()->forget('hsxxemay');
        $request->session()->forget('dongxemay');

        return redirect('trang-chu');
        
    }
    
}
