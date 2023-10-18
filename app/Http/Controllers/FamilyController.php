<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Family;

class FamilyController extends Controller
{
    public function processForm(Request $request) {

        // Userテーブルにfamily_idとfamily_nameを登録
        $auth = Auth::user()->id;
        $user = User::find($auth);
        $user->family_id = $request->family_id;
        $user->family_name = $request->family_name;

        // Familyテーブルに登録
        // バリデーション
        $validatedData = $request->validate([
            'family_id' => 'required|integer|unique:families', // familiesテーブルのfamily_idカラムにユニークであることを確認
            'family_name' => 'required|string|max:255',
        ]);

        // Familyテーブルにデータを保存
        $family = new Family;
        $family->family_id = $request->family_id;
        $family->family_name = $request->family_name;
        $family->save();

        // 成功メッセージを含むページへリダイレクト
        return redirect('/home')->with('success', 'Family saved successfully!');
    }
}
