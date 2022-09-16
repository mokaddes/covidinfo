<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        .container {
            width: 80%;
            max-width: 1024px;
            margin: 0 auto;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .text-center {
            text-align: center;
        }


        .row {
            display: grid;
            grid-template-columns: auto auto;
        }

        .col-sm-6 {
            background-color: rgba(255, 255, 255, 0.8);
        }
        .checkbox-inline,.radio-inline{position:relative;display:inline-block;padding-left:20px;margin-bottom:0;font-weight:400;vertical-align:middle;cursor:pointer}
    </style>
</head>
<body>
    @php
       $setting = DB::table('web_settings')->first();
    @endphp

<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        {{-- <img src="{{ public_path($setting->logo) }}" style="height: 70px" alt=""> --}}
        <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path($setting->logo))) }}" style="height: 50px" width="50px" alt="">
        <p class="border-2 border-dark p-2" style="border: 4px solid #222"><b>{{ $serial ?? 0 }}</b></p>
    </div>

    <h4 class="text-center bold">BORANG ADUAN PUSAT KAUNSELING DAN <br>
        PUSAT LAPORAN UNTUK COVID-19 DAN <br>
        KESAN SAMPINGAN VAKSIN</h4>
</div>
<div class="container">
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>Email: <b><a href="mailto:{{ $patient['user']['email'] ?? "N/A" }}">{{ $patient['user']['email'] ?? "N/A" }}</a></b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.on_behalf_relation'): <b>{{ $patient['on_behalf_relation'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.recipient_name'): <b>{{ $patient['recipient_name'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_recipient_card'): <b
                        >{{ $patient['vaccine_recipient_card'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_recipient_phone'): <b
                        >{{ $patient['vaccine_recipient_phone'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_recipient_email'): <b
                        >{{ $patient['vaccine_recipient_email'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>Country: <b>{{ $patient['vaccine_recipient_countries'] ?? "N/A" ?? '' }}</b></p>
                    <!-- <input type="text" name="vaccine_recipient_countries" class="form-control select2" value="" autocomplete> -->
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_recipient_zip'): <b
                        >{{ $patient['vaccine_recipient_zip'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.age'): <b>{{ $patient['age'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.gender'): <b>{{ $patient['gender'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.profession'): <b>{{ $patient['profession'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.nation'): <b>{{ $patient['nation'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_type'): <b
                        >{{ $patient['vaccine_type'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.complaints'): <b
                        >{{ $patient['complaints'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_date'): <b
                        >{{ $patient['vaccine_date'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_location'): <b>{{ $patient['vaccine_location'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.vaccine_batch'): <b>{{ $patient['vaccine_batch'] ?? "N/A" }}</b></p>
                    <span class="note">@lang('web.vaccine_batch_note')</span>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.symptoms'):<b
                        >{{ $patient['symptoms'] ?? "N/A" }}</b></p>
                </div>
            </div>
            <div class="col-sm-12">
                @if($patient['covid_side_effect_id'] ?? "N/A")
                    @php($effect_ids = str_replace(' ', '', $patient['covid_side_effect_id'] ?? "N/A"))
                    @php($effect_ids = explode(',', $effect_ids))
                    <p>@lang('web.covid_side_effect_id'): <span
                        >*</span></p>
                    <div class="row">
                        @foreach ($side_effect as $k => $item)
                            @if(!in_array($item->id, $effect_ids))
                                @continue
                            @endif
                            <div class="">
                                <div class="">
                                    <label class="checkbox-inline" for="se_checkbox_{{ $k }}">
                                    <input class="covid-effect" checked type="checkbox"
                                        value="{{$item->id}}" id="se_checkbox_{{ $k }}">{{$item->name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.affect_quality'): <b>{{ $patient['affect_quality'] ?? "N/A" }}</b>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.hospitalized'): <b>{{ $patient['hospitalized'] ?? "N/A" }}</b>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.ward_type'): <b>{{ $patient['ward_type'] ?? "N/A" }}</b></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.hospitalized_duration'):
                            <b>{{ $patient['hospitalized_duration'] ?? "N/A" }}</b></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.hospital_name'): <b>{{ $patient['hospital_name'] ?? "N/A" }}</b></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.effect_duration'): <b>{{ $patient['effect_duration'] ?? "N/A" }}</b>
                        </p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.present_status'): <b>{{ $patient['present_status'] ?? "N/A" }}</b>
                        </p>
                        <span class="note">@lang('web.present_status_note'):</span>
                    </div>
                </div>

                @if($patient['previous_disease'] ?? "N/A")
                    <div class="col-sm-12">
                        <div class="mb-1">
                            <p>@lang('web.previous_disease'): <span>*</span>
                            </p>
                        </div>
                        @php($prv_disease = str_replace(' ', '', $patient['previous_disease'] ?? "N/A"))
                        @php($prv_disease = explode(',', $prv_disease))
                        @foreach ($previous_disease as $k => $item)
                            @if(!in_array($item->id, $prv_disease))
                                @continue
                            @endif
                            <div class="">
                                <div class="">
                                    <label class="checkbox-inline" for="se_second_checkbox_{{ $k }}">
                                    <input checked class="previous_disease"
                                           type="checkbox" value="{{$item->id}}" id="se_second_checkbox_{{ $k }}">
                                    {{$item->name}}</label>
                                </div>
                                @endforeach
                            </div>
                    </div>
                @endif
                <div class="col-sm-12">
                    <div class="mb-1">
                        <p>@lang('web.diagnosis'): <b>{{ $patient['diagnosis'] ?? "N/A" }}</b></p>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.effect_confirm'): <b>{{ $patient['effect_confirm'] ?? "N/A" }}</b></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.report') <b>{{ $patient['report'] ?? "N/A" }}</b></p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-1">
                        <p>@lang('web.npra') <b>{{ $patient['npra'] ?? "N/A" }}</b></p>
                    </div>
                </div>
            </div>


            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.diagnosis'): <b>{{ $patient['diagnosis'] ?? "N/A" }}</b></p>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.effect_confirm'): {{ $patient['effect_confirm'] ?? "N/A" }}</p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.report') <b>{{ $patient['report'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.npra'): <b>{{ $patient['npra'] ?? "N/A" }}</b>
                    </p>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.contact'): <b>{{ $patient['contact'] ?? 'N/A' }}</b></p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-1">
                    <p>@lang('web.comments'): <b>{{ $patient['comments'] ?? "N/A" }}</b></p>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
