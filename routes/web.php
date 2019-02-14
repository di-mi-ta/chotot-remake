<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('dang-nhap','AccountController@getLogin');
Route::post('dang--nhap','AccountController@xuliLogin');
Route::get('dang-xuat','AccountController@xuliLogOut');

Route::get('trang-chu','AccountController@getTrangchu');
Route::post('trangchu','MyController@locTin');
Route::get('trang-chu-admin','AccountController@getTrangchuAdmin');

Route::post('image', 'MyController@image');

Route::get('dang-tin','MyController@getDangTin');
Route::post('chon-danh-muc-con','MyController@getDanhMucCon');
Route::post('chon-tinh-thanh','MyController@getTinhThanh');
Route::post('chon-quan-huyen','MyController@getQuanHuyen');
Route::post('chon-loai-tin','MyController@getLoaiTin');
Route::post('chon-loai-nguoi-dang','MyController@getLoaiNguoiDang');
Route::post('lay-thong-tin-chung','MyController@layThongTinChung');


Route::post("upload-image",'MyController@uploadImage');

Route::post("dong-oto",'Oto@getDong');
Route::post("kieu-dang-oto",'Oto@getKieuDang');
Route::post("so-cho-oto",'Oto@getSoCho');
Route::post("xem-lai-tin-ban-o-to",'Oto@xemLaiTinDang');
Route::post('dang-tin-o-to','Oto@dangTinOto');

Route::post("dong-xe-may",'XeMay@getDong');
Route::post("xem-lai-tin-ban-xe-may",'XeMay@xemLaiTinDang');
Route::post("dang-tin-xe-may",'XeMay@dangTinXeMay');

Route::post("chi-tiet-tin-ban-o-to",'Oto@xemTinOto');
Route::post("chi-tiet-tin-ban-xe-may",'XeMay@xemTinXeMay');
Route::post("chi-tiet-tin-mua",'TinMua@xemTinMua');
Route::get("quan-li-tin-dang",'QuanLiTinDang@quanLiTinDang');
Route::post("mua-dich-vu",'QuanLiTinDang@muaDichVu');

Route::post('chuyen-tiep-tin-ban','MyController@chuyenTiep');
Route::post('dang-tin-ban-o-to','Oto@getHSXOto');

Route::post('dang-tin-mua','TinMua@dangTinMua');

Route::post('chon-dich-vu','QuanLiTinDang@chonDichVu');
Route::post('thanh-toan-dich-vu','QuanLiTinDang@thanhToanDichVu');


Route::post('xem-xet-tin-ban-o-to','AdminDuyet@xemXetTinBanOto');
Route::post('xem-xet-tin-ban-xe-may','AdminDuyet@xemXetTinBanXeMay');
Route::post('xem-xet-tin-mua','AdminDuyet@xemXetTinMua');
Route::post('xu-li-tin','AdminDuyet@xuLiTin');

Route::post('xem-tin-ban-xe-may','Oto@xuLiTin');
Route::post('xem-tin-ban-o-to','XeMay@xuLiTin');
Route::post('xem-tin-mua','TinMua@xuLiTin');

Route::post('xoa-tin','QuanLiTinDang@xoaTin');



