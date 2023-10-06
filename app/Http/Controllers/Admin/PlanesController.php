<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Convenio;
use App\Models\Plane;
use Illuminate\Http\Request;

class PlanesController extends Controller
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
        return view('admin.planes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $convenios=Convenio::all();
        return view('admin.planes.create', compact('convenios'));
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
            'plan_nombre' => 'required'
        ]);

        $plan=new Plane();
        $plan->plan_nombre=$request->plan_nombre;
        $plan->convenio_id=$request->plan_convenio;

        $plan->save();

        return redirect()->route('admin.planes.index');
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
        $planes=Plane::find($id);
        $convenios=Convenio::all();
        return view('admin.planes.edit', compact('planes','convenios'));
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
        $request->validate([
            'plan_nombre' => 'required'
        ]);

        $plan=Plane::find($id);
        $plan->plan_nombre=$request->plan_nombre;
        $plan->convenio_id=$request->plan_convenio;

        $plan->save();

        return redirect()->route('admin.planes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan=Plane::find($id);
        $plan->delete();
        return view('admin.planes.index')->with('borrar','S');

    }
}
