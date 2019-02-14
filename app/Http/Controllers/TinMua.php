<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class TinMua extends Controller
{
    public function xemTinMua(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinMua(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemTinMua',['info' => $info, 'image'=>$image]);
    }


    public function dangTinMua(Request $request){
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
        $tinhtrangsanpham = $request->session()->get('tinhtrangsanpham');


        $tin = DB::select('select dang_tin_mua(?,?,?,?,?,?,?,?,?,?)',[
            trim($mien),
            trim($tinhthanh), 
            trim($quanhuyen),
            trim($tieude),
            trim($mota),
            trim($danhmuc),
            trim($thongtinvanchuyen),
            trim($loainguoidang),
            trim($sdt),
            trim($tinhtrangsanpham)
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

        return redirect('trang-chu');
    }
}
