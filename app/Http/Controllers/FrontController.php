<?php

namespace App\Http\Controllers;

use Carbon\Carbon ;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontController extends Controller
{

    public function burgers()
    {
        $products = Product::get();
        return view('frontend.index' , compact('products'));
    } // burgers


    public function products()
    {
        $products = Product::get();
        return view('frontend.products' , compact('products'));
    } // burgers/products



    public function single_product(Request $request , $id)
    {
        $product = Product::findOrFail($id);
        return view('frontend.single_product' , compact('product'));
    } // single_product



    public function user_orders()
    {
        if (Auth::check()) {

            $user_orders = User::rightJoin('orders' , 'users.id' , '=' , 'orders.user_id')
            ->where('users.id' , auth::user()->id )->get();


            if (count($user_orders) >0 ){
                 return view('frontend.user_orders' , compact('user_orders')) ;
             } else {
                return view('dashboard')->with('status' , 'You Dont Have Any Orders Yet') ;
             }
        } // end if auth
    } //  user_orders





    public function detail_orders($id)
    {
        if (Auth::check() & $id != null) {
            $order_item = Order_item::findOrFail($id);
            return view('frontend.detail_orders', compact('order_item')) ;
        }

    } // detail_orders




    public function burgers_menu(Request $request, $category)
    {
        $products = Product::where('category' , $request->category)->get() ;
        return view('frontend.products' , compact('products'));
    }  //  burgers_menu





    public function destroy($id)
    {
        //
    }
}
