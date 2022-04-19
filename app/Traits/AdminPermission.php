<?php

namespace App\Traits;

Trait AdminPermission{
    public function checkRequestPermission(){
        if (

            empty(auth()->user()->role->permission['permission']['brand']['add']) && \Route::is('brands') ||

            empty(auth()->user()->role->permission['permission']['slider']['add']) && \Route::is('sliders') ||

            empty(auth()->user()->role->permission['permission']['cat']['add']) && \Route::is('category') ||

            empty(auth()->user()->role->permission['permission']['subcat']['add']) && \Route::is('subcategory') ||

            empty(auth()->user()->role->permission['permission']['subsubcat']['add']) && \Route::is('subsubcategory') ||

            empty(auth()->user()->role->permission['permission']['product']['add']) && \Route::is('add.product') ||

            empty(auth()->user()->role->permission['permission']['product']['manage']) && \Route::is('product.manage') ||

            empty(auth()->user()->role->permission['permission']['coupon']['add']) && \Route::is('coupon') ||

            empty(auth()->user()->role->permission['permission']['order']['add']) && \Route::is('pending.orders') ||

            empty(auth()->user()->role->permission['permission']['report']['add']) && \Route::is('reports') ||

            empty(auth()->user()->role->permission['permission']['review']['add']) && \Route::is('product.review')

        )
         {
            return response()->view('admin.home');
        }
    }
}
