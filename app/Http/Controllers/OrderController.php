<?php

namespace App\Http\Controllers;

use App\Models\Order;
use softDeletes;
use Carbon\Carbon;

use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = order::paginate();
        return view('orders.index' , compact('orders')) ;
    }






    public function store(Request $request)
    {

    }



    public function show(Order $order)
    {
        //
    }



    public function edit(Order $order)
    {
        //
    }




    public function update(Request $request, Order $order)
    {
        //
    }




    public function destroy(Order $order)
    {
        //
    }
}
