<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function scopeLunchMinPrice($query, $price){
      return $query->where('lunch_price', '>=', $price);
    }

    public function scopeLunchMaxPrice($query, $price){
      return $query->where('lunch_price', '<=', $price);
    }

    public function scopeDinnerMinPrice($query, $price){
      return $query->where('dinner_price', '>=', $price);
    }

    public function scopeDinnerMaxPrice($query, $price){
      return $query->where('dinner_price', '<=', $price);
    }

    public function scopeStation($query, $serch_station){
      return $query->where('station', $serch_station);
    }

    public function tags(){
      //belongsToManyの処理
      return $this->belongsToMany('App\Tag', 'shop_tag', 'tag_id', 'shop_id')
    }
}
