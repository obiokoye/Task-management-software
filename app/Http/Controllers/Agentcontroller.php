<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AgentModel;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Collection\Links;

use App\Http\Requests\Agent\CreateAgentRequest;

use App\Http\Requests\Agent\UpdateAgentRequest;

class Agentcontroller extends Controller
{
    public function _construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::orderBy('name')->simplepaginate(3);
        return view('admin.agent')->with('users', $users);
        // $agents = AgentModel::all();
    //     return view('admin.agent', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addagentform');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],


        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);



        session()->flash('success', 'Agent created successfully.');

        return redirect('/agent');



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
    public function edit(User $agent)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('agents.index'));
        }
        return view('admin.edit')->with('agent', $agent);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgentRequest $request, User $agent)
    {
        // $admin->roles()->sync($request->roles);

      $agent->name = $request->name;
      $agent->email = $request->email;
      $agent->save();

      return redirect(route('agents.index'));




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.agent'));
        }

    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name','LIKE',"%{$search}%")->paginate(3);
        return view('admin.agent')->with('users', $users);
    }
}
