<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class couponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons= Coupon::latest()->paginate(5);

        return view('coupon.index', compact('coupons'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coupon = Str::random(8);
        return view('coupon.create',['coupon'=>$coupon]);
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
            'coupon' => 'required|unique:coupon,coupon',
			'coupon_expiry_date' => 'required',
			'value' => 'required',
			'status' => 'required',
            ]);	
		
        Coupon::create($request->all());

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $coupon= Coupon::find($id);
        return view('coupon.show')->with('coupon',$coupon);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $coupon= Coupon::find($id);
        return view('coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, coupon $coupon)
    {
        $request->validate([
            'coupon' => 'required',
			'coupon_expiry_date' => 'required',
			'value' => 'required',
			'status' => 'required',
            ]);	
		
        $coupon->update($request->all());

        return redirect()->route('coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(coupon $coupon)
    {
         $coupon->delete();

        return redirect()->route('coupons.index')
            ->with('success', 'coupon deleted successfully.');
    }
}
