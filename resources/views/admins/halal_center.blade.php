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
    @include('layouts.navigation_admin')
    <div id="page-wrapper">
      <div class="grid_3 grid_5">
        <h3>Halal Center</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Halal Center</a></li>
              <li role="presentation"><a href="#datalph" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="datalph">Data Calon Halal Center</a></li>
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
              <div role="tabpanel" class="tab-pane fade" id="datalph" aria-labelledby="datalph-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Data Halal Center</h3>
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
                            @foreach ($halal_center as $halal)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$halal->nama_lembaga}}</td>
                                <td>{{$halal->alamat_lengkap}}</td>
                                <td>{{$halal->nomor_handphone}}</td>
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
