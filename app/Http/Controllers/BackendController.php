<?php

namespace App\Http\Controllers;

use Auth ;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login') ;
    }

        //  payments index
    public function index()
    {
        $payments = Payment::get();
        return view('payment.index' , compact('payments'));
    } //  payments index


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
