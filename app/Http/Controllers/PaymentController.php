<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentSetupRequest;
use App\Http\Requests\PaymentStoreRequest;
use Illuminate\Http\Request;
use App\Models\PaymentModel;
use App\Models\User;
use App\Models\Fee;
use App\Models\Body;
use App\Models\PaymentSetupModel;
use App\Models\PaymentTransactionsModel;
use Gate;
use Auth;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodies= Body::all();
        // dd($bodies);
        return view('paymentfolder.index')->with('bodies', $bodies);

    }

    public function payment_type(Request $request)
    {
        $data=PaymentSetupModel::select('payment_type','id')->where('body_id',$request->id)->take(100)->get();
        return response()->json($data);


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
    public function store(PaymentStoreRequest $request)
    {
        //payment storage
        $payment = new PaymentTransactionsModel;

        $randonValue = 'DUE/'.date('Y').'/'.rand();
        // dd($randonValue);
        $agent_id = auth()->user()->id;
        // dd($agent_id);


        $image = $request->file;
        $imagename = time(). '.' .$image->getClientoriginalExtension();
        $request->file->move('agentpaymentimage',$imagename);
        $payment->image = $imagename;


        $payment->body_id = $request->unionname;
        $payment->amountpayable = $request->amountpayable;
        $payment->transaction_number = $request->transaction_number;
        $payment->amount =$request->amount;
        $payment->date = $request->date;
        $payment->agent_id = $request->agent_id;
        $payment->firstname =$request->firstname;
        $payment->lastname =$request->lastname;
        $payment->bankname =$request->bankname;
        $payment->file = $request->file;

        $payment->save();

        $status = 'Payment Confirmation Successfully';

        return redirect(route('payment.index'))->with('message', $status);

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
