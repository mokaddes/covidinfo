<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\CovidSideEffect;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changelang($lnag)
    {

        if($lnag){
            Session::put('lang', $lnag);
        }
        return redirect()->back();

    //     App::setLocale($lang);
    // $side_effect = CovidSideEffect::all();
    // return view('welcome', compact('side_effect'));

    }





}
