<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PopupController extends Controller
{
    //

    public function getAjaxReport()
    {
        $covid_side_effects = null;
        $user = DB::table('users')->select('users.*', 'covideffects.vaccine_type', 'covideffects.covid_side_effect_id')->leftJoin('covideffects', 'covideffects.user_id', 'users.id')
        ->where('users.role',3)
        ->take(10)
        ->orderBy('users.id', 'DESC')
        ->get()->toArray();

        if(count($user) > 0 ){

            $seril = rand(0, count($user)-1) ;
            $user = $user[$seril];
            $effects =  null;

            if(!empty($user) && $user->covid_side_effect_id ){
                $new_str = str_replace(' ', '', $user->covid_side_effect_id);
                $covid_side_effect_id_arr = explode (",", $new_str);
                $effects = DB::table('covid_side_effects')->whereIn('id', $covid_side_effect_id_arr)->pluck('name')->implode(', ');
            }


            $res['status'] = 1;


            $res['html'] = view('popup_notification')->withUser($user)->withEffects($effects)->render();
            return response()->json($res);
            // $userphoto = $user->avatar ?? null;
            // $userName = $user->name ?? null;
            // $covid_side_effects = $covid_side_effects;
            // $uservaccine_type = $user->vaccine_type ?? null;
            // return $data = [$userphoto, $userName, $covid_side_effects, $uservaccine_type];

        }else{

            return response()->json($res);
        }





    }


}
