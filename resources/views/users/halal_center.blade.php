<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Halal Center</title>
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
        <h3>Halal Center</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Halal Center</a></li>
              @if (Auth::user()->halal_center == null)
                <li role="presentation"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Daftar</a></li>
              @else
                <li role="presentation"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Data Pendaftaran</a></li>
                <li role="presentation"><a href="#edit" role="tab" id="edit-tab" data-toggle="tab" aria-controls="edit">Edit Data Pendaftaran</a></li>
                <li role="presentation"><a href="#datahalalcenter" role="tab" id="datahalalcenter-tab" data-toggle="tab" aria-controls="datahalalcenter">Data Calon Penyelia Halal</a></li>
              @endif
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p style="font-size: 16px; text-align: justify;">Halal Center adalah Institusi tempat Penyelia, atau grup sejumlah orang dengan kemampuan untuk melakukan pendampingan, riset dan lainnya. Bertugas pendamping UMKM.</p> <br>
                <h4>Sumber Biaya</h4>
                <p style="font-size: 16px; text-align: justify;">
                    &nbsp &nbsp ▰	Perguruan Tinggi Dana Pengabdian <br>
                    &nbsp &nbsp ▰	CSR Perusahaan <br>
                    &nbsp &nbsp ▰	Usaha Mandiri Lain <br>
                </p> <br>
                <h4>Dibentuk Oleh</h4>
                <p style="font-size: 16px; text-align: justify;">
                    &nbsp &nbsp ▰	Lembaga Pemerintah <br>
                    &nbsp &nbsp ▰	Yayasan Islam <br>
                    &nbsp &nbsp ▰	Perguruan Tinggi Negeri (PTN) <br>
                    &nbsp &nbsp ▰	Perguruan Tinggi Swasta (PTS) dari yayasan Islam <br>
                </p> <br>
                <h4>Tugas</h4>
                <p style="font-size: 16px; text-align: justify;">
                    &nbsp &nbsp ▰	Mendampingi <br>
                    &nbsp &nbsp ▰	Membina <br>
                    &nbsp &nbsp ▰	Mengawasi Jaminan Produk Halal <br>
                    &nbsp &nbsp ▰	Mengentri Data Lewat Petugas (Penyelia Halal) ke BPJPH <br>
                    &nbsp &nbsp ▰	Mengelola Data (Bank Data) <br>
                </p> <br>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="datahalalcenter" aria-labelledby="datahalalcenter-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Data Penyelia Halal</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $au = 1;
                            ?>
                            @if (Auth::user()->halal_center != null)
                              @if (Auth::user()->halal_center->penyelia_halal != null)
                                @foreach (Auth::user()->halal_center->penyelia_halal as $penyelia_halal)
                                  <tr>
                                    <th scope="row">{{$au}}</th>
                                    <td>{{$penyelia_halal->nama}}</td>
                                    <td>{{$penyelia_halal->alamat_lengkap}}</td>
                                    <td>{{$penyelia_halal->nomor_handphone}}</td>
                                  </tr>
                                @endforeach
                              @endif
                            @endif
                          </tbody>
                        </table>
                      </div><!-- /.table-responsive -->
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftar" aria-labelledby="daftar-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Calon Halal Center</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->halal_center == null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.halal_center_store')}}">
                            @csrf
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Lembaga *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama_lembaga" name="nama_lembaga" value="{{old('nama_lembaga')}}" placeholder="Nama Lembaga" autofocus required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama_lembaga')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap Lembaga *</label>
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
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
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
                              <label for="focusedinput" class="col-sm-2 control-label">Email Lembaga *</label>
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
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Narahubung *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama_narahubung" name="nama_narahubung" value="{{old('nama_narahubung')}}" placeholder="Nama Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone Narahubung *</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control1" id="cp_narahubung" name="cp_narahubung" value="{{old('cp_narahubung')}}" placeholder="Nomor Handphone Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('cp_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP Narahubung</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ktp_narahubung" name="ktp_narahubung" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto KTP 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ktp_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                              <script type="text/javascript">
                                var uploadField = document.getElementById("ktp_narahubung");

                                uploadField.onchange = function() {
                                  if(this.files[0].size > 1000000){
                                     alert("File lebih dari 1 MB!");
                                     this.value = "";
                                  };
                                };
                              </script>
                            </div>
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
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Lembaga *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="nama_lembaga" name="nama_lembaga" value="{{Auth::user()->halal_center->nama_lembaga}}" placeholder="Nama Lembaga" autofocus required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap Lembaga *</label>
                              <div class="col-sm-8"><textarea disabled name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{ Auth::user()->halal_center->alamat_lengkap }}</textarea></div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="provinsi_id" name="provinsi_id" value="{{ App\Province::where('id', Auth::user()->halal_center->provinsi_id)->first()->name }}" placeholder="Provinsi" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="kota_kabupaten_id" name="kota_kabupaten_id" value="{{ App\Regency::where('id', Auth::user()->halal_center->kota_kabupaten_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
                              <div class="col-sm-8">
                                <input disabled type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{Auth::user()->halal_center->nomor_handphone}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email Lembaga *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="email" name="email" value="{{Auth::user()->halal_center->email}}" placeholder="Email" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Narahubung *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="nama_narahubung" name="nama_narahubung" value="{{Auth::user()->halal_center->nama_narahubung}}" placeholder="Nama Narahubung" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone Narahubung *</label>
                              <div class="col-sm-8">
                                <input disabled type="number" class="form-control1" id="cp_narahubung" name="cp_narahubung" value="{{Auth::user()->halal_center->cp_narahubung}}" placeholder="Nomor Handphone Narahubung" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP Narahubung *</label>
                              <div class="col-sm-8">
                                <img class="img-responsive" src="/images/halal_center/{{Auth::user()->id}}/{{Auth::user()->halal_center->ktp_narahubung}}" alt="">
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
                    <h3>Edit Data Halal Center</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->halal_center != null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.halal_center_update', Auth::user()->halal_center->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Lembaga *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama_lembaga" name="nama_lembaga" value="{{old('nama_lembaga', Auth::user()->halal_center->nama_lembaga)}}" placeholder="Nama Lembaga" autofocus required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama_lembaga')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap Lembaga *</label>
                              <div class="col-sm-8"><textarea name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{old('alamat_lengkap', Auth::user()->halal_center->alamat_lengkap)}}</textarea></div>
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
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{old('nomor_handphone', Auth::user()->halal_center->nomor_handphone)}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nomor_handphone')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email Lembaga *</label>
                              <div class="col-sm-8">
                                <input type="email" class="form-control1" id="email" name="email" value="{{old('email', Auth::user()->halal_center->email)}}" placeholder="Email" required>
                              </div>
                              <div class="col-sm-2">
                                @error('email')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama Narahubung *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama_narahubung" name="nama_narahubung" value="{{old('nama_narahubung', Auth::user()->halal_center->nama_narahubung)}}" placeholder="Nama Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone Narahubung *</label>
                              <div class="col-sm-8">
                                <input type="number" class="form-control1" id="cp_narahubung" name="cp_narahubung" value="{{old('cp_narahubung', Auth::user()->halal_center->cp_narahubung)}}" placeholder="Nomor Handphone Narahubung" required>
                              </div>
                              <div class="col-sm-2">
                                @error('cp_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">KTP Narahubung</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="ktp_narahubung" name="ktp_narahubung" accept=".jpg,.jpeg,.png,.pdf">
                                <p class="help-block">Maksimal Scan/Foto KTP 1 MB.</p>
                              </div>
                              <div class="col-sm-2">
                                @error('ktp_narahubung')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <script type="text/javascript">
                              var uploadField = document.getElementById("ktp_narahubung");

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
                          <script type="text/javascript">
                        		$(window).load(function(e){
                        				$('#regency_id').empty();

                        				$(document).ready(function(){
                        			       $('#province_id').trigger('click');
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
