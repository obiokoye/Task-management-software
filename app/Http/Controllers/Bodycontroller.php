<?php
namespace App\Models;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;


use Illuminate\Http\Request;
use App\Models\Body;

class Bodycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodies=Body::orderBy('name')->simplepaginate(5);
        return view('bodyfolder.index')->with('bodies', $bodies);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bodyfolder.createbodyform');
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
            'name' => ['required'],
            'address',
            'phone',
            'amount'


        ]);

        Body::create([
            'name' => $request['name'],
            'address' => $request['address'],
            'phone' => $request['phone'],
            'amount' => $request['amount'],
        ]);



        session()->flash('success', 'body created successfully.');

        return redirect(route('body.index'));
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
    public function edit(Body $body)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('body.index'));
        }
        return view('bodyfolder.edit')->with([
            'body' => $body,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Body $body)
    {

      $body->name = $request->name;
      $body->address = $request->address;
      $body->phone = $request->phone;
      $body->amount = $request->amount;
      $body->save();

      return redirect(route('body.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Body $body)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('body.index'));
        }
        $body->delete();

        return redirect(route('body.index'));
    }
    public function query(Request $request)
    {
        $query = $request->input('query');
        $bodies = Body::where('name','LIKE',"%{$query}%")->simplepaginate(5);
        return view('bodyfolder.index')->with('bodies', $bodies);
    }
}
