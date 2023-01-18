<?php

namespace App\Http\Controllers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
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
    public function index(User $user)
    {   //simple pagenate function used to add different pages to the table
        $users=User::orderBy('name')->simplepaginate(3);
        // return $users = User::select('id','name', 'email')->paginate(3);
        // $users = User::select('name', 'id', 'email')->paginate(3);
        // $users = User::orderBy('name')->get();
        return view('Adminfolder.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Adminfolder.addusers');


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



        session()->flash('success', 'User created successfully.');

        return redirect(route('admin.index'));
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
    public function edit(User $admin)
    {
        if(Gate::denies('edit-users')){
            return redirect(route('admin.index'));
        }
        $roles = Role::all();

        return view('Adminfolder.edit')->with([
            'admin' => $admin,
            'roles'=> $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $admin)
    {
        $admin->roles()->sync($request->roles);

      $admin->name = $request->name;
      $admin->email = $request->email;


      if($admin->save()){
        // $request->session()->flash('success','Updated successfully');

      }else{
        // $request->session()->flash('error', 'there was an error updating the user');
      }

      return redirect(route('admin.index'));

    //   session()->flash('success', 'User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $admin)
    {
        if(Gate::denies('delete-users')){
            return redirect(route('admin.index'));
        }

        $admin->roles()->detach();
        $admin->delete();

        return redirect(route('admin.index'));

        session()->flash('success', 'User deleted successfully.');
    }

     public function search(Request $request)
     {
        $search = $request->input('search');

        $users = User::where('name','LIKE',"%{$search}%")->paginate(3);

        return view('Adminfolder.index')->with('users', $users);
     }

}
