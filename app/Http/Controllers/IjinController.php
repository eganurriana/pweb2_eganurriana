<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_ijin;

class IjinController extends Controller
{
    public function index()
    {
        $ijin = tb_ijin::all();
        return view('skydash.index',compact(['ijin']));
    }

    public function create()
    {
        return view('/ijin');
    }

    public function store(Request $request)
    {
        tb_ijin::create($request->except(['_token','submit']));
        return redirect('/data');
    }

    public function edit($id)
    {
        return view('/ijin/edit');
    }
}