<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function addItem(Request $request){
        $name = $request->name;
        $cost = $request->cost;
        $path = $request->file('img')->store('public/items');
        // public/items/Lb1d7Pj8zQ8aCzbDFAtBr5UUF9dXPtbCsZ82JPa4.jpg
        $description = $request->description;
        $path = str_replace('public', 'storage', $path);
        // storage/items/Lb1d7Pj8zQ8aCzbDFAtBr5UUF9dXPtbCsZ82JPa4.jpg
        $item = new Item();
        $item->name = $name;
        $item->cost = $cost;
        $item->img = $path;
        $item->description = $description;
        $item->save();
        return redirect()->intended('/');
    }
}
