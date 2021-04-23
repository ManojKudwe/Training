<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $configs= Config::latest()->paginate(5);

        return view('configs.index', compact('configs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('configs.create');
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
            'config_name' => 'required',
			'config_value' => 'required',
			'short_code' => 'required',
            ]);	
		
        Config::create($request->all());

        return redirect()->route('configs.index')
            ->with('success', 'configuration created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $config= Config::find($id);
        return view('configs.show')->with('config',$config);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $config= Config::find($id);
        return view('configs.edit', compact('config'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
            'config_name' => 'required',
			'config_value' => 'required',
            ]);	
		
        $config= Config::find($id);
		$config ->config_name = $request->config_name;
		$config ->config_value = $request->config_value;
		$config->save();

        return redirect()->route('configs.index')
            ->with('success', 'configuration updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Config  $config
     * @return \Illuminate\Http\Response
     */
    public function destroy(Config $config)
    {
        $config->delete();

        return redirect()->route('configs.index')
            ->with('success', 'config deleted successfully.');
    }
}
