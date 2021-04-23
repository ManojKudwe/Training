<?php

namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Role;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		 $data = Role::all();	
         return view('admin.registers',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(Request $request)
	{
		//
	}
    public function save(Request $request)
    {
         $request->validate([
				'firstname'         =>      'required|string|max:20',
				'lastname'          =>      'required|string|max:20',
                'email'             =>      'required|email|unique:users,email',
                'password'          =>      'required|alpha_num|min:8',
                'confirm_password'  =>      'required|same:password',
				'status'            =>      'required|min:1',
				'role'              =>      'required|min:1',
      ]);

      Users::create([
          'firstname' => $request->firstname,
		  'lastname' => $request->lastname,
          'email' => $request->email,
          'password' => Hash::make($request->password),
		  'status' => $request->status,
		  'role' => $request->role,
      ]);

     return view('admin.login')
            ->with('success', 'Registered successfully.');
    }


function check(Request $request){
         $request->validate([
                'email'             =>      'required',
                'password'          =>      'required',
                
      ]);

		  $data = Users::where('email','=',$request->email)->first();
          if ($data){
			if(Hash::check($request->password,$data->password)){
				 $request->session()->put('LoggedUser',$data->id);
				 $user= Users::all();
				 //return redirect('/users')
				return view('admin.try', compact('user'),['user'=>$user]);
				
			  }
			else{
				return back()
					->with('fail', 'Incorrect Email or Password');
			    }
			}
			else{
				return back()
					->with('fail', 'Incorrect Email or Password');
			}
		  }

function logout(){
if(session()->has('LoggedUser')){
	session()->pull('LoggedUser');
	return view('admin.login')
            ->with('success', 'logout successfully.');
	}
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
