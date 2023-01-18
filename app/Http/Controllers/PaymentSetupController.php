<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentSetupRequest;
use Illuminate\Http\Request;
use App\Models\Body;
use App\Models\PaymentSetupModel;

class PaymentSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodies=Body::all();

        return view("paymentsetup.index")->with('bodies', $bodies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'body_id' => ['required'],
            'payment_type',
            'amount'

        ]);


        PaymentSetupModel::create([
            'body_id' => $request['body_id'],
            'payment_type' => $request['payment_type'],
            'amount' => $request['amount'],
        ]);

        session()->flash('success', 'payment type created successfully.');

        return redirect(route('paymentsetup.index'));
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
