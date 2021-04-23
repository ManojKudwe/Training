<?php
namespace App\Http\Controllers;

use App\Models\Users;
use App\Models\Role;
use Illuminate\Http\Request;
use Hash;

class Usercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

	 public function login()
    {
         return view('admin.login');
    }

	 public function register()
    {
		 $data = Role::all();	
         return view('admin.registers',['data'=>$data]);
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

     return redirect('/login')
            ->with('success', 'Registered successfully.');
    }


function check(Request $request){
         $request->validate([
                'email'             =>      'required',
                'password'          =>      'required',
                
      ]);
	   
		

		  $data = Users::where('email','=',$request->email)->first();
          if ($data){
			  if ($data->role!='customer'){
			  
			if(Hash::check($request->password,$data->password)){
				 $request->session()->put('LoggedUser',$data->id);
				 return redirect('/dashboard/'.$data->id);
			  }
			else{
				return back()
					->with('fail', 'Incorrect Password');
			    }
			  }
			else{
				return back()
					->with('fail', 'Access denied');
			}
		  }
		  else{
				return back()
					->with('fail', 'Not found, Please Register');
			}
		  }

public function dashboard($id)
    {
        $user=Users::find($id);
        return view('admin.dashboards', compact('user'));
    }

function logout(){
if(session()->has('LoggedUser')){
	session()->pull('LoggedUser');
	return redirect('/login')
            ->with('success', 'logout successfully.');
	}
}

    public function index()
    {
         $users = Users::latest()->paginate(5);

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = Role::all();	
        return view('user.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
				'firstname'         =>      'required|string|max:20',
				'lastname'          =>      'required|string|max:20',
                'email'             =>      'required|email|unique:user,email',
                'password'          =>      'required|alpha_num|min:8',
                'confirm_password'  =>      'required|same:password',
			 	'status'            =>      'required|min:1',
			 	'role'              =>      'required|min:1',
		 		
      ]);

      Users::create([
          'firstname' => $request->firstname,
		  'lastname' => $request->lastname,
          'email' => $request->email,
		  'status' => $request->status,
		  'role' => $request->role,
          'password' => Hash::make($request->password),
		  
      ]);

     return redirect('/users')
            ->with('success', 'Registered successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=Users::find($id);
        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Role::all();
		$user = Users::find($id);
        return view('user.edit', compact('user'),['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Users $user)
    {
       
         $request->validate([
				'firstname'         =>      'required|string|max:20',
				'lastname'          =>      'required|string|max:20',
                'email'             =>      'required|email',
			 	'status'            =>      'required|min:1',
			 	'role'              =>      'required|min:1',
		 		
      ]);

     $user->update($request->all());

     return redirect('/users')
            ->with('success', 'Record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
         $user->delete();

        return redirect('/users')
            ->with('success', 'Record deleted successfully');
    }
}
