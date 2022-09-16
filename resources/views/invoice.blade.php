<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
</head>

<body>


    <div class="invoice_header mt-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}">
                        </div>
                        <div class="col-6">
                            <div class="float-end invoice_id">
                                <span>BAPATECV00000001</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 invoice_heading_text">
                        <h2> COUNSELING CENTER COMPLAINT FORM AND <br/> REPORTING CENTER FOR COVID-19 AND <br/> SIDE EFFECTS OF VACCINE</h2>
                        <p>Please ensure that the form is completed so that further investigation can be carried out. Details marked * <br/> <strong>are MUST BE COMPLETED. Only completed forms will be processed.</strong></p>
                        <h5>Please fill in all details:</h5>
                    </div>
                    <div class="invoice_details mt-2">
                        <div class="row mb-4">
                            <div class="col-12">
                                <p>Full Name follows IC/Passport* <span>Jone Doe</span></p>
                            </div>
                            <div class="col-12">
                                <p>IC / Passport Number* <span>01245785477</span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Age* <span>44</span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Phone Number* <span>01245785477</span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Email <span>Example@gmail.com</span></p>
                            </div>
                            <div class="col-md-6">
                                <p>Current address* <span></span></p>
                            </div>
                        </div>
                        <div class="row vaccination_data">
                            <h4>Vaccination Date* <i class="fa fa-calendar"></i> <span>01/01/2022</span></h4>
                            <div class="col-md-4">
                                <div class="vaccination_title">
                                    <h5>Types of Vaccination Accepted*</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                                        <label class="form-check-label" for="checkbox1">Oxford - Astra Zaneca</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked="" value="" id="checkbox2">
                                        <label class="form-check-label" for="checkbox2">Pfizer Comminiraty</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox3">
                                        <label class="form-check-label" for="checkbox3">Sinovac</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox4">
                                        <label class="form-check-label" for="checkbox4">Modern</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox5">
                                        <label class="form-check-label" for="checkbox5">Others:</label>
                                        <span>Other Value</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="vaccination_title">
                                    <h5>Vaccination Acceptance*</h5>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked value="" id="checkbox6">
                                        <label class="form-check-label" for="checkbox6">Oxford - Astra Zaneca</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" checked value="" id="checkbox7">
                                        <label class="form-check-label" for="checkbox7">Pfizer Comminiraty</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox8">
                                        <label class="form-check-label" for="checkbox8">Sinovac</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox9">
                                        <label class="form-check-label" for="checkbox9">Modern</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="checkbox10">
                                        <label class="form-check-label" for="checkbox10">Others:</label>
                                        <span>Other Value</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="vaccination_title">
                                    <h5>Vaccine Effective Date*</h5>
                                    <i class="fa fa-calendar"></i>
                                    <span>01/01/2022</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4 mb-5 adverse_errect">
                            <h5>Please select the adverse effects you experienced after your vaccination</h5>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox11">
                                    <label class="form-check-label" for="checkbox11">General disorders (Fever, flu)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox12">
                                    <label class="form-check-label" for="checkbox12">Nervous system disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox13">
                                    <label class="form-check-label" for="checkbox13">Heart disorders (cardiac arrest, myocarditis)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox14">
                                    <label class="form-check-label" for="checkbox14">Respiratory disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox15">
                                    <label class="form-check-label" for="checkbox15">Infections (including nasopharyngitis)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox16">
                                    <label class="form-check-label" for="checkbox16">Vascular disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox17">
                                    <label class="form-check-label" for="checkbox17">Gastrointestinal disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox18">
                                    <label class="form-check-label" for="checkbox18">Blood disorders (blood clots, low platelets)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox19">
                                    <label class="form-check-label" for="checkbox19">Muscle tissue disorders / Neoplasms</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox20">
                                    <label class="form-check-label" for="checkbox20">Skin Disorders (including rashes)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox21">
                                    <label class="form-check-label" for="checkbox21">Pregnancy/Congenital Disorders</label>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox22">
                                    <label class="form-check-label" for="checkbox22">Reproductive & breast disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox23">
                                    <label class="form-check-label" for="checkbox23">Hepatic/Endocrine Disorders (including thrombosis)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" checked type="checkbox" value="" id="checkbox24">
                                    <label class="form-check-label" for="checkbox24">Kidney & urinary disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox25">
                                    <label class="form-check-label" for="checkbox25">Metabolic disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox26">
                                    <label class="form-check-label" for="checkbox26">Psychiatric disorders</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox27">
                                    <label class="form-check-label" for="checkbox27">Immune system disorders (including anaphylaxic)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox28">
                                    <label class="form-check-label" for="checkbox28">Investigation/Device</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox29">
                                    <label class="form-check-label" for="checkbox29">Eye disorders (including blindness)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox30">
                                    <label class="form-check-label" for="checkbox30">Ear disorders (including deafness)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox31">
                                    <label class="form-check-label" for="checkbox31">Injuries/Surgical and medical procedures</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkbox32">
                                    <label class="form-check-label" for="checkbox32">Others:</label>
                                    <span>value</span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                 </div>    
            </div>
        </div>
    </div>















    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('frontend/assets/js/select2.full.min.js') }}"></script>
</body>

</html>
