<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AdminDuyet extends Controller
{
    public function xemXetTinBanOto(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinBanOto(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemXetTinBanOto',['info' => $info, 'image' => $image ]);

    }

    public function xemXetTinBanXeMay(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinBanXeMay(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemXetTinBanXeMay',['info' => $info, 'image' => $image ]);

    }

    public function xemXetTinMua(Request $request){
        $tinID = $request->input('idTin');
        $info = DB::select('call getInfoTinMua(?);',[$tinID]);
        $image = DB::select('call getImageOfTin(?)',[$tinID]);
        return view('xemtin.xemXetTinMua',['info' => $info, 'image' => $image ]);

    }

    public function xuLiTin(Request $request){
    	$sdt = $request->session()->get('sdt');
        $xuli = $request->input('xuli');
        $tinID = $request->input('tinID');
        if ($xuli == 'duyettin'){
        	DB::select('call duyetTin(?,?);',[$tinID,$sdt]);
        }
        if ($xuli == 'tuchoitin'){
        	DB::select('call tuChoiTin(?,?);',[$tinID,$sdt]);
        }
        return redirect('trang-chu-admin');
    }
}
