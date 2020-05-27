<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shop;
use App\Reserve;
use App\Tag;
use App\Station;

class CustomerController extends Controller
{
      //    検索なのに$idがいるか?
      public function home(Request $request, $id)
      {

        $tags = Tag::all();
        $stations = Station::all();
        $shops = Shop::all();
        $prices = Shop::find($request->lunch_price);

        $param = [
          'tags' => $tags,
          'id' => $id,
          'stations' => $stations,
          'shops' => $shops,
          'prices' => $prices
        ];
        return view('customer.home', $param);
      }

    public function showSearchResult(Request $request, $id)
    {

        $shops = Shop::where('name', $request->name)->get();

        $shops = Shop::lunchMinPrice($request->lunchmin)
                    ->lunchMaxPrice($request->lunchmax)
                    ->dinnerMinPrice($request->dinnermin)
                    ->dinnerMaxPrice($request->dinnermax)
                    ->Station($request->station)->get();

        $param = ['name' => $request->name, 'shops' => $shops, 'id' => $id];
        return view('customer.search_result', $param);
    }

    public function showShopDetail($id, $shop_id)
    {
        $shop = Shop::where('id', $shop_id)->first();
        return view('customer.shop_detail', ['shop' => $shop]);
    }

    public function showReservePage($id, $shop_id)
    {
        return view('customer.reserve', ["id" => $id, "shop_id" => $shop_id]);
    }

    public function reserve(Request $request, $id, $shop_id)
    {

        $this->validate($request, Reserve::$rules);
        $reserve = new Reserve;

        $form = $request->all();
        $form += ['customer_id' => $id, 'shop_id' => $shop_id];
        unset($form['_token']);
        $reserve->fill($form)->save();
        return redirect('/customer/'.$id.'/home');
    }
}
