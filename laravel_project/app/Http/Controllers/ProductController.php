<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Product_categories;
use App\Models\Product_images;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('product')
			->join('product_categories','product_categories.id','=','product.id')
			->join('product_images','product_images.id','=','product_categories.id')
			->select('product.id','product.pname','product.price','product.created_at','product_images.pimage','product_categories.category')
			->paginate(5);

        return view('product.index', compact('products'))
			->with('i', (request()->input('page', 1) - 1) * 5);
           
    }

	


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
		$data = Category::all();	
        return view('product.create',['data'=>$data]);
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
            'pname' => 'required',
            'price' => 'required',
		 	'pimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

		$product = new product();
		$product -> pname = request('pname');
		$product -> price = request('price');
		$productc = new product_categories();
		$productc -> category = request('category');
		$productim = new product_images();

		$upimg='';
		if($files=$request->file('pimage'))
		{
			$path= public_path('/pimg/');
			$img=date('YmdHis').".".$files->getClientOriginalExtension();
			$files->move($path,$img);
			$upimg=$img;
		}
		$productim->pimage = $upimg;
		
		$product->save();
		$productc->save();
		$productim->save();
       
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$product= Product::find($id);
		$productc= Product_categories::find($id);
		$producti= Product_images::find($id);
        return view('product.show', compact('product','productc','producti'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data = Category::all();
		$product= Product::find($id);
		$productc= Product_categories::find($id);
		$producti= Product_images::find($id);
        return view('product.edit', compact('product','productc','producti'),['data'=>$data]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pname' => 'required',
            'price' => 'required',
		 	'pimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

		$upimg='';
		$product= Product::find($id);
		$productc= Product_categories::find($id);
		$productim= Product_images::find($id);
		$product -> pname = $request->pname;
		$product -> price = $request->price;
		$productc -> category = $request->category;
		if($files=$request->file('pimage'))
		{
			$path= public_path('/pimg/');
			$img=date('YmdHis').".".$files->getClientOriginalExtension();
			$files->move($path,$img);
			$upimg=$img;
		}
		$productim->pimage = $upimg;
		$product->save();
		$productc->save();
		$productim->save();
        
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$product= Product::find($id);
		$productc= Product_categories::find($id);
		$productim= Product_images::find($id);
        $product->delete();
		$productc->delete();
		$productim->delete();

        return redirect('/products')
            ->with('success', 'Product deleted successfully');
    }
}
