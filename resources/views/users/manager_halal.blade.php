<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Manager Halal</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
  <script type="application/x-javascript">
    addEventListener("load", function() {
      setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
      window.scrollTo(0, 1);
    }
  </script>
  <!-- Bootstrap Core CSS -->
  <link href="/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <!-- Custom CSS -->
  <link href="/css/style.css" rel='stylesheet' type='text/css' />
  <!-- Graph CSS -->
  <link href="/css/lines.css" rel='stylesheet' type='text/css' />
  <link href="/css/font-awesome.css" rel="stylesheet">
  <!-- jQuery -->
  <script src="/js/jquery.min.js"></script>
  <!-- webfonts -->
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <!---//webfonts--->
  <!-- Nav CSS -->
  <link href="/css/custom.css" rel="stylesheet">
  <!-- Metis Menu Plugin JavaScript -->
  <script src="/js/metisMenu.min.js"></script>
  <script src="/js/custom.js"></script>
  <!-- Graph JavaScript -->
  <script src="/js/d3.v3.js"></script>
  <script src="/js/rickshaw.js"></script>
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    @include('layouts.navigation')
    <div id="page-wrapper">
      <div class="grid_3 grid_5">
        <h3>Manager Halal</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <!-- <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Manager Halal</a></li> -->
              @if (Auth::user()->manager_halal == null)
                <li role="presentation" class="active"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Daftar</a></li>
              @else
                <li role="presentation" class="active"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Data Pendaftaran</a></li>
                <li role="presentation"><a href="#edit" role="tab" id="edit-tab" data-toggle="tab" aria-controls="edit">Edit Data Manager</a></li>
              @endif
            </ul>
            <div id="myTabContent" class="tab-content">
              <!-- <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p style="font-size: 16px; text-align: justify;">Manager Halal adalah orang yang bertanggung jawab terhadap Proses Produk Halal (PPH).</p> <br>
                <h4>Tugas Manager Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. mengawasi PPH di perusahaan; <br>
                    b. menentukan tindakan perbaikan dan pencegahan; <br>
                    c. mengoordinasikan PPH; dan <br>
                    d. mendampingi Auditor Halal LPH pada saat pemeriksaan. <br>
                </p> <br>
                <h4>Syarat Manager Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. beragama Islam; dan  <br>
                    b. memiliki wawasan luas dan memahami syariat tentang kehalalan. <br>
                    <b>* Manager Halal ditetapkan oleh pimpinan perusahaan dan dilaporkan kepada BPJPH. </b> <br>
                    <b>* Ketentuan lebih lanjut mengenai Manager Halal diatur dalam Peraturan Menteri. </b> <br>
                </p> <br>
              </div> -->
              <div role="tabpanel" class="tab-pane fade in active" id="daftar" aria-labelledby="daftar-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Calon Manager Halal</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->manager_halal == null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.manager_halal_store')}}">
                            @csrf
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama" name="nama" value="{{old('nama')}}" placeholder="Nama" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                              <div class="col-sm-8"><textarea name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{old('alamat_lengkap')}}</textarea></div>
                              <div class="col-sm-2">
                                @error('alamat_lengkap')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                              <div class="col-sm-8">
                                <select class="form-control1" name="provinsi_id" id="province_id" required>
                                  <?php foreach ($provinces as $province): ?>
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('province_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-8">
                                <select class="form-control1" name="kota_kabupaten_id" id="regency_id" required>
                                  <?php foreach ($regencies as $regency): ?>
                                    <option value="{{$regency->id}}">{{$regency->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('kota_kabupaten_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Tempat Lahir *</label>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Provinsi *</label>
                              <div class="col-sm-7">
                                <select class="form-control1" name="provinsi_tl_id" id="provinsi_tl_id" required>
                                  <?php foreach ($provinces as $province): ?>
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('provinsi_tl_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-7">
                                <select class="form-control1" name="kota_kabupaten_tl_id" id="kota_kabupaten_tl_id" required>
                                  <?php foreach ($regencies as $regency): ?>
                                    <option value="{{$regency->id}}">{{$regency->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('kota_kabupaten_tl_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Tanggal Lahir *</label>
                              <div class="col-sm-8">
                                <input type="date" class="form-control1" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" placeholder="Nama Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('tanggal_lahir')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon *</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{old('nomor_handphone')}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nomor_handphone')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email *</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control1" id="email" name="email" value="{{old('email')}}" placeholder="Email" required>
                              </div>
                              <div class="col-sm-2">
                                @error('email')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Sosial Media *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="sosmed" name="sosmed" value="{{old('sosmed')}}" placeholder="Contoh: FB: ..., IG: ...." required>
                              </div>
                              <div class="col-sm-2">
                                @error('sosmed')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Pendidikan Terakhir *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{old('pendidikan_terakhir')}}" placeholder="Contoh: SMA" required>
                              </div>
                              <div class="col-sm-2">
                                @error('pendidikan_terakhir')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Foto Formal</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="foto" name="foto" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Formal 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('foto')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("foto");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ktp" name="ktp" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto KTP 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ktp')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("ktp");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Ijazah</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ijazah" name="ijazah" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Ijazah 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ijazah')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("ijazah");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Transkrip</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="transkip" name="transkip" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Transkrip 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('transkip')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("transkip");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="panel-footer">
                              <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                  <button type="submit" class="btn-success btn">Submit</button>
                                  <button type="reset" class="btn-inverse btn">Reset</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <script>
                            $.ajaxSetup({
                             headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                             });
                             $('#province_id').on('click change', function(e){
                                 console.log(e);
                                 var province = e.target.value;
                                 //ajax
                                 $.get('/regencies/' + province, function(data){
                                     console.log(data);
                                         $('#regency_id').empty();
                                     $.each(data, function(index, subcatObj){
                                         $('#regency_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                     });
                                 });
                             });
                          </script>
                          <script>
                            $.ajaxSetup({
                             headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                             });
                             $('#provinsi_tl_id').on('click change', function(e){
                                 console.log(e);
                                 var province = e.target.value;
                                 //ajax
                                 $.get('/regencies/' + province, function(data){
                                     console.log(data);
                                         $('#kota_kabupaten_tl_id').empty();
                                     $.each(data, function(index, subcatObj){
                                         $('#kota_kabupaten_tl_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                     });
                                 });
                             });
                          </script>
                          <script type="text/javascript">
                        		$(window).load(function(e){
                        				$('#regency_id').empty();

                        				$(document).ready(function(){
                        			       $('#province_id').trigger('click');
                        				});
                        		});
                          </script>
                        @else
                          <form class="form-horizontal">
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="nama" name="nama" value="{{Auth::user()->manager_halal->nama}}" placeholder="Nama Lembaga" autofocus required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                              <div class="col-sm-8"><textarea disabled name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{ Auth::user()->manager_halal->alamat_lengkap }}</textarea></div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="provinsi_id" name="provinsi_id" value="{{ App\Province::where('id', Auth::user()->manager_halal->provinsi_id)->first()->name }}" placeholder="Provinsi" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="kota_kabupaten_id" name="kota_kabupaten_id" value="{{ App\Regency::where('id', Auth::user()->manager_halal->kota_kabupaten_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Tempat Lahir *</label>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Provinsi *</label>
                              <div class="col-sm-7">
                                <input disabled type="text" class="form-control1" id="provinsi_tl" name="provinsi_tl_id" value="{{ App\Province::where('id', Auth::user()->manager_halal->provinsi_tl_id)->first()->name }}" placeholder="Provinsi" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-7">
                                <input disabled type="text" class="form-control1" id="kota_kabupaten_tl" name="kota_kabupaten_tl_id" value="{{ App\Regency::where('id', Auth::user()->manager_halal->kota_kabupaten_tl_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
                              <div class="col-sm-8">
                                <input disabled type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{Auth::user()->manager_halal->nomor_handphone}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="email" name="email" value="{{Auth::user()->manager_halal->email}}" placeholder="Email" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Sosial Media *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="sosmed" name="sosmed" value="{{Auth::user()->manager_halal->sosmed}}" placeholder="Sosmed" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Pendidikan Terakhir *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{Auth::user()->manager_halal->pendidikan_terakhir}}" placeholder="Pendidikan Terakhir" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Foto</label>
                              <div class="col-sm-8">
                                <img class="img-responsive" src="/images/manager_halal/{{Auth::user()->id}}/{{Auth::user()->manager_halal->foto}}" alt="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP</label>
                              <div class="col-sm-8">
                                <img class="img-responsive" src="/images/manager_halal/{{Auth::user()->id}}/{{Auth::user()->manager_halal->ktp}}" alt="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Ijazah</label>
                              <div class="col-sm-8">
                                <img class="img-responsive" src="/images/manager_halal/{{Auth::user()->id}}/{{Auth::user()->manager_halal->ijazah}}" alt="">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Transkrip</label>
                              <div class="col-sm-8">
                                <img class="img-responsive" src="/images/manager_halal/{{Auth::user()->id}}/{{Auth::user()->manager_halal->transkip}}" alt="">
                              </div>
                            </div>
                          </form>
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="edit" aria-labelledby="edit-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Edit Data Manager Halal</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->manager_halal != null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.manager_halal_update', Auth::user()->manager_halal->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama" name="nama" value="{{old('nama', Auth::user()->manager_halal->nama)}}" placeholder="Nama" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                              <div class="col-sm-8"><textarea name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{old('alamat_lengkap', Auth::user()->manager_halal->alamat_lengkap)}}</textarea></div>
                              <div class="col-sm-2">
                                @error('alamat_lengkap')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                              <div class="col-sm-8">
                                <select class="form-control1" name="provinsi_id" id="province_id" required>
                                  <?php foreach ($provinces as $province): ?>
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('province_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-8">
                                <select class="form-control1" name="kota_kabupaten_id" id="regency_id" required>
                                  <?php foreach ($regencies as $regency): ?>
                                    <option value="{{$regency->id}}">{{$regency->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('kota_kabupaten_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Tempat Lahir *</label>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Provinsi *</label>
                              <div class="col-sm-7">
                                <select class="form-control1" name="provinsi_tl_id" id="provinsi_tl_id" required>
                                  <?php foreach ($provinces as $province): ?>
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('provinsi_tl_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-7">
                                <select class="form-control1" name="kota_kabupaten_tl_id" id="kota_kabupaten_tl_id" required>
                                  <?php foreach ($regencies as $regency): ?>
                                    <option value="{{$regency->id}}">{{$regency->name}}</option>
                                  <?php endforeach; ?>
                                </select>
                              </div>
                              <div class="col-sm-2">
                                @error('kota_kabupaten_tl_id')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Tanggal Lahir *</label>
                              <div class="col-sm-8">
                                <input type="date" class="form-control1" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir', Auth::user()->manager_halal->tanggal_lahir)}}" placeholder="Nama Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('tanggal_lahir')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon *</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{old('nomor_handphone', Auth::user()->manager_halal->nomor_handphone)}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nomor_handphone')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email *</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control1" id="email" name="email" value="{{old('email', Auth::user()->manager_halal->email)}}" placeholder="Email" required>
                              </div>
                              <div class="col-sm-2">
                                @error('email')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Sosial Media *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="sosmed" name="sosmed" value="{{old('sosmed', Auth::user()->manager_halal->sosmed)}}" placeholder="Contoh: FB: ..., IG: ...." required>
                              </div>
                              <div class="col-sm-2">
                                @error('sosmed')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Pendidikan Terakhir *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="pendidikan_terakhir" name="pendidikan_terakhir" value="{{old('pendidikan_terakhir', Auth::user()->manager_halal->pendidikan_terakhir)}}" placeholder="Contoh: SMA" required>
                              </div>
                              <div class="col-sm-2">
                                @error('pendidikan_terakhir')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Foto Formal</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="foto" name="foto" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Formal 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('foto')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("foto");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ktp" name="ktp" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto KTP 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ktp')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("ktp");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Ijazah</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ijazah" name="ijazah" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Ijazah 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ijazah')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("ijazah");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Transkrip</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="transkip" name="transkip" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto Transkrip 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('transkip')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("transkip");

                              uploadField.onchange = function() {
                                if(this.files[0].size > 1000000){
                                   alert("File lebih dari 1 MB!");
                                   this.value = "";
                                };
                              };
                            </script>
                            <div class="panel-footer">
                              <div class="row">
                                <div class="col-sm-8 col-sm-offset-2">
                                  <button type="submit" class="btn-success btn">Submit</button>
                                  <button type="reset" class="btn-inverse btn">Reset</button>
                                </div>
                              </div>
                            </div>
                          </form>
                          <script>
                            $.ajaxSetup({
                             headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                             });
                             $('#province_id').on('click change', function(e){
                                 console.log(e);
                                 var province = e.target.value;
                                 //ajax
                                 $.get('/regencies/' + province, function(data){
                                     console.log(data);
                                         $('#regency_id').empty();
                                     $.each(data, function(index, subcatObj){
                                         $('#regency_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                     });
                                 });
                             });
                          </script>
                          <script>
                            $.ajaxSetup({
                             headers: {
                               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                              }
                             });
                             $('#provinsi_tl_id').on('click change', function(e){
                                 console.log(e);
                                 var province = e.target.value;
                                 //ajax
                                 $.get('/regencies/' + province, function(data){
                                     console.log(data);
                                         $('#kota_kabupaten_tl_id').empty();
                                     $.each(data, function(index, subcatObj){
                                         $('#kota_kabupaten_tl_id').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                     });
                                 });
                             });
                          </script>
                          <script type="text/javascript">
                        		$(window).load(function(e){
                        				$('#regency_id').empty();

                        				$(document).ready(function(){
                        			       $('#province_id').trigger('click');
                                     $('#provinsi_tl_id').trigger('click');
                        				});
                        		});
                          </script>
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /#page-wrapper -->
  </div>
  <!-- /#wrapper -->
  <!-- Bootstrap Core JavaScript -->
  <script src="/js/bootstrap.min.js"></script>
</body>

</html>
