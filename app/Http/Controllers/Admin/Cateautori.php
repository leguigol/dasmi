<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cateautori as ModelsCateautori;
use Illuminate\Http\Request;

class Cateautori extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $cates=ModelsCateautori::all();
        return view('admin.catauto.index',compact('cates'));
    }
    public function store(Request $request){
        $request->validate([
            'nombre' => 'required'
        ]);

        $cate=new ModelsCateautori();
        $cate->descripcion=$request->nombre;
        $cate->tiene_cose=$request->tiene;
        $cate->coseguro=$request->coseguro;

        $cate->save();

        return redirect()->route('admin.catauto.index');

    }
    public function create(){
        return view('admin.catauto.create');
    }
    public function destroy($id){
        $cate=ModelsCateautori::find($id);
        $cate->delete();
        $cates=ModelsCateautori::all();
        return view('admin.catauto.index',compact('cates'));
    }
    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required'
        ]);
        $cate=ModelsCateautori::find($id);
        $cate->descripcion=$request->nombre;
        $cate->tiene_cose=$request->tiene;
        $cate->coseguro=$request->coseguro;

        $cate->save();

        return redirect()->route('admin.catauto.index');

    }
    public function edit($id){
        $cate=ModelsCateautori::find($id);
        return view('admin.catauto.edit',compact('cate'));
    }
}
