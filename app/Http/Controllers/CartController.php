<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Сделать более оптимальный запрос к БД
    public function showCart(){
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where('user_id', $userId)->get(); // Получили все товары пользователя из корзины
        foreach ($carts as $cart){ // Добавили к товарам название, цену и картинку
            $item = Item::where('id', $cart->item_id)->first();
            $cart->name = $item->name;
            $cart->cost = $item->cost;
            $cart->img = $item->img;
        }
        // Рендерим результат
        return view('pages.cart', ['carts'=>$carts]);
    }
    public function addItem(Request $request){
        $itemId = $request->item_id;
        $userId = auth()->user()->getAuthIdentifier();
        $cart = new Cart();
        $cart->item_id = $itemId;
        $cart->user_id = $userId;
        $cart->quantity = 1;
        $cart->save();
        return redirect()->intended('/cart');
    }
}
