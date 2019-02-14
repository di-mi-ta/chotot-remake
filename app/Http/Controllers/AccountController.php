<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function getLogin(){
    	return view('Account.login');
    }

    public function getTrangchu(){
        $tin = DB::select("select * from tindang where trangThaiTin = 'Kích hoạt' order by ngaydang desc");
        $loaiNgDang = "Tất cả";
        $tinUutien = DB::select("call locTinUuTien()");
        $tinDacbiet = DB::select("call locTinDacBiet()");
        return view('trangchu',['tin'=>$tin,'tinUutien'=>$tinUutien,'tinDacbiet'=>$tinDacbiet, 'loaiNgDang'=>$loaiNgDang]);
    }

    public function getTrangchuAdmin(){
        if (session()->has('sdt')){
            if(session()->get('isAdmin') == 1){
                return view('trangChuAdmin');
            }
        }
        return redirect('trang-chu');
    }

    public function xuliLogin(Request $request){
    	$sdt = trim($request->input('sdt'));
    	$password = trim($request->input('password'));
    	$data = DB::select('select * from account where sdt = ? and password = ?',[$sdt,$password]);
    	if (count($data) > 0){
   	    	$request->session()->put('sdt',$data[0]->sdt);
   	    	$request->session()->put('name', $data[0]->name);
   	    	$request->session()->put('email', $data[0]->email);
            $request->session()->put('isAdmin', $data[0]->isAdmin);
	    	if ($data[0]->isAdmin == 1)
                return redirect('trang-chu-admin');
            else return redirect('trang-chu');
    	}
    	else echo "Đăng nhập không thành công!!!";

    }

    public function xuliLogOut(Request $request){
    	if ($request->session()->has('sdt')){
    		$request->session()->flush();
    		return redirect('dang-nhap');
    	}
    }
}
