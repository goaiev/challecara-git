<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Folder; // ★ この行を追記！ Folderクラスを使うため
use App\Http\Requests\CreateFolder; // ★ 追加　バリデーション

class FolderController extends Controller
{
    //
	public function showCreateForm()
    {
        return view('folders/create');
    }
	
	public function create(CreateFolder $request)
	{
	    // フォルダモデルのインスタンスを作成する
	    $folder = new Folder();
	    // タイトルに入力値を代入する
	    $folder->title = $request->title;
	    // インスタンスの状態をデータベースに書き込む
	    $folder->save();
	
	    return redirect()->route('tasks.index', [
	        'id' => $folder->id,
	    ]);
	}
}

