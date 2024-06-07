<?php
namespace App\Helpers;
use App\Models\Kid;

class Helper
{
    // Discount price calculation on giftcards & donate shoes
    public static function discountedPrice($cart, $quantity)
    {
        $dis = $cart['discount'] ? $cart['discount'] : 0;
        $discount = $cart['price'] * ($dis/100);
        $discountedPrice = $cart['price'] - $discount;
        return $discountedPrice*$quantity;
    }

    // Not in use for now (This is for multiple cart)
    public static function disPriceMultiCard($cart, $quantity)
    {
        $discountedPrice=0;
        foreach($cart as $ca){
            $dis = $ca->attributes['discount'] ? $ca->attributes['discount'] : 0;
            $discount = $ca->price * ($dis/100);
            $discountedPrice = $ca->price - $discount;
        }
        return $discountedPrice*$quantity;
    }

    // Tax price calculation on cart item
    public static function taxPrice($cartData)
    {
        if(!empty($cartData)){
            $tax = $cartData->price * 10/100;
            $taxPrice = $cartData->price + $tax;
            return $taxPrice;
        }else{
            return false;
        }
    }

    // Get associated child name
    public static function getAssociatedChild($id){
        $child_name = Candidates::whereId($id)->pluck('name')->first();
        return $child_name;
    }
}