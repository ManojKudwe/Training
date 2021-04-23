<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(5);

        return view('banners.index', compact('banners'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('banners.create');
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
            'title' => 'required',
            'description' => 'required',
		 	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		 	'status' => 'required',
        ]);
		$upimg='';
		$banner = new banner();
		$banner -> title = request('title');
		$banner -> description = request('description');
		$banner -> status = request('status');
		if($files=$request->file('image'))
		{
			$path= public_path('/banner_img/');
			$img=date('YmdHis').".".$files->getClientOriginalExtension();
			$files->move($path,$img);
			$upimg=$img;
		}
		$banner->image = $upimg;
		$banner->save();
        
        return redirect()->route('banners.index')
            ->with('success', 'banner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$banner= Banner::find($id);
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
		$banner= Banner::find($id);
        return view('banners.edit', compact('banner'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		 $request->validate([
            'title' => 'required',
            'description' => 'required',
		 	'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		 	'status' => 'required',
        ]);
       
		$upimg='';
		$banner= banner::find($id);
		$banner -> title = $request->title;
		$banner -> description = $request-> description;
		$banner -> status = $request->status;
		if($files=$request->file('image'))
		{
			$path= public_path('/banner_img/');
			$img=date('YmdHis').".".$files->getClientOriginalExtension();
			$files->move($path,$img);
			$upimg=$img;
		}
		$banner->image = $upimg;
		$banner->save();
        
        return redirect()->route('banners.index')
            ->with('success', 'banner updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$banner= banner::find($id);
        $banner->delete();

        return redirect()->route('banners.index')
            ->with('success', 'banner deleted successfully');
    }
}
