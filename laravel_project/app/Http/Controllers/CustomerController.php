<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Coustomer;
use App\Models\Role;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_images;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Hash;

class CustomerController extends Controller
{
	 public function index()
    {
          $data = Banner::all();
		  $cate = Category::all();
		  $products = DB::table('product')
			->join('product_categories','product_categories.id','=','product.id')
			->join('product_images','product_images.id','=','product_categories.id')
			->select('product.id','product.pname','product.price','product.created_at','product_images.pimage','product_categories.category')
			->take(6)->get();
        return view('frontend.index',['data'=>$data,'cate'=>$cate,'products'=> $products]);
    }
     public function clogin()
    {
		 
         return view('frontend.login')
			 ->with('success', 'Plesae Login/Sign-up.');;
    }

	   public function csave(Request $request)
    {
         $request->validate([
				'firstname'         =>      'required|string|max:20',
				'lastname'          =>      'required|string|max:20',
                'email'             =>      'required|email|unique:users,email',
                'password'          =>      'required|alpha_num|min:8',
                'confirm_password'  =>      'required|same:password',
      ]);

     Coustomer::create([
          'firstname' => $request->firstname,
		  'lastname' => $request->lastname,
          'email' => $request->email,
          'password' => Hash::make($request->password),
      ]);

     return redirect('/eshopper/login')
            ->with('success', 'Registered successfully, Plesae login.');
    }



function ccheck(Request $request){
         $request->validate([
                'Email'             =>      'required',
                'Password'          =>      'required',
                
      ]);
	   
		

		  $data = Coustomer::where('email','=',$request->Email)->first();
          if ($data){
	
			  
			if(Hash::check($request->Password,$data->password)){
				 $request->session()->put('LoggedUser',$data->id);
				 return redirect('/eshopper/dashboard/'.$data->id);
			  }
			else{
				return back()
					->with('fail', 'Incorrect Password');
			    }
		  }
		  else{
				return back()
					->with('fail', 'Not found, Please signup');
			}
		  }

public function cdashboard($id)
    {
        $user=Coustomer::find($id);
		  $data = Banner::all();
		  $cate = Category::all();
		  $products = DB::table('product')
			->join('product_categories','product_categories.id','=','product.id')
			->join('product_images','product_images.id','=','product_categories.id')
			->select('product.id','product.pname','product.price','product.created_at','product_images.pimage','product_categories.category')
			->take(6)->get();
        return view('frontend.dashboards', compact('user'),['data'=>$data,'cate'=>$cate,'products'=> $products]);
    }

function clogout(){
if(session()->has('LoggedUser')){
	session()->pull('LoggedUser');
	return redirect('/eshopper/login')
            ->with('success', 'logout successfully.');
	}
}


public function notfound()
    {
		 
         return view('frontend.404');
    }


public function blog($id)
    {
		 
         $user=Coustomer::find($id);
        return view('frontend.blog', compact('user'));
    }


public function blogsingle($id)
    {
		 
         $user=Coustomer::find($id);
        return view('frontend.blog-single', compact('user'));
    }


	public function cart($id)
    {
		 
          $user=Coustomer::find($id);
        return view('frontend.cart', compact('user'));
    }


	public function checkout($id)
    {
		 
         $user=Coustomer::find($id);
        return view('frontend.checkout', compact('user'));
    }


	public function contactus($id)
    {
		 
         $user=Coustomer::find($id);
        return view('frontend.contact-us', compact('user'));
    }


	public function product($id)
    {
		 
         $user=Coustomer::find($id);
        return view('frontend.product-details', compact('user'));
    }


	public function shop($id)
    {
		   $user=Coustomer::find($id);
		  $data = Banner::all();
		  $cate = Category::all();
		  $products = DB::table('product')
			->join('product_categories','product_categories.id','=','product.id')
			->join('product_images','product_images.id','=','product_categories.id')
			->select('product.id','product.pname','product.price','product.created_at','product_images.pimage','product_categories.category')
			->get();
        return view('frontend.shop', compact('user'),['data'=>$data,'cate'=>$cate,'products'=> $products]);
    }

	
	public function forgotpassword()
    {
        return view('frontend.forgott-password');
    }

	function verify(Request $request){
         $request->validate([
                'Email'             =>      'required',
                'firstname'          =>      'required',
                
      ]);
	   
		

		  $data = Coustomer::where('email','=',$request->Email)->first();
          if ($data){
	
			  
			if($request->firstname == $data->firstname){
				
				 return redirect('/send-mail/'.$data->id);
			  }
			else{
				return back()
					->with('fail', 'Incorrect firstname');
			    }
		  }
		  else{
				return back()
					->with('fail', 'Not found, Please signup');
			}
		  }

	public function sendEmail($id)
    {
		$user=Coustomer::find($id);
		 $email = 'kudvemsk@gmail.com';
         $mailData=[
			 'firstname'=>$user->firstname,
			 'Password'=>$user->password,
		 ];

		 Mail::to($email)->send(new MyTestMail($mailData));

		 return redirect('/eshopper/login')
            ->with('success', 'Password has been sent to your registered email address');
    }

}