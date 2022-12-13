<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order ;
// use Auth ;
use Illuminate\Support\Facades\Auth ;
use App\Models\User ;
use App\Models\Order_item ;

class CartController extends Controller
{
    public function cart()
    {
        return view('frontend.cart') ;
    } // cart


    public function add_to_cart(Request $request)
    {

if (Auth::check()) {



        if ($request->session()->has('cart')) {
            // if we have $cart in session

            $cart = $request->session()->get('cart');

            $id = $request->id ;
            $product_array_ids = array_column($cart, 'id'); // [ 20=>'' , 21 =>'']

            if (!in_array($id, $product_array_ids)) {
                $id = $request->id ;

                $name = $request->name ;
                $image = $request->image ;
                $price = $request->price ;
                $type = $request->type ;

                $sale_price = $request->sale_price ;
                $quantity = $request->quantity ;
                $category = $request->category ;

                if ($sale_price > 0) {
                    $price_to_change = $sale_price ;
                } else {
                    $price_to_change = $price ;
                } // if ($sale_price > 0)

                $products = [

                    'id' => $id ,

                    'name' => $name ,
                    'image' => $image ,
                    'price' => $price_to_change ,

                    'sale_price' => $price_to_change ,
                    'quantity' => $quantity ,
                    'type' => $type ,
                    'category' => $category ,
                ] ;

                $cart[$id] = $products ;
                $request->session()->put('cart', $cart);
            } else {  // end if (!in_array($id , $product_array_ids))
                echo    "<script>alert('Product Is Already Inserted')</script>" ;
            }


            $this->calculate_total_cart($request);
            // return
            return view('frontend.cart');
        } else {
            // if we not have $cart in session


            $cart = [] ;

            $id = $request->id ;

            $name = $request->name ;
            $image = $request->image ;
            $price = $request->price ;

            $sale_price = $request->sale_price ;
            $quantity = $request->quantity ;
            $type = $request->type ;
            $category = $request->category ;

            if ($sale_price > 0) {
                $price_to_change = $sale_price ;
            } else {
                $price_to_change = $price ;
            } // if ($sale_price > 0)

            $products = [

                'id' => $id ,

                'name' => $name ,
                'image' => $image ,
                'price' => $price_to_change ,

                'sale_price' => $price_to_change ,
                 'type' => $type ,
                'quantity' => $quantity ,
                'category' => $category ,
            ] ;

            $cart[$id] = $products ;
            $request->session()->put('cart', $cart);

            $this->calculate_total_cart($request);
            // return
            return view('frontend.cart');
        } // end else if  ($request->session()->has('cart')) -> elsa

} else {
    return view('auth.register');
}

    } // add_to_cart



    public function calculate_total_cart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = session()->get('cart') ;
            $total_price = 0 ;
            $total_quantity = 0 ;

            foreach (session()->get('cart') as $id => $product) {
                $product = $cart[$id] ;
                $product_price = $product['price'] ;
                $product_quantity = $product['quantity'] ;

                $total_price = $total_price + ((float)$product_price * $product_quantity) ;
                $total_quantity = $total_quantity + $product_quantity  ;
            } // end foreach

            //  saving data in Session
            $request->session()->put('total_price', $total_price);
            $request->session()->put('total_quantity', $total_quantity);
        } // end  if ($request->session()->has('cart'))
    } // calculate_total_cart



    public function remove_from_cart(Request $request)
    {
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart') ;
            $id = $request->id ;

            unset($cart[$id]);
            $request->session()->put('cart', $cart) ;

            $this->calculate_total_cart($request);
            return view('frontend.cart') ;
        }
    } // remove_from_cart

    public function edit_product_quantity_btn(Request $request)
    {
        if ($request->session()->has('cart')) {
            $id = $request->id ;

            $quantity = $request->quantity ;

            if ($request->has('decrease_product_quantity_btn')) {
                $quantity = $quantity-1 ;
            } elseif ($request->has('increase_product_quantity_btn')) {
                $quantity = $quantity+1 ;
            }


            if ($quantity <= 0) {
                $this->remove_from_cart($request);
            }

            $cart = $request->session()->get('cart') ;

            if (array_key_exists($id, $cart)) {
                $cart[$id]['quantity'] = $quantity ;
            }

            $request->session()->put('cart', $cart) ;
            $this->calculate_total_cart($request);
        }

        // return
        return view('frontend.cart') ;
    } // edit_product_quantity_btn


    ############################################
    ############  checkout      ################
    ############################################


    public function checkout(Request $request)
    {
        return view('frontend.checkout') ;
    } //checkout



    ############################################
    ############  place_order   ################
    ############################################


    public function place_order(Request $request)
    {
        if ($request->session()->has('cart')) {
            $name = $request->name ;
            $email = $request->email ;
            $phone = $request->phone ;

            // $user_id
            if (Auth::check()) {
                $user_id = Auth::user()->id ;
            } else {
                $user_id = 0 ;
            }


            $city = $request->city ;
            $address = $request->address ;

            $cost = session()->get('total_price') ;
            $date =  date('Y-m-d h:i:s');
            $status = ('Not Paid');

            $cart = $request->session()->get('cart') ;

            // store by ID #################  -> $order_id
            $order_id = Order::insertGetId([

                            'name' => $name ,
                            'email' => $email ,
                            'phone' => $phone ,

                            'user_id' => $user_id ,
                            'city' => $city ,
                            'address' => $address ,

                            'cost' => $cost ,
                            'date' => $date ,
                            'status' => $status ,
                        ], 'id') ;


            ########

            foreach ($cart as $id=>$product) {
                $product = $cart[$id];

                $order_id = $order_id;
                $product_id = $product['id'];
                $product_name = $product['name'];
                $product_price =$product['price'];
                $product_image = $product['image'];
                $product_quantity = $product['quantity'];
                $order_date =  date('Y-m-d h:i:s');

                Order_item::create([

                    'order_id' => $order_id,

                    'product_id' => $product_id,
                    'product_name' => $product_name,
                    'product_price' => $product_price,

                    'product_image' => $product_image,
                    'product_quantity' => $product_quantity,
                    'order_date' => $order_date,
                ]);
            } // end foreach ($cart as $id=>$product)

            $request->session()->put('order_id', $order_id);
            // return
            return view('frontend.payment') ;
        } else {
            // return
            return redirect('/') ;
        } // end if ($request->session()->has('cart'))
    } // place_order()




    public function index(Request $request)
    {
    } //
}
