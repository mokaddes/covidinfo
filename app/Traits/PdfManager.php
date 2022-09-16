<?php

namespace App\Traits;

use App\Models\Covideffect;
use App\Models\CovidSideEffect;
use App\Models\Disease;
use PDF;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

trait PdfManager
{
    public static function user_submit_form_generatePdf($viewfile, $location, $data)
    {
        try {
//            dd(view($viewfile, $data)->render());
            $pdf = PDF::loadView($viewfile, $data)->setOptions(['defaultFont' => 'sans-serif']);
            $name = (rand() . '_' . time() . '.' . 'pdf');
            if (File::exists(storage_path("app/public/pdf/$location/$name"))) {
                File::delete(storage_path("app/public/pdf/$location/$name"));
            }

            // $pdf->save(storage_path("app/public/pdf/$location/$name"));
            // Storage::put('public/storage/uploads/'. rand().'_'.time().'.'.'pdf',$pdf->output());
            $pdf->save(public_path("pdf/$location/$name"));
            return [
                'url' => URL::to('/') . '/' . "pdf/$location/$name"
            ];
        } catch (\Exception $e) {
//            dd($e);
            \Log::info($e);
        }
    }


}
