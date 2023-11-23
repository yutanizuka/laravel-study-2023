<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HilowController extends Controller
{
    public function index() {
        $dealersNumber = random_int(1, 12);
        session(['dealersNumber' => $dealersNumber]);

        return view('hi-low.index', ['dealersNumber' => $dealersNumber]);
    }

    public function result(Request $request) {
        // ディーラーの数字(hidden値で送信されたもの)を取得
        // $dealersNumber = $request->get('dealersNumber');
        $dealersNumber = session(key: 'dealersNumber');

        // プレイヤーの数字を1~12の中からランダムに取得
        $playersNumber = random_int(1, 12);
        // プレーヤーの数字がディーラーのものより大きいか判定(大きい場合にtrue)
        $isHigh = $playersNumber > $dealersNumber;
        // 予想が当たったかの判定
        $isCorrect = ($isHigh && $request->get('guess') === 'high') || (!$isHigh && $request->get('guess') === 'low');
        return view('hi-low.result', [
            'dealersNumber' => $dealersNumber,
            'playersNumber' => $playersNumber,
            'isCorrect' => $isCorrect,
        ]);
    }
}
