<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Item;


class ItemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 商品一覧
     */
    public function index()
    {
        // 商品一覧取得
        $items = Item
            ::where('items.status', 'active')
            ->select()
            ->get();

        // ソート機能
        $items = Item::sortable()->get(); //sortable() を先に宣言
        return view('item.index')->with('items', $items);   

        return view('item.index', compact('items'));
    }

    /**
     * 商品登録
     */
    public function add(Request $request)
    {
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            // 商品登録
            Item::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'type' => $request->type,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'detail' => $request->detail,
            ]);
        
            return redirect('/items');
        }

        return view('item.add');
    }
        /**
     * 編集画面の表示
     */
    public function edit(Request $request,$id)
    {
        $items = Item::find($id);
        // POSTリクエストのとき
        if ($request->isMethod('post')) {
            // バリデーション
            $this->validate($request, [
                'name' => 'required|max:100',
            ]);

            $items->name = $request->name;
            $items->type = $request->type;
            $items->price = $request->price;
            $items->quantity = $request->quantity;
            $items->detail = $request->detail;
            $items->save();
            return redirect('/items');
        }
        return view('item.edit', compact('items'));
    }

        /**
     * 削除処理
     */
    public function destroy($id)
    {
        // Booksテーブルから指定のIDのレコード1件を取得
        $items = Item::find($id);
        // レコードを削除
        $items->delete();
        // 削除したら一覧画面にリダイレクト
        return redirect('/items');
    }
}