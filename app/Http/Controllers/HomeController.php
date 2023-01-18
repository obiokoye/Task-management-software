<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Monolog\Processor\HostnameProcessor;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('home');
    }

    // public function search(Request $request)
    //  {
    //     $search = $request->input('search');

    //     $users = User::where('name','LIKE',"%{$search}%")->paginate(3);

    //     return view('Adminfolder.index')->with('users', $users);
    //  }
    public function search(Request $request)
    {
    $search = request()->all('search');
    if($search) {
        $search = User::where('name', 'LIKE', "%{$search}%");
    }
    return view('home')->with('search', $search); 
}
}
