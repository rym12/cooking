<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Family;

class FamilyController extends Controller
{
    public function create_family(Request $request) {
        
        // バリデーション
        $validatedData = $request->validate([
            'family_id' => 'required|integer|unique:families,id', // familiesテーブルのfamily_idカラムにユニークであることを確認
            'family_name' => 'required|string|max:255',
        ]);

        // Familyテーブルにデータを保存
        $family = new Family;
        $family->id = $request->input('family_id');
        $family->family_name = $request->input('family_name');
        $family->save();

        // Userテーブルにfamily_idとfamily_nameを登録
        $auth = Auth::user()->id;
        $user = User::find($auth);
        $user->family_id = $request->input('family_id');
        $user->family_name = $request->input('family_name');
        $user->save();

        // 成功メッセージを含むページへリダイレクト
        return view('home');
    }


    public function showFamilyMembers() {
        // ログインユーザーのfamily_idを取得
        $family_id = Auth::user()->family_id;

        // そのfamily_idと一致するユーザーを取得
        $familyMembers = User::where('family_id', $family_id)->get();

        // ビューにデータを渡して表示
        return view('home', ['users' => $familyMembers]);
}
}
