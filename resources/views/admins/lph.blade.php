<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | LPH (Lembaga Pemeriksa Halal)</title>
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
        <h3>LPH (Lembaga Pemeriksa Halal)</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">LPH</a></li>
              <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Syarat Mendirikan LPH</a></li>
              <li role="presentation"><a href="#datalph" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="datalph">Data Calon LPH</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p style="font-size: 16px; text-align: justify;">LPH adalah lembaga yang melakukan kegiatan pemeriksaan dan/atau pengujian terhadap kehalalan Produk. LPH dapat didirikan oleh Pemerintah dan/atau masyarakat, dimana LPH mempunyai kesempatan yang sama dalam membantu BPJPH melakukan pemeriksaan dan/atau pengujian kehalalan Produk.</p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                <p style="font-size: 16px; text-align: justify;">(1) Untuk mendirikan LPH sebagaimana dimaksud , harus dipenuhi persyaratan: <br>
                    &nbsp &nbsp a. memiliki kantor sendiri dan perlengkapannya; <br>
                    &nbsp &nbsp b. memiliki akreditasi dari BPJPH; <br>
                    &nbsp &nbsp c. memiliki Auditor Halal paling sedikit 3 (tiga) orang; dan <br>
                    &nbsp &nbsp d. memiliki laboratorium atau kesepakatan kerja sama dengan lembaga lain yang memiliki laboratorium. <br>
                </p>
                <p style="font-size: 16px; text-align: justify;">(2) Dalam hal LPH sebagaimana dimaksud pada ayat (1) didirikan oleh masyarakat, LPH harus diajukan oleh lembaga keagamaan Islam berbadan hukum. <br>
                    &nbsp &nbsp ▰	Pengujian dapat dilakukan oleh Laboratorium dengan Standar ISO 17025 <br>
                    &nbsp &nbsp ▰	LPH adalah Kantor Resmi Auditor Halal <br>
                </p>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="datalph" aria-labelledby="datalph-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Data LPH</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Lembaga</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($lph as $lp)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$lp->nama_lembaga}}</td>
                                <td>{{$lp->alamat_lengkap}}</td>
                                <td>{{$lp->nomor_handphone}}</td>
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
