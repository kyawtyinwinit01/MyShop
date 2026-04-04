<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class FrontController extends Controller
{
    public function shop()
    {
        //$items = Item::all();
        //$items = Item::orderBy('id','DESC')->get();
        $items = Item::orderBy('id','DESC')->paginate(12);
        //var_dump($items);
        return view('front.shops',compact('items'));
    }

    public function shopItem($id)
    {
        //echo ($id);
        $item = Item::find($id);
        //var_dump($item);
        return view('front.shop-item',compact('item'));
    }
}
