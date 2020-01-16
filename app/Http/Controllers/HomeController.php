<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store()
    {
        if(session('success')){

           Alert::toast(session('success'),'success');
        }

        $latestProducts = Product::latest()->take(3)->get(); 
        return view('store', compact('latestProducts'));
       }

}
