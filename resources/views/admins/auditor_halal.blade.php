<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Auditor Halal</title>
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
    @include('layouts.navigation_admin')
    <div id="page-wrapper">
      <div class="grid_3 grid_5">
        <h3>Auditor Halal</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Auditor Halal</a></li>
              <li role="presentation"><a href="#datalph" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="datalph">Data Calon Auditor Halal</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p style="font-size: 16px; text-align: justify;">Auditor Halal adalah orang yang memiliki kemampuan melakukan pemeriksaan kehalalan Produk. Auditor halal diangkat dan diberhentikan oleh LPH.</p> <br>
                <h4>Syarat Auditor Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. warga negara Indonesia; <br>
                    b. beragama Islam; <br>
                    c. berpendidikan paling rendah sarjana strata 1 (satu) di bidang pangan, kimia,biokimia, teknik industri, biologi, atau farmasi; <br>
                    d. memahami dan memiliki wawasan luas mengenai kehalalan produk menurut syariat Islam; <br>
                    e. mendahulukan kepentingan umat di atas kepentingan pribadi dan/atau golongan; <br>
                    f. memperoleh sertifikat dari MUI. <br>
                </p> <br>
                <h4>Tugas Auditor Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. memeriksa dan mengkaji Bahan yang digunakan; <br>
                    b. memeriksa dan mengkaji proses pengolahan Produk; <br>
                    c. memeriksa dan mengkaji sistem penyembelihan; <br>
                    d. meneliti lokasi Produk; <br>
                    e. meneliti peralatan, ruang produksi, dan penyimpanan; <br>
                    f. memeriksa pendistribusian dan penyajian Produk; <br>
                    g. memeriksa sistem jaminan halal Pelaku Usaha; <br>
                    h. melaporkan hasil pemeriksaan dan/atau pengujian kepada LPH. <br>
                </p> <br>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="datalph" aria-labelledby="datalph-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Belum Punya LPH</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Lembaga</th>
                              <th>LPH</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($auditor_halal->where('lph_id', 0) as $auditor1)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$auditor1->nama}}</td>
                                <td>
                                    Belum Punya LPH
                                </td>
                                <td>{{$auditor1->alamat_lengkap}}</td>
                                <td>{{$auditor1->nomor_handphone}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div><!-- /.table-responsive -->
                    </div>
                  </div>
                </div>
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Mempunyai LPH</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Lembaga</th>
                              <th>LPH</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($auditor_halal->where('lph_id', '!=', 0) as $auditor2)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$auditor2->nama}}</td>
                                <td>
                                    {{$auditor2->lph->nama_lembaga}}
                                </td>
                                <td>{{$auditor2->alamat_lengkap}}</td>
                                <td>{{$auditor2->nomor_handphone}}</td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div><!-- /.table-responsive -->
                    </div>
                  </div>
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
