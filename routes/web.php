<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('insert', function () {
    // return view('welcome');
    $data = [
        'name' => 'Kinh Te',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
    DB::table('categories')->insert($data);
    echo "insert thanh cong";
});

Route::get('insert-many', function () {
    // return view('welcome');
    $data = [
        [
            'name' => 'Kinh Te',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'Xa Hoi',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'Giao Duc',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ],
        [
            'name' => 'Thi Truong',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]
    ];
    DB::table('categories')->insert($data);
    echo "insert thanh cong";
});

Route::get('insert-get-id', function () {
    // return view('welcome');
    $data = [
        'name' => 'Tesst',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
    $id=DB::table('categories')->insertGetId($data);
    echo "insert thanh cong co ban ghi Id =".$id;
});
Route::get('select', function () {
    // return view('welcome');
    $all=DB::table('categories')->select('name','id')->get();
    // select where
    $where1 = DB::table('categories')->where('id',3)->get();
    $where2 = DB::table('categories')->where('id','>',3)->get();
    $where3 = DB::table('categories')->where('id','<',3)->get();
    // select first 
    $first = DB::table('categories')->where('id',3)->first();
    $find = DB::table('categories')->find(3);
//    dd($all->toArray());
    //   dd($where1,$where2,$where3);
      dd($first,$find);
});


Route::get('update', function () {
    // return view('welcome');
    $id=5;
    $data = [
        'name' => 'Ok fine',
        'updated_at' => date('Y-m-d H:i:s'),
    ];
    DB::table('categories')->where('id',$id)->update($data);
    echo "update thanh cong";
});
Route::get('delete', function () {
    // return view('welcome');
    $id=5;
    DB::table('categories')->where('id',$id)->delete();
    echo "delete  thanh cong";
});

Route::get('insertpost',function(){
    $data2=[
        'category_id'=>1000,
        'title'=>'Tieude 1',
        'description'=>"San pham cua tieu de 1",
        'img_cover'=>'https://picsum.photos/200/300',
        'views'=>'1',
        'is_published'=>'0',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')
    ];
    DB::table('categories')->insertpost($data2);
    echo "insert du lieu thanh cong";
    dd($data2);
});

Route::get('insertpost-many',function(){
    $data2=[
       [
        'category_id'=>1000,
        'title'=>'Tieude 1',
        'description'=>"San pham cua tieu de 1",
        'img_cover'=>'https://picsum.photos/200/300',
        'views'=>'1',
        'is_published'=>'0',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')
       ],
       [
        'category_id'=>1000,
        'title'=>'Tieude 1',
        'description'=>"San pham cua tieu de 1",
        'img_cover'=>'https://picsum.photos/200/300',
        'views'=>'1',
        'is_published'=>'0',
        'created_at'=>date('Y-m-d H:i:s'),
        'updated_at'=>date('Y-m-d H:i:s')
       ]
    ];
    DB::table('categories')->insertpost($data2);
    echo "insert du lieu thanh cong";
    dd($data2);
});