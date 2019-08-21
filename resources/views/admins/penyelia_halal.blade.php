<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Penyelia Halal</title>
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
        <h3>Penyelia Halal</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Penyelia Halal</a></li>
              <li role="presentation"><a href="#datalph" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="datalph">Data Calon Penyelia Halal</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <p style="font-size: 16px; text-align: justify;">Penyelia Halal adalah orang yang bertanggung jawab terhadap Proses Produk Halal (PPH).</p> <br>
                <h4>Tugas Penyelia Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. mengawasi PPH di perusahaan; <br>
                    b. menentukan tindakan perbaikan dan pencegahan; <br>
                    c. mengoordinasikan PPH; dan <br>
                    d. mendampingi Auditor Halal LPH pada saat pemeriksaan. <br>
                </p> <br>
                <h4>Syarat Penyelia Halal</h4>
                <p style="font-size: 16px; text-align: justify;">
                    a. beragama Islam; dan  <br>
                    b. memiliki wawasan luas dan memahami syariat tentang kehalalan. <br>
                    <b>* Penyelia Halal ditetapkan oleh pimpinan perusahaan dan dilaporkan kepada BPJPH. </b> <br>
                    <b>* Ketentuan lebih lanjut mengenai Penyelia Halal diatur dalam Peraturan Menteri. </b> <br>
                </p> <br>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="datalph" aria-labelledby="datalph-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Belum Punya Halal Center</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Lembaga</th>
                              <th>Halal Center</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($penyelia_halal->where('halal_center_id', 0) as $penyelia1)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$penyelia1->nama}}</td>
                                <td>Belum Punya Halal Center</td>
                                <td>{{$penyelia1->alamat_lengkap}}</td>
                                <td>{{$penyelia1->nomor_handphone}}</td>
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
                    <h3>Mempunyai Halal Center</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Nama Lembaga</th>
                              <th>Halal Center</th>
                              <th>Alamat Lengkap</th>
                              <th>Nomor Handphone</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($penyelia_halal->where('halal_center_id', '!=', 0) as $penyelia2)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$penyelia2->nama}}</td>
                                <td>{{$penyelia2->halal_center->nama_lembaga}}</td>
                                <td>{{$penyelia2->alamat_lengkap}}</td>
                                <td>{{$penyelia2->nomor_handphone}}</td>
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
