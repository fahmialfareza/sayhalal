Auth::user()->pelaku_usaha->perusahaan->produk->count() <= 0<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Pelaku Usaha</title>
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
        <h3>Pelaku Usaha</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <!-- <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Manager Halal</a></li> -->
              @if (Auth::user()->pelaku_usaha == null)
                <li role="presentation" class="active"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Daftar</a></li>
              @else
                <li role="presentation" class="active"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Data Pendaftaran</a></li>
                <li role="presentation"><a href="#editpu" role="tab" id="editpu-tab" data-toggle="tab" aria-controls="editpu">Edit Data Pribadi</a></li>
                @if (Auth::user()->pelaku_usaha->perusahaan == null)
                  <li role="presentation"><a href="#daftarperusahaan" role="tab" id="daftarperusahaan-tab" data-toggle="tab" aria-controls="daftarperusahaan">Daftar Perusahaan</a></li>
                @else
                  <li role="presentation"><a href="#daftarperusahaan" role="tab" id="daftarperusahaan-tab" data-toggle="tab" aria-controls="daftarperusahaan">Data Perusahaan</a></li>
                  <li role="presentation"><a href="#editperusahaan" role="tab" id="editperusahaan-tab" data-toggle="tab" aria-controls="editperusahaan">Edit Data Perusahaan</a></li>
                  @if (Auth::user()->pelaku_usaha->perusahaan->produk->count() <= 0 && Auth::user()->pelaku_usaha->perusahaan->restoran->count() <= 0)
                    <li role="presentation"><a href="#daftarproduk" role="tab" id="daftarproduk-tab" data-toggle="tab" aria-controls="daftarproduk">Daftar Produk</a></li>
                  @elseif (Auth::user()->pelaku_usaha->perusahaan->produk->count() >= 0 && Auth::user()->pelaku_usaha->perusahaan->restoran->count() <= 0)
                    <li role="presentation"><a href="#daftarproduk" role="tab" id="daftarproduk-tab" data-toggle="tab" aria-controls="daftarproduk">Data Produk</a></li>
                    <li role="presentation"><a href="#tambahproduk" role="tab" id="tambahproduk-tab" data-toggle="tab" aria-controls="tambahproduk">Tambah Produk</a></li>
                  @endif
                  @if (Auth::user()->pelaku_usaha->perusahaan->restoran->count() <= 0 && Auth::user()->pelaku_usaha->perusahaan->produk->count() <= 0)
                    <li role="presentation"><a href="#daftarrestoran" role="tab" id="daftarrestoran-tab" data-toggle="tab" aria-controls="daftarrestoran">Daftar Restoran</a></li>
                  @elseif (Auth::user()->pelaku_usaha->perusahaan->restoran->count() >= 0 && Auth::user()->pelaku_usaha->perusahaan->produk->count() <= 0)
                    <li role="presentation"><a href="#daftarrestoran" role="tab" id="daftarrestoran-tab" data-toggle="tab" aria-controls="daftarrestoran">Data Restoran</a></li>
                    <li role="presentation"><a href="#tambahrestoran" role="tab" id="tambahrestoran-tab" data-toggle="tab" aria-controls="tambahrestoran">Tambah Restoran</a></li>
                  @endif
                  <li role="presentation"><a href="#daftarpenyelia" role="tab" id="daftarpenyelia-tab" data-toggle="tab" aria-controls="daftarpenyelia">Cari Penyelia Halal</a></li>
                  <li role="presentation"><a href="#daftarmanager" role="tab" id="daftarmanager-tab" data-toggle="tab" aria-controls="daftarmanager">Cari Manager Halal</a></li>
                  <li role="presentation"><a href="#daftarjuleha" role="tab" id="daftarjuleha-tab" data-toggle="tab" aria-controls="daftarjuleha">Cari Sembelih Halal (Juleha)</a></li>
                @endif
              @endif
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="daftar" aria-labelledby="daftar-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Pelaku Usaha</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha == null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.pelaku_usaha_store')}}">
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
                                <input disabled type="text" class="form-control1" id="nama" name="nama" value="{{Auth::user()->pelaku_usaha->nama}}" placeholder="Nama Lembaga" autofocus required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                              <div class="col-sm-8"><textarea disabled name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{ Auth::user()->pelaku_usaha->alamat_lengkap }}</textarea></div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="provinsi_id" name="provinsi_id" value="{{ App\Province::where('id', Auth::user()->pelaku_usaha->provinsi_id)->first()->name }}" placeholder="Provinsi" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-8">
                                <input disabled type="text" class="form-control1" id="kota_kabupaten_id" name="kota_kabupaten_id" value="{{ App\Regency::where('id', Auth::user()->pelaku_usaha->kota_kabupaten_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Tempat Lahir *</label>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Provinsi *</label>
                              <div class="col-sm-7">
                                <input disabled type="text" class="form-control1" id="provinsi_tl" name="provinsi_tl_id" value="{{ App\Province::where('id', Auth::user()->pelaku_usaha->provinsi_tl_id)->first()->name }}" placeholder="Provinsi" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-3 control-label">Kota/Kabupaten *</label>
                              <div class="col-sm-7">
                                <input disabled type="text" class="form-control1" id="kota_kabupaten_tl" name="kota_kabupaten_tl_id" value="{{ App\Regency::where('id', Auth::user()->pelaku_usaha->kota_kabupaten_tl_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
                              <div class="col-sm-8">
                                <input disabled type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{Auth::user()->pelaku_usaha->nomor_handphone}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Email *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="email" name="email" value="{{Auth::user()->pelaku_usaha->email}}" placeholder="Email" required>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Sosial Media *</label>
                              <div class="col-sm-8">
                                <input disabled type="email" class="form-control1" id="sosmed" name="sosmed" value="{{Auth::user()->pelaku_usaha->sosmed}}" placeholder="Sosmed" required>
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
              <div role="tabpanel" class="tab-pane fade" id="editpu" aria-labelledby="editpu-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Edit Data Pelaku Usaha</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.pelaku_usaha_update', Auth::user()->pelaku_usaha->id)}}">
                            @csrf
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="nama" name="nama" value="{{old('nama', Auth::user()->pelaku_usaha->nama)}}" placeholder="Nama" required>
                              </div>
                              <div class="col-sm-2">
                                @error('nama')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                              <div class="col-sm-8"><textarea name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{old('alamat_lengkap', Auth::user()->pelaku_usaha->alamat_lengkap)}}</textarea></div>
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
                                <input type="date" class="form-control1" id="tanggal_lahir" name="tanggal_lahir" value="{{old('tanggal_lahir', Auth::user()->pelaku_usaha->tanggal_lahir)}}" placeholder="Nama Narahubung" required>
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
                                <input type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{old('nomor_handphone', Auth::user()->pelaku_usaha->nomor_handphone)}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
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
                                <input type="email" class="form-control1" id="email" name="email" value="{{old('email', Auth::user()->pelaku_usaha->email)}}" placeholder="Email" required>
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
                                <input type="text" class="form-control1" id="sosmed" name="sosmed" value="{{old('sosmed', Auth::user()->pelaku_usaha->sosmed)}}" placeholder="Contoh: FB: ..., IG: ...." required>
                              </div>
                              <div class="col-sm-2">
                                @error('sosmed')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
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
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarperusahaan" aria-labelledby="daftarperusahaan-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Perusahaan</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan == null)
                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.perusahaan_store')}}">
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
                                  <input disabled type="text" class="form-control1" id="nama" name="nama" value="{{Auth::user()->pelaku_usaha->perusahaan->nama}}" placeholder="Nama Lembaga" autofocus required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                                <div class="col-sm-8"><textarea disabled name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{ Auth::user()->pelaku_usaha->perusahaan->alamat_lengkap }}</textarea></div>
                              </div>
                              <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                                <div class="col-sm-8">
                                  <input disabled type="text" class="form-control1" id="provinsi" name="provinsi_id" value="{{ App\Province::where('id', Auth::user()->pelaku_usaha->perusahaan->provinsi_id)->first()->name }}" placeholder="Provinsi" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Kota/Kabupaten *</label>
                                <div class="col-sm-8">
                                  <input disabled type="text" class="form-control1" id="kota_kabupaten" name="kota_kabupaten_id" value="{{ App\Regency::where('id', Auth::user()->pelaku_usaha->perusahaan->kota_kabupaten_id)->first()->name }}" placeholder="Kota/Kabupaten" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon Lembaga *</label>
                                <div class="col-sm-8">
                                  <input disabled type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{Auth::user()->pelaku_usaha->perusahaan->nomor_handphone}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Email *</label>
                                <div class="col-sm-8">
                                  <input disabled type="email" class="form-control1" id="email" name="email" value="{{Auth::user()->pelaku_usaha->perusahaan->email}}" placeholder="Email" required>
                                </div>
                              </div>
                            </form>
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="editperusahaan" aria-labelledby="editperusahaan-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Edit Data Perusahaan</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan != null)
                            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.perusahaan_update', Auth::user()->pelaku_usaha->perusahaan->id)}}">
                              @csrf
                              <input type="hidden" name="_method" value="PUT">
                              <div class="form-group">
                                <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control1" id="nama" name="nama" value="{{old('nama', Auth::user()->pelaku_usaha->perusahaan->nama)}}" placeholder="Nama" required>
                                </div>
                                <div class="col-sm-2">
                                  @error('nama')
                                    <p class="help-block"><strong>{{ $message }}</strong></p>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Alamat Lengkap *</label>
                                <div class="col-sm-8"><textarea name="alamat_lengkap" id="alamat_lengkap" cols="50" rows="4" placeholder="Alamat Lengkap" class="form-control1" required>{{old('alamat_lengkap', Auth::user()->pelaku_usaha->perusahaan->alamat_lengkap)}}</textarea></div>
                                <div class="col-sm-2">
                                  @error('alamat_lengkap')
                                    <p class="help-block"><strong>{{ $message }}</strong></p>
                                  @enderror
                                </div>
                              </div>
                              <div class="form-group">
                                <label for="txtarea1" class="col-sm-2 control-label">Provinsi *</label>
                                <div class="col-sm-8">
                                  <select class="form-control1" name="provinsi_id" id="province_id1" required>
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
                                  <select class="form-control1" name="kota_kabupaten_id" id="regency_id1" required>
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
                                <label for="focusedinput" class="col-sm-2 control-label">Nomor Handphone/Telepon *</label>
                                <div class="col-sm-8">
                                  <input type="number" class="form-control1" id="nomor_handphone" name="nomor_handphone" value="{{old('nomor_handphone', Auth::user()->pelaku_usaha->perusahaan->nomor_handphone)}}" placeholder="Nomor Handphone/Telepon Lembaga" required>
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
                                  <input type="email" class="form-control1" id="email" name="email" value="{{old('email', Auth::user()->pelaku_usaha->perusahaan->email)}}" placeholder="Email" required>
                                </div>
                                <div class="col-sm-2">
                                  @error('email')
                                    <p class="help-block"><strong>{{ $message }}</strong></p>
                                  @enderror
                                </div>
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
                               $('#province_id1').on('click change', function(e){
                                   console.log(e);
                                   var province = e.target.value;
                                   //ajax
                                   $.get('/regencies/' + province, function(data){
                                       console.log(data);
                                           $('#regency_id1').empty();
                                       $.each(data, function(index, subcatObj){
                                           $('#regency_id1').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
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
                          				$('#regency_id1').empty();

                          				$(document).ready(function(){
                          			       $('#province_id1').trigger('click');
                          				});
                          		});
                            </script>
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarproduk" aria-labelledby="daftarproduk-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Produk</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan != null)
                            @if (Auth::user()->pelaku_usaha->perusahaan->produk->count() <= 0)
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.produk_store')}}">
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
                                  <label for="txtarea1" class="col-sm-2 control-label">Deskripsi *</label>
                                  <div class="col-sm-8"><textarea name="deskripsi" id="deskripsi" cols="50" rows="4" placeholder="Deskripsi" class="form-control1" required>{{old('deskripsi')}}</textarea></div>
                                  <div class="col-sm-2">
                                    @error('deskripsi')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Legalitas</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="legalitas" name="legalitas" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Legalitas 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('legalitas')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                  <script type="text/javascript">
                                    var uploadField = document.getElementById("legalitas");

                                    uploadField.onchange = function() {
                                      if(this.files[0].size > 1000000){
                                         alert("File lebih dari 1 MB!");
                                         this.value = "";
                                      };
                                    };
                                  </script>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Foto Produk</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="foto_produk" name="foto_produk" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Produk 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('legalitas')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                  <script type="text/javascript">
                                    var uploadField = document.getElementById("foto_produk");

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
                            @else
                              <div class="bs-example4" data-example-id="simple-responsive-table">
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                      <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        $l = 1;
                                      ?>
                                      @foreach (Auth::user()->pelaku_usaha->perusahaan->produk as $produk)
                                        <tr>
                                          <th scope="row">{{$l}}</th>
                                          <td>{{$produk->nama}}</td>
                                          <td>{{$produk->deskripsi}}</td>
                                          <td>
                                            <form method="POST" action="{{route('users.produk_hapus', $produk->id)}}">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete" />
                                                <button type="submit" class="btn-success btn">Hapus</button>
                                            </form>
                                          </td>
                                        </tr>
                                        <?php $l++ ?>
                                      @endforeach
                                    </tbody>
                                  </table>
                                </div><!-- /.table-responsive -->
                              </div>
                            @endif
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tambahproduk" aria-labelledby="tambahproduk-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Tambah Produk</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan != null)
                            @if (Auth::user()->pelaku_usaha->perusahaan->produk->count() >= 0)
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.produk_store')}}">
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
                                  <label for="txtarea1" class="col-sm-2 control-label">Deskripsi *</label>
                                  <div class="col-sm-8"><textarea name="deskripsi" id="deskripsi" cols="50" rows="4" placeholder="Deskripsi" class="form-control1" required>{{old('deskripsi')}}</textarea></div>
                                  <div class="col-sm-2">
                                    @error('deskripsi')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Legalitas</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="legalitas" name="legalitas" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Legalitas 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('legalitas')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                  <script type="text/javascript">
                                    var uploadField = document.getElementById("legalitas");

                                    uploadField.onchange = function() {
                                      if(this.files[0].size > 1000000){
                                         alert("File lebih dari 1 MB!");
                                         this.value = "";
                                      };
                                    };
                                  </script>
                                </div>
                                <div class="form-group">
                                  <label for="focusedinput" class="col-sm-2 control-label">Foto Produk</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="foto_produk" name="foto_produk" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Produk 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('legalitas')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
                                  </div>
                                  <script type="text/javascript">
                                    var uploadField = document.getElementById("foto_produk");

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
                            @endif
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarrestoran" aria-labelledby="daftarrestoran-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Form Pendaftaran Restoran</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan != null)
                            @if (Auth::user()->pelaku_usaha->perusahaan->restoran->count() <= 0)
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.restoran_store')}}">
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
                                    <select class="form-control1" name="provinsi_id" id="province_id2" required>
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
                                    <select class="form-control1" name="kota_kabupaten_id" id="regency_id2" required>
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
                                  <label for="focusedinput" class="col-sm-2 control-label">Foto Restoran</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="foto" name="foto" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Produk 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('foto')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
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
                                 $('#province_id2').on('click change', function(e){
                                     console.log(e);
                                     var province = e.target.value;
                                     //ajax
                                     $.get('/regencies/' + province, function(data){
                                         console.log(data);
                                             $('#regency_id2').empty();
                                         $.each(data, function(index, subcatObj){
                                             $('#regency_id2').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                         });
                                     });
                                 });
                              </script>
                              <script type="text/javascript">
                            		$(window).load(function(e){
                            				$('#regency_id2').empty();

                            				$(document).ready(function(){
                            			       $('#province_id2').trigger('click');
                            				});
                            		});
                              </script>
                            @else
                            <div class="bs-example4" data-example-id="simple-responsive-table">
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>
                                      <th>No.</th>
                                      <th>Nama</th>
                                      <th>Deskripsi</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $ab = 1;
                                    ?>
                                    @foreach (Auth::user()->pelaku_usaha->perusahaan->restoran as $restoran)
                                      <tr>
                                        <th scope="row">{{$ab}}</th>
                                        <td>{{$restoran->nama}}</td>
                                        <td>{{$restoran->alamat_lengkap}}</td>
                                        <td>
                                          <form method="POST" action="{{route('users.restoran_hapus', $restoran->id)}}">
                                              @csrf
                                              <input type="hidden" name="_method" value="delete" />
                                              <button type="submit" class="btn-success btn">Hapus</button>
                                          </form>
                                        </td>
                                      </tr>
                                      <?php $ab++ ?>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div><!-- /.table-responsive -->
                            </div>
                            @endif
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="tambahrestoran" aria-labelledby="tambahrestoran-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Tambah Restoran</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        @if (Auth::user()->pelaku_usaha != null)
                          @if (Auth::user()->pelaku_usaha->perusahaan != null)
                            @if (Auth::user()->pelaku_usaha->perusahaan->restoran->count() >= 0)
                              <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('users.restoran_store')}}">
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
                                    <select class="form-control1" name="provinsi_id" id="province_id2" required>
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
                                    <select class="form-control1" name="kota_kabupaten_id" id="regency_id2" required>
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
                                  <label for="focusedinput" class="col-sm-2 control-label">Foto Restoran</label>
                                  <div class="col-sm-8">
                                    <input type="file" class="form-control1" id="foto" name="foto" accept=".jpg,.jpeg,.png,.pdf">
                                    <p class="help-block">Maksimal Scan/Foto Produk 1 MB.</p>
                                  </div>
                                  <div class="col-sm-2">
                                    @error('foto')
                                      <p class="help-block"><strong>{{ $message }}</strong></p>
                                    @enderror
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
                                 $('#province_id2').on('click change', function(e){
                                     console.log(e);
                                     var province = e.target.value;
                                     //ajax
                                     $.get('/regencies/' + province, function(data){
                                         console.log(data);
                                             $('#regency_id2').empty();
                                         $.each(data, function(index, subcatObj){
                                             $('#regency_id2').append('<option value ="'+ subcatObj.id +'">'+subcatObj.name+'</option>');
                                         });
                                     });
                                 });
                              </script>
                              <script type="text/javascript">
                            		$(window).load(function(e){
                            				$('#regency_id2').empty();

                            				$(document).ready(function(){
                            			       $('#province_id2').trigger('click');
                            				});
                            		});
                              </script>
                            @endif
                          @endif
                        @endif
                      </div>
                    </div>
                  </div>
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarpenyelia" aria-labelledby="daftarpenyelia-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Cari Penyelia Halal</h3>
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
                            @if (Auth::user()->pelaku_usaha != null)
                              @if (Auth::user()->pelaku_usaha->perusahaan != null)
                                @foreach (App\PenyeliaHalal::where('kota_kabupaten_id', Auth::user()->pelaku_usaha->perusahaan->kota_kabupaten_id)->get() as $penyelia_halal)
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
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarmanager" aria-labelledby="daftarmanager-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Cari Manager Halal</h3>
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
                            @if (Auth::user()->pelaku_usaha != null)
                              @if (Auth::user()->pelaku_usaha->perusahaan != null)
                                @foreach (App\ManagerHalal::where('kota_kabupaten_id', Auth::user()->pelaku_usaha->perusahaan->kota_kabupaten_id)->get() as $penyelia_halal)
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
                  @include('layouts.footer')
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="daftarjuleha" aria-labelledby="daftarjuleha-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Cari Juru Sembelih Halal (Juleha)</h3>
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
                            @if (Auth::user()->pelaku_usaha != null)
                              @if (Auth::user()->pelaku_usaha->perusahaan != null)
                                @foreach (App\Juleha::where('kota_kabupaten_id', Auth::user()->pelaku_usaha->perusahaan->kota_kabupaten_id)->get() as $penyelia_halal)
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
