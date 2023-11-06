<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    public function form()
    {
    return view(view: 'form');
}
    // public function queryStrings(Request $request){
    // $keyword = '未設定';
    // if ($request->has(key: 'keyword')){

    //     $keyword = $request->keyword;

    // }
    // return 'キーワードは「'. $keyword. '」です';
    // }


    // public function queryStrings(Request $request){
    //     // dd($request->all()); // リクエストデータをダンプ
    //     $keyword = '未設定';
    //     if ($request->filled('keyword')){ // "key:" の部分を削除
    //         $keyword = $request->input('keyword'); // または $request->keyword;
    //     }
    //     return 'キーワードは「'. $keyword. '」です';
    // }

    public function queryStrings(Request $request)
    {
        $keyword = $request -> get(key: filled('keyword'), default:'未設定');
        return 'キーワードは「' . $keyword . '」です';
    }
    }


