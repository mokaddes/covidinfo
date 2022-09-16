@extends('layouts.app')
@section('content')
<style>
  .form-check [type=checkbox]:checked,
  .form-check [type=checkbox]:not(:checked){position:absolute;left:22px;top:9px}
  .check_box{padding:0 8px}
  .check_box label{margin:0;padding:0;padding-left:10px;vertical-align:text-bottom}
  .form-check label,
  .form-group label{white-space:pre-line}
  .img_file{width:200px;text-align:center;margin:0 auto;display:block}
</style>
<!-- Start of Main Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h3 class="mb-0 bc-title"><b>Patient Report</b></h3>
            </div>
        </div>
    </div>

    <!-- DataTales -->
    <div class="card shadow mb-4">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <div> {{$message}} </div>
        </div>
        @endif
        <div class="card-header">
            <h3 style="font-weight: 700;">@lang('web.header')</h3>
        </div>
        <div class="card-body">
            <form id="signupForm" action="{{ route('patient.report.update', $patient->user_id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.email') <span style="color:red;margin-left:2px">*</span></label>
                            <input id="email" type="email" name="email" class="form-control" value="{{ $patient->email }}" autocomplete required>
                            @if ($errors->has('email'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('email') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.on_behalf') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="on_behalf" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Diri Sendiri" @if($patient->on_behalf == 'Diri Sendiri') selected @endif>@lang('web.Diri')</option>
                                <option value="Waris" @if($patient->on_behalf == 'Waris') selected @endif>@lang('web.Waris')</option>
                            </select>
                            @if ($errors->has('on_behalf'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('on_behalf') }}
                            </p>
                            @endif
                        </div>
                    </div> --}}

                    <div class="col-sm-6">
                        <div class="mb-3">
                            <label class="form-label">@lang('web.on_behalf_relation') <span
                                    class="text-danger">*</span> </label>
                            <select  name="on_behalf_relation" class="form-control" style="width: 100%;"
                                    aria-hidden="true" id="on_behalf_relation">
                                <option value="">@lang('web.select')</option>
                                <option value="Diri" {{ $patient->on_behalf_relation == 'Diri' ? 'selected' : '' }} >@lang('web.Diri')</option>
                                <option value="Waris" {{ $patient->on_behalf_relation == 'Waris' ? 'selected' : '' }} >@lang('web.Waris')</option>
                            </select>
                            @error('on_behalf_relation')
                            <div class="text-danger">{{ 'Select a choice.' }}</div>
                            @enderror
                        </div>
                    </div>


                    {{-- <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.on_behalf_relation') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="on_behalf_relation" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Anak" @if($patient->on_behalf_relation == 'Anak') selected @endif>@lang('web.Anak')</option>
                                <option value="Ibu/bapa" @if($patient->on_behalf_relation == 'Ibu/bapa') selected @endif>@lang('web.Ibu')</option>
                                <option value="Adik-beradik" @if($patient->on_behalf_relation == 'Adik-beradik') selected @endif>@lang('web.Adik')</option>
                                <option value="Pasangan" @if($patient->on_behalf_relation == 'Pasangan') selected @endif>@lang('web.Pasangan')</option>
                                <option value="Keluarga terdekat" @if($patient->on_behalf_relation == 'Keluarga terdekat') selected @endif>@lang('web.Keluarga')</option>
                            </select>
                            @if ($errors->has('on_behalf_relation'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('on_behalf_relation') }}
                            </p>
                            @endif
                        </div>
                    </div> --}}

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.recipient_name') <span style="color:red;margin-left:2px">*</span></label>
                            <input type="text" name="recipient_name" class="form-control" value="{{ $patient->recipient_name }}" autocomplete>
                            @if ($errors->has('recipient_name'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('recipient_name') }}
                            </p>
                            @endif
                            <span class="note">@lang('web.recipient_name_note')</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">@lang('web.vaccine_recipient_card') <span class="text-danger">*</span> </label>
                            <input type="text" name="vaccine_recipient_card" class="form-control" value=" {{ $patient->vaccine_recipient_card }} " autocomplete>
                            @if ($errors->has('vaccine_recipient_card'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_recipient_card') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">@lang('web.vaccine_recipient_phone') <span class="text-danger">*</span> </label>
                            <input type="number" name="vaccine_recipient_phone" class="form-control" value="{{ $patient->vaccine_recipient_phone }}" autocomplete>
                            @if ($errors->has('vaccine_recipient_phone'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_recipient_phone') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">@lang('web.vaccine_recipient_email') <span class="text-danger">*</span> </label>
                            <input type="text" name="vaccine_recipient_email" class="form-control" value="{{ $patient->vaccine_recipient_email }}" autocomplete>
                            @if ($errors->has('vaccine_recipient_email'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_recipient_email') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">@lang('web.vaccine_recipient_countries') <span class="text-danger">*</span> </label>
                            <input type="text" name="vaccine_recipient_countries" class="form-control" value="{{ $patient->vaccine_recipient_countries }}" autocomplete>
                            @if ($errors->has('vaccine_recipient_countries'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_recipient_countries') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="form-label">@lang('web.vaccine_recipient_zip') <span class="text-danger">*</span> </label>
                            <input type="text" name="vaccine_recipient_zip" class="form-control" value="{{ $patient->vaccine_recipient_zip }}" autocomplete>
                            @if ($errors->has('vaccine_recipient_zip'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_recipient_zip') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.age') <span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control" name="age" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="11" @if($patient->age == 11) ? selected : '' @endif>11</option>
                                <option value="12" @if($patient->age == 12) ? selected : '' @endif>12</option>
                                <option value="13" @if($patient->age == 13) ? selected : '' @endif>13</option>
                                <option value="14" @if($patient->age == 14) ? selected : '' @endif>14</option>
                                <option value="15" @if($patient->age == 15) ? selected : '' @endif>15</option>
                                <option value="16" @if($patient->age == 16) ? selected : '' @endif>16</option>
                                <option value="17" @if($patient->age == 17) ? selected : '' @endif>17</option>
                                <option value="18" @if($patient->age == 18) ? selected : '' @endif>18</option>
                                <option value="19" @if($patient->age == 19) ? selected : '' @endif>19</option>
                                <option value="20" @if($patient->age == 20) ? selected : '' @endif>20</option>
                                <option value="21" @if($patient->age == 21) ? selected : '' @endif>21</option>
                                <option value="22" @if($patient->age == 22) ? selected : '' @endif>22</option>
                                <option value="23" @if($patient->age == 23) ? selected : '' @endif>23</option>
                                <option value="24" @if($patient->age == 24) ? selected : '' @endif>24</option>
                                <option value="25" @if($patient->age == 25) ? selected : '' @endif>25</option>
                                <option value="26" @if($patient->age == 26) ? selected : '' @endif>26</option>
                                <option value="27" @if($patient->age == 27) ? selected : '' @endif>27</option>
                                <option value="28" @if($patient->age == 28) ? selected : '' @endif>28</option>
                                <option value="29" @if($patient->age == 29) ? selected : '' @endif>29</option>
                                <option value="30" @if($patient->age == 30) ? selected : '' @endif>30</option>
                                <option value="31" @if($patient->age == 31) ? selected : '' @endif>31</option>
                                <option value="32" @if($patient->age == 32) ? selected : '' @endif>32</option>
                                <option value="33" @if($patient->age == 33) ? selected : '' @endif>33</option>
                                <option value="34" @if($patient->age == 34) ? selected : '' @endif>34</option>
                                <option value="35" @if($patient->age == 35) ? selected : '' @endif>35</option>
                                <option value="36" @if($patient->age == 36) ? selected : '' @endif>36</option>
                                <option value="37" @if($patient->age == 37) ? selected : '' @endif>37</option>
                                <option value="38" @if($patient->age == 38) ? selected : '' @endif>38</option>
                                <option value="39" @if($patient->age == 39) ? selected : '' @endif>39</option>
                                <option value="40" @if($patient->age == 40) ? selected : '' @endif>40</option>
                                <option value="41" @if($patient->age == 41) ? selected : '' @endif>41</option>
                                <option value="42" @if($patient->age == 42) ? selected : '' @endif>42</option>
                                <option value="43" @if($patient->age == 43) ? selected : '' @endif>43</option>
                                <option value="44" @if($patient->age == 44) ? selected : '' @endif>44</option>
                                <option value="45" @if($patient->age == 45) ? selected : '' @endif>45</option>
                                <option value="46" @if($patient->age == 46) ? selected : '' @endif>46</option>
                                <option value="47" @if($patient->age == 47) ? selected : '' @endif>47</option>
                                <option value="48" @if($patient->age == 48) ? selected : '' @endif>48</option>
                                <option value="49" @if($patient->age == 49) ? selected : '' @endif>49</option>
                                <option value="50" @if($patient->age == 50) ? selected : '' @endif>50</option>
                            </select>
                            @if ($errors->has('age'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('age') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.gender') <span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control" name="gender" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Lelaki" @if($patient->gender == 'Lelaki') ? selected : '' @endif>@lang('web.Lelaki')</option>
                                <option value="Perempuan" @if($patient->gender == 'Perempuan') ? selected : '' @endif>@lang('web.Perempuan')</option>
                            </select>
                            @if ($errors->has('gender'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('gender') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.profession')</label>
                            <select class="form-control" name="profession" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Awam" @if($patient->profession == 'Awam') ? selected : '' @endif>@lang('web.Awam')</option>
                                <option value="Swasta" @if($patient->profession == 'Swasta') ? selected : '' @endif>@lang('web.Swasta')</option>
                                <option value="Pendidikan" @if($patient->profession == 'Pendidikan') ? selected : '' @endif>@lang('web.Pendidikan')</option>
                                <option value="Kesihatan" @if($patient->profession == 'Kesihatan') ? selected : '' @endif>@lang('web.Kesihatan')</option>
                                <option value="Tidak berkerja" @if($patient->profession == 'Tidak berkerja') ? selected : '' @endif>@lang('web.Tidak')</option>
                                <option value="Bekerja sendiri" @if($patient->profession == 'Bekerja sendiri') ? selected : '' @endif>@lang('web.Bekerja')</option>
                                <option value="Peniaga kecilan" @if($patient->profession == 'Peniaga kecilan') ? selected : '' @endif>@lang('web.Peniaga')</option>
                                <option value="Perniagaan" @if($patient->profession == 'Perniagaan') ? selected : '' @endif>@lang('web.Perniagaan')</option>
                                <option value="Pelajar sekolah" @if($patient->profession == 'Pelajar sekolah') ? selected : '' @endif>@lang('web.Pelajar')</option>
                                <option value="Pelajar Kolej/Universiti" @if($patient->profession == 'Pelajar Kolej/Universiti') ? selected : '' @endif>@lang('web.Universiti')</option>
                                <option value="Lain-lain" @if($patient->profession == 'Lain-lain') ? selected : '' @endif>@lang('web.Lain')</option>
                            </select>
                            @if ($errors->has('profession'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('profession') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.nation') <span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control" name="nation" style="width: 100%;" aria-hidden="true">
                            <option value="">@lang('web.select')</option>
                            <option value="Malay" {{ $patient->nation == 'Malay' }} >@lang('web.malay')</option>
                            <option value="China" {{ $patient->nation == 'China' }} >@lang('web.china')</option>
                            <option value="India" {{ $patient->nation == 'India' }} >@lang('web.india')</option>
                            <option value="Not a citizen" {{ $patient->nation == 'Not a citizen' }} >@lang('web.notacitizine')</option>
                            <option value="Permanent resident" {{ $patient->nation == 'Permanent resident' }} >@lang('web.permanent')</option>
                            <option value="Other Malaysians" {{ $patient->nation == 'Other Malaysians' }} >@lang('web.othermalay')</option>
                        
                            </select>
                            @if ($errors->has('nation'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('nation') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.vaccine_type') <span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control" name="vaccine_type" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Awam" @if($patient->vaccine_type == 'Awam') ? selected : '' @endif>@lang('web.Awam')</option>
                                <option value="Swasta" @if($patient->vaccine_type == 'Swasta') ? selected : '' @endif>@lang('web.Swasta')</option>
                            </select>
                            @if ($errors->has('vaccine_type'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_type') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.complaints') <span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control" name="complaints" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Awam" @if($patient->complaints == 'Awam') ? selected : '' @endif>@lang('web.Awam')</option>
                                <option value="Swasta" @if($patient->complaints == 'Swasta') ? selected : '' @endif>@lang('web.Swasta')</option>
                            </select>
                            @if ($errors->has('complaints'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('complaints') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.vaccine_date') <span style="color:red;margin-left:2px">*</span></label>
                            <input type="text" id="datepicker-13" name="vaccine_date" class="form-control" placeholder="MM/DD/YYYY" value="{{ $patient->vaccine_date }}" autocomplete>
                            @if ($errors->has('vaccine_date'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_date') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.vaccine_location')</label>
                            <input type="text" name="vaccine_location" class="form-control" value="{{ $patient->vaccine_location }}" autocomplete>
                            @if ($errors->has('vaccine_location'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_location') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.vaccine_batch')</label>
                            <input type="text" name="vaccine_batch" class="form-control" value="{{ $patient->vaccine_batch }}" autocomplete>
                            @if ($errors->has('vaccine_batch'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('vaccine_batch') }}
                            </p>
                            @endif
                            <span class="note">@lang('web.vaccine_batch_note')</span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.symptoms')<span style="color:red;margin-left:2px">*</span></label>
                            <select class="form-control"  name="symptoms" id="symptoms" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="1 jam" {{ $patient->symptoms == '1 jam' ? 'selected' : '' }} >@lang('web.onejam')</option>
                                <option value="24 jam" {{ $patient->symptoms == '24 jam' ? 'selected' : '' }} >@lang('web.tweentyfourjam')</option>
                                <option value="2-3 days" {{ $patient->symptoms == '2-3 days' ? 'selected' : '' }}>@lang('web.twothreedays')</option>
                                <option value="1 week" {{ $patient->symptoms == '1 week' ? 'selected' : '' }}>@lang('web.oneweek')</option>
                                <option value="2 weeks" {{ $patient->symptoms == '2 weeks' ? 'selected' : '' }}>@lang('web.twoweeks')</option>
                                <option value="3 weeks" {{ $patient->symptoms == '3 weeks' ? 'selected' : '' }}>@lang('web.threeweeks')</option>
                                <option value="a month and up" {{ $patient->symptoms == 'a month and up' ? 'selected' : '' }}>@lang('web.amonthandup')</option>
                            </select>
                            @if ($errors->has('symptoms'))
                            <p class="alert alert-danger p-1">
                                {{ $errors->first('symptoms') }}
                            </p>
                            @endif
                        </div>
                    </div>
                    <?php  
                   $abc = preg_replace("/,([\s])+/",",",$patient->covid_side_effect_id); 
                    $covid_side_effect_id_arr = explode (",", $abc);


                    ?>
                    <div class="col-12">
                        <div class="check_box form-group">
                            <label class="p-0">@lang('web.covid_side_effect_id')  <span style="color:red;margin-left:2px">*</span></label>
                            <div class="row">
                                @foreach ($side_effect as $k => $item)
                                <div class="col-sm-6">
                                    <div class="form-check form-check-custom form-check-solid me-9">
                                        <input class="form-check-input" name="covid_side_effect_id[]" type="checkbox" value="{{$item->id}}" id="se_checkbox_{{ $k }}" 
                                        @foreach($covid_side_effect_id_arr as $key => $cs ) 
                                        {{ $cs == $item->id ? 'checked' : ''  }}
                                        @endforeach 
                                        >
                                        <label class="form-check-label ms-3" for="se_checkbox_{{ $k }}">{{$item->name}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>@lang('web.other_effect')
                            </label>
                            <textarea name="other_effect" class="form-control" rows="3">{{ $patient->other_effect }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.affect_quality') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="affect_quality"  id="affect_quality" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Kecacatan kekal" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Kecacatan_kekal')</option>
                                <option value="Meninggal dunia" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Meninggal')</option>
                                <option value="Kecacatan sementara" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Kecacatan_sementara')</option>
                                <option value="Teruk" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Teruk')</option>
                                <option value="Sederhana" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Sederhana')</option>
                                <option value="Sedikit sahaja" {{ $patient->affect_quality == 'Kecacatan kekal' ? 'selected' : '' }} >@lang('web.Sedikit_sahaja')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.hospitalized') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="hospitalized"  id="hospitalized" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="ya" {{ $patient->hospitalized == 'ya' ? 'selected' : '' }} >@lang('web.yes')</option>
                                <option value="tidak" {{ $patient->hospitalized == 'tidak' ? 'selected' : '' }} >@lang('web.not')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.ward_type')</label>
                            <select name="ward_type" id="ward_type" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="ordinary ward" {{ $patient->hospitalized == 'ordinary ward' ? 'selected' : '' }} >@lang('web.ordinaryward')</option>
                                <option value="icu (intensive care unit)" {{ $patient->hospitalized == 'icu (intensive care unit)' ? 'selected' : '' }} >@lang('web.icu')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.hospitalized_duration')</label>
                            <select name="hospitalized_duration" id="hospitalized_duration" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Sehari" {{ $patient->hospitalized_duration == 'Sehari' ? 'selected' : '' }}>@lang('web.Sehari')</option>
                                <option value="2-3 hari" {{ $patient->hospitalized_duration == '2-3 hari' ? 'selected' : '' }}>2-3 @lang('web.hari')</option>
                                <option value="Seminggu" {{ $patient->hospitalized_duration == 'Seminggu' ? 'selected' : '' }}>@lang('web.Seminggu')</option>
                                <option value="2 minggu" {{ $patient->hospitalized_duration == '2 minggu' ? 'selected' : '' }}>@lang('web.twoweeks')</option>
                                <option value="3 minggu" {{ $patient->hospitalized_duration == '3 minggu' ? 'selected' : '' }}>@lang('web.threeweeks')</option>
                                <option value="Sebulan dan ke atas" {{ $patient->hospitalized_duration == 'Sebulan dan ke atas' ? 'selected' : '' }}>@lang('web.amonthandup')</option>
                                <option value="Others" {{ $patient->hospitalized_duration == 'Others' ? 'selected' : '' }}>Others</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.hospital_name')</label>
                            <input type="text" name="hospital_name" class="form-control" value="{{ $patient->hospital_name }}" autocomplete>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.effect_duration') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="effect_duration"  id="effect_duration" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Sehari" {{ $patient->effect_duration == 'Sehari' ? 'selected' : '' }}>@lang('web.Sehari')</option>
                                <option value="2-3 hari" {{ $patient->effect_duration == '2-3 hari' ? 'selected' : '' }}>2-3 @lang('web.hari')</option>
                                <option value="Seminggu" {{ $patient->effect_duration == 'Seminggu' ? 'selected' : '' }}>@lang('web.Seminggu')</option>
                                <option value="2 minggu" {{ $patient->effect_duration == '2 minggu' ? 'selected' : '' }}>@lang('web.twoweeks')</option>
                                <option value="3 minggu" {{ $patient->effect_duration == '3 minggu' ? 'selected' : '' }}>@lang('web.threeweeks')</option>
                                <option value="Sebulan" {{ $patient->effect_duration == 'Sebulan' ? 'selected' : '' }}>@lang('web.Sebulan')</option>
                                <option value="Masih berterusan" {{ $patient->effect_duration == 'Masih berterusan' ? 'selected' : '' }}>@lang('web.Masih_berterusan')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.present_status') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="present_status"  id="present_status" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="Pulih sepenuhnya" {{ $patient->effect_duration == 'Pulih sepenuhnya' ? 'selected' : '' }} >@lang('web.fullyrecomered')</option>
                                <option value="Berkurang, masih ada baki kesakitan" {{ $patient->effect_duration == 'Berkurang, masih ada baki kesakitan' ? 'selected' : '' }} >@lang('web.decreased')</option>
                                <option value="Tiada perubahan" {{ $patient->effect_duration == 'Tiada perubahan' ? 'selected' : '' }}>@lang('web.nochange')</option>
                                <option value="Semakin teruk" {{ $patient->effect_duration == 'Semakin teruk' ? 'selected' : '' }}>@lang('web.gettingworse')</option>
                                <option value="Meninggal dunia" {{ $patient->effect_duration == 'Meninggal dunia' ? 'selected' : '' }}>@lang('web.die')</option>
                            </select>
                            <span class="note">@lang('web.present_status_note')</span>
                        </div>
                    </div>
                    <?php  
                   $abc = preg_replace("/,([\s])+/",",",$patient->previous_disease); 
                    $previous_disease_arr = explode (",", $abc);


                    ?>
                    <div class="col-12">
                        <div class="check_box form-group">
                            <div>
                                <label class="p-0">@lang('web.previous_disease') <span style="color:red;margin-left:2px">*</span></label>
                            </div>
                            <div class="row">
                                @foreach ($previous_disease as $k => $item)
                                <div class="col-sm-6">
                                    <div class="form-check">
                                        <input name="previous_disease[]" class="form-check-input previous_disease" type="checkbox" value="{{$item->id}}" id="se_second_checkbox_{{ $k }}"   
                                        @foreach($previous_disease_arr as $key => $ps ) 
                                            {{ $ps == $item->id ? 'checked' : '' }}
                                        @endforeach 
                                        >
                                        <label class="form-check-label" for="se_second_checkbox_{{ $k }}" style="display: block">{{$item->name}}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>@lang('web.diagnosis')</label>
                            <textarea name="diagnosis" class="form-control" class="form-control" rows="3">{{ $patient->diagnosis }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.effect_confirm')</label>
                            <select name="effect_confirm" id="effect_confirm" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="ya" {{ $patient->effect_confirm == 'ya' ? 'selected' : '' }} >@lang('web.yes')</option>
                                <option value="tidak" {{ $patient->effect_confirm == 'tidak' ? 'selected' : '' }} >@lang('web.not')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.report') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="report"  id="report" class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="" >@lang('web.select')</option>
                                <option value="ya" {{ $patient->report == 'ya' ? 'selected' : '' }} >@lang('web.yes')</option>
                                <option value="tidak" {{ $patient->report == 'tidak' ? 'selected' : '' }} >@lang('web.not')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.npra') <span style="color:red;margin-left:2px">*</span></label>
                            <select name="npra" id="npra"  class="form-control" style="width: 100%;" aria-hidden="true">
                                <option value="">@lang('web.select')</option>
                                <option value="ya" {{ $patient->report == 'ya' ? 'selected' : '' }}>@lang('web.yes')</option>
                                <option value="tidak" {{ $patient->report == 'tidak' ? 'selected' : '' }}>@lang('web.not')</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>@lang('web.contact') </label>
                            <textarea name="contact" class="form-control" class="form-control" rows="3">{{ $patient->contact }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>@lang('web.comments')</label>
                            <textarea name="comments" class="form-control" class="form-control" rows="3">{{ $patient->comments }}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>@lang('web.file')</label>
                            <input type="file" name="file" class="dropify" id="input-file-now" data-height="150">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <img src="{{ asset($patient->file) }}" class="img_file" width="200" alt="image">
                        </div>
                    </div>
                    <div class="col-12 mt-2 mb-4 text-center form_btn">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

</div>

@push('footer_script')
<script>
    $(document).ready(function() {
        // input file image
        $('.dropify').dropify();
    })
</script>
@endpush

@endsection