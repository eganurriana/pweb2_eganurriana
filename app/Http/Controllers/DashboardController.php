<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tb_ijin;

class DashboardController extends Controller
{
    public function tampil(){
        $tb_ijin = tb_ijin::all();
        
        return view('skydash.index',compact(['tb_ijin']));
    }

    public function data(){
        $tb_ijin = tb_ijin::all();
        
        return view('skydash.data',compact(['tb_ijin']));
    }

    public function form(){
        return view('skydash.pages.forms.form');
    }

    public function delete(string $id_ijin)
    {
        tb_ijin::where('id_ijin',$id_ijin)->delete();
        return redirect()->to('data')->with('success');
    }
}