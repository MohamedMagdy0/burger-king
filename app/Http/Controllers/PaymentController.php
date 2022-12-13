<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Order;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function verify_payment(Request $request , $transaction_id)
    {
        $request->session()->put('transaction_id' , $transaction_id) ;
        return redirect('/burgers/complate_payment') ;
    }  //  verfiy_payment



    public function complate_payment(Request $request)
    {
        if ($request->session()->has('order_id') && $request->session()->has('transaction_id')) {

                $order_id = $request->session()->get('order_id');
                $transaction_id = $request->session()->get('transaction_id') ;
                $date = date('Y-m-d') ;

                $status = 'paid' ;

                // update status after paid
                Order::where('id',$order_id)->update(['status' => $status]) ;

                // store payment
                Payment::create([
                    'order_id' => $order_id ,
                    'transaction_id' => $transaction_id ,
                    'date' => $date ,
                ]) ;

                // clean | clear cart after payment
                // $request->session()->flush() ;

                return redirect()->route('burgers.thank_you', compact('order_id'))->with('transaction_id' , $transaction_id) ;
        }

    }  //  complate_payment




    public function thank_you(Request $request)
    {

  // clean | clear cart after payment
//   $request->session()->flush() ;

        return view('frontend.thank_you') ;
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
