<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convenio;
use Illuminate\Http\Request;

class ConveniosController extends Controller
{
 
    public function __construct()
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
        $convenios=Convenio::all();
        return view('admin.convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.convenios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate=[
            'convenio_nombre' => 'required',
        ];

        $convenio=new Convenio();
        $convenio->convenio_nombre=strtoupper($request->convenio_nombre);
        $convenio->save();

        $convenios=Convenio::all();
        return view('admin.convenios.index', compact('convenios'));
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
        $convenios=Convenio::find($id);
        return view('admin.convenios.edit', compact('convenios'));
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
        $request->validate=[
            'convenio_nombre' => 'required',
        ];

        $convenio=Convenio::find($id);
        $convenio->convenio_nombre=strtoupper($request->convenio_nombre);
        $convenio->save();

        $convenios=Convenio::all();
        return view('admin.convenios.index', compact('convenios'));
        
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
