<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/select2-bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('frontend/assets/css/main.css')); ?>">
    <title>Covidinfo</title>
    <style>
        .dropify-wrapper:hover {
            background: #efefef !important;
        }
    </style>
</head>

<body style="background-color: #e7e8e9;">
    <!-- header  -->
    <div class="header navbar-light bg-light shadow-sm mb-5 bg-body sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                        <img style="width:120px;" src="<?php echo e(asset('frontend/assets/images/logo.png')); ?>" alt="logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/home')); ?>" class="nav-link">Home</a>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('login')); ?>" class="nav-link">Log in</a>
                            </li>
                            <?php if(Route::has('register')): ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('register')); ?>" class="nav-link">Register</a>
                            </li>
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- main content -->
    <div class="main-content mb-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-9">
                    <div class="card card_form">
                        <div class="card-header">
                            <h4>Laporan Kesan Sampingan Selepas Vaksinasi Covid-19</h4>
                            <p>Inisiatif Persatuan Pengguna Islam Malaysia (PPIM) bersama GPMC, IMPAK & MFM mengumpul maklumat daripada rakyat Malaysia yang menerima kesan sampingan selepas vaksinasi. Maklumat diri adalah RAHSIA kecuali diizinkan untuk dikongsi keluar.</p>
                        </div>
                        <div class="card-body">
                            <form action="#" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda mengisi borang ini untuk *</label>
                                            <select name="" class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda mengisi borang ini untuk *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Anak</option>
                                                <option>Ibu/bapa</option>
                                                <option>Adik-beradik</option>
                                                <option>Pasangan</option>
                                                <option>Keluarga terdekat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama penerima vaksin *</label>
                                            <input type="text" name="" class="form-control">
                                            <span class="note">Nama akan dirahsiakan, diperlukan untuk mengelakkan pertembungan data.</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Umur *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>11</option>
                                                <option>12</option>
                                                <option>13</option>
                                                <option>14</option>
                                                <option>15</option>
                                                <option>16</option>
                                                <option>17</option>
                                                <option>18</option>
                                                <option>19</option>
                                                <option>21</option>
                                                <option>22</option>
                                                <option>23</option>
                                                <option>24</option>
                                                <option>25</option>
                                                <option>26</option>
                                                <option>27</option>
                                                <option>28</option>
                                                <option>29</option>
                                                <option>30</option>
                                                <option>31</option>
                                                <option>32</option>
                                                <option>33</option>
                                                <option>34</option>
                                                <option>35</option>
                                                <option>36</option>
                                                <option>37</option>
                                                <option>38</option>
                                                <option>39</option>
                                                <option>40</option>
                                                <option>41</option>
                                                <option>42</option>
                                                <option>43</option>
                                                <option>44</option>
                                                <option>45</option>
                                                <option>46</option>
                                                <option>47</option>
                                                <option>48</option>
                                                <option>49</option>
                                                <option>50</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jantina *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Lelaki</option>
                                                <option>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bidang pekerjaan</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Awam</option>
                                                <option>Swasta</option>
                                                <option>Pendidikan</option>
                                                <option>Kesihatan</option>
                                                <option>Tidak berkerja</option>
                                                <option>Bekerja sendiri</option>
                                                <option>Peniaga kecilan</option>
                                                <option>Perniagaan</option>
                                                <option>Pelajar sekolah</option>
                                                <option>Pelajar Kolej/Universiti</option>
                                                <option>Lain-lain</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bangsa *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Awam</option>
                                                <option>Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis vaksin yang diterima *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Awam</option>
                                                <option>Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Aduan untuk kesan sampingan dos *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Awam</option>
                                                <option>Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Tarikh suntikan *</label>
                                            <input type="date" name="" class="form-control">
                                            <span class="note">dd-MMM-yyyy</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Lokasi penerimaan suntikan</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nombor batch vaksin</label>
                                            <input type="text" name="" class="form-control">
                                            <span class="note">Terdapat di kad vaksin yang diterima anda/waris juga aplikasi MySejahtera</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bilakah gejala kesan sampingan pertama muncul selepas suntikan? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" name="" style="width: 100%;" aria-hidden="true">
                                                <option>Awam</option>
                                                <option>Swasta</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <label class="form-label">Apakah kesan sampingan yang dialami? *</label>
                                        
                                        <div class="row">
                                            <?php $__currentLoopData = $side_effect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="<?php echo e($item->id); ?>" id="checkbox1">
                                                    <label class="form-check-label" for="checkbox1"><?php echo e($item->name); ?></label>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Lain-lain kesan sampingan sila nyatakan:
                                            </label>
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bagaimana ia memberi kesan kepada kualiti kehidupan? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda/waris dimasukkan ke hospital? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis wad (jika berkaitan)</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Berapa lamakah anda/waris dirawat di hospital?</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Nama hospital tempat dirawat / disahkan meninggal (jika ada)</label>
                                            <input type="text" name="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Berapa lamakah tempoh anda/waris mengalami kesan sampingan ini? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bagaimana keadaan anda/waris sekarang? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                            <span class="note">Pilih satu sahaja yang paling teruk</span>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Apakah sejarah penyakit anda/waris sebelum ini? *</label>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox58">
                                                    <label class="form-check-label" for="checkbox58">Tiada sejarah penyakit</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox59">
                                                    <label class="form-check-label" for="checkbox59">Masalah jantung</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox60">
                                                    <label class="form-check-label" for="checkbox60">Kencing manis</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox61">
                                                    <label class="form-check-label" for="checkbox61">Gout</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox62">
                                                    <label class="form-check-label" for="checkbox62">Alahan (allergy)</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox63">
                                                    <label class="form-check-label" for="checkbox63">Athma</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox64">
                                                    <label class="form-check-label" for="checkbox64">Penyakit auto-imun</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox65">
                                                    <label class="form-check-label" for="checkbox65">Darah tinggi</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox67">
                                                    <label class="form-check-label" for="checkbox67">Masalah buah pinggang</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox68">
                                                    <label class="form-check-label" for="checkbox68">Kanser</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox69">
                                                    <label class="form-check-label" for="checkbox69">Masalah hati</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="checkbox70">
                                                    <label class="form-check-label" for="checkbox70">Anemia</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Reaksi dan diagnosis doktor terhadap kesan sampingan yang anda/waris terima</label>
                                            <textarea class="form-control" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah doktor mengatakan ia berkaitan suntikan vaksin yang diterima?</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda telah membuat laporan dalam aplikasi MySejahtera? *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda telah membuat laporan ke Bahagian Regulatori Farmasi Negara (National Pharmaceutical Regulatory Agency-NPRA) *</label>
                                            <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" aria-hidden="true">
                                                <option>Diri Sendiri</option>
                                                <option>Waris</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Adakah anda sudi dihubungi? Nyatakan maklumat seperti nombor telefon/emel dan nama (jika dihubungi bagi pihak waris </label>
                                            <textarea class="form-control" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Komen atau aduan tambahan mengenai kesan sampingan dan keadaan kehidupan terkini</label>
                                            <textarea class="form-control" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Jika mahu berkongsi gambar berkaitan. Kerahsiaan gambar mengikut kebenaran tuan/puan seperti pada soalan di atas.</label>
                                            <input type="file" class="dropify" id="input-file-now" data-height="150">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Link ke Telegram channel aduan AEFI masyarakat:</label>
                                            <a href="https://t.me/joinchat/IvjQfqdZQRY2NTFl" target="_blank">https://t.me/joinchat/IvjQfqdZQRY2NTFl</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Telegram channel panduan pelaporan kesan sampingan:</label>
                                            <a href="https://t.me/myaeficovid" target="_blank">https://t.me/myaeficovid</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kompilasi kes-kes AEFI (Adverse Events Following Immunisation) Vaksin Covid.</label>
                                            <a href="https://t.me/AEFICOVIDVAX" target="_blank">https://t.me/AEFICOVIDVAX</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Kaji selidik ini dikendalikan oleh sekretariat di bawah Persatuan Pengguna Islam Malaysia.</label>
                                            <strong>Email: <a href="mailto:MY-AEFI@tutanota.com" target="_blank">MY-AEFI@tutanota.com</a></strong>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <p>Kaji selidik ini dengan niat murni. Telus. Bebas. Sukarela.</p>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 mb-2 text-center form_btn">
                                        <button class="btn btn-dark">Reviews</button>
                                        <button class="btn btn-dark">Save</button>
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer p-3">
                            <h6>Do not submit confidential information such as credit card details, Mobile and ATM PINs, account passwords, etc. <a href="#">Report Abuse</a> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('frontend/assets/js/select2.full.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            // search select
            $('.select2').select2();
            // input file image
            $('.dropify').dropify();
        })
    </script>
</body>

</html><?php /**PATH C:\xampp\htdocs\covidinfo\web\resources\views/welcome.blade.php ENDPATH**/ ?>