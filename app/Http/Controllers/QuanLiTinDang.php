<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class QuanLiTinDang extends Controller
{
    public function quanLiTinDang(){
    	$user = trim(session('sdt'));
    	$tinbt_user = DB::select('call getTinOfUser(?)',[$user]);
        $tinan_user = DB::select('call locTinBiTuChoiOfUser(?)',[$user]);
    	return view('tindang.quanlitindang',['tinbt'=>$tinbt_user,'tinan'=>$tinan_user]);
    }

    public function muaDichVu(Request $request){
    	$tinID = $request->input('idTin');
        $request->session()->put('tinID',$tinID);
    	$loaiDV = DB::select('call getLoaiDichVu();');
    	return view('DichVu.chonLoaiDichVu',['loaiDV'=>$loaiDV]);
    }

    public function chonDichVu(Request $request){
        $loaiDV = $request->input('loaiDV');
        //$request->session()->put('loaiDV',$loaiDV);
        $DV = DB::select('call getDichVuOfLoaiDichVu(?);',[trim($loaiDV)]);
        return view('DichVu.chonDichVu',['DV'=>$DV]);
    }

    public function xoaTin(Request $request){
        $tinID = $request->input('idTin');
        DB::select('call deleteTin(?);',[trim($tinID)]);
        $user = trim(session('sdt'));
        $tinbt_user = DB::select('call getTinOfUser(?)',[$user]);
        $tinan_user = DB::select('call locTinBiTuChoiOfUser(?)',[$user]);
        return view('tindang.quanlitindang',['tinbt'=>$tinbt_user,'tinan'=>$tinan_user]);
    }

    public function thanhToanDichVu(Request $request){
        $tinID = $request->session()->get('tinID');
        $DV = $request->input('DV');
        $thanhtoan = DB::select('select buyServiceForTin(?,?) as success;',[trim($tinID),trim($DV)]);
        $i = 0;
        foreach ( $thanhtoan as $value)
            $i = $value->success;
        if ($i == 1)
             $request->session()->flash('status', 'Giao dịch thành công!');
        else  $request->session()->flash('status', 'Giao dịch thất bại!');
        
        $request->session()->forget('tinID');
        return redirect('quan-li-tin-dang');
    }
}
