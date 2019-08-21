<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Galeri</title>
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
        <h3>Galeri</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#daftar" role="tab" id="daftar-tab" data-toggle="tab" aria-controls="daftar">Galeri</a></li>
            </ul>
              <div role="tabpanel" class="tab-pane fade in active" id="daftar" aria-labelledby="daftar-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Galeri</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                        <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('admins.galeri_post')}}">
                          @csrf
                          <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Galeri 1</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control1" id="galeri1" name="galeri1" accept=".jpg,.jpeg,.png,.pdf">
                              <p class="help-block">Maksimal Scan/Foto Formal 1 MB.</p>
                            </div>
                            <div class="col-sm-2">
                              @error('galeri1')
                                <p class="help-block"><strong>{{ $message }}</strong></p>
                              @enderror
                            </div>
                          </div>
                          <script type="text/javascript">
                            var uploadField = document.getElementById("galeri1");

                            uploadField.onchange = function() {
                              if(this.files[0].size > 1000000){
                                 alert("File lebih dari 1 MB!");
                                 this.value = "";
                              };
                            };
                          </script>
                          <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Galeri 2</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control1" id="galeri2" name="galeri2" accept=".jpg,.jpeg,.png,.pdf">
                              <p class="help-block">Maksimal Scan/Foto KTP 1 MB.</p>
                            </div>
                            <div class="col-sm-2">
                              @error('galeri2')
                                <p class="help-block"><strong>{{ $message }}</strong></p>
                              @enderror
                            </div>
                          </div>
                          <script type="text/javascript">
                            var uploadField = document.getElementById("galeri2");

                            uploadField.onchange = function() {
                              if(this.files[0].size > 1000000){
                                 alert("File lebih dari 1 MB!");
                                 this.value = "";
                              };
                            };
                          </script>
                          <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Galeri 3</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control1" id="galeri3" name="galeri3" accept=".jpg,.jpeg,.png,.pdf">
                              <p class="help-block">Maksimal Scan/Foto Ijazah 1 MB.</p>
                            </div>
                            <div class="col-sm-2">
                              @error('galeri3')
                                <p class="help-block"><strong>{{ $message }}</strong></p>
                              @enderror
                            </div>
                          </div>
                          <script type="text/javascript">
                            var uploadField = document.getElementById("galeri3");

                            uploadField.onchange = function() {
                              if(this.files[0].size > 1000000){
                                 alert("File lebih dari 1 MB!");
                                 this.value = "";
                              };
                            };
                          </script>
                          <div class="form-group">
                            <label for="focusedinput" class="col-sm-2 control-label">Galeri 4</label>
                            <div class="col-sm-8">
                              <input type="file" class="form-control1" id="galeri4" name="galeri4" accept=".jpg,.jpeg,.png,.pdf">
                              <p class="help-block">Maksimal Scan/Foto Transkrip 1 MB.</p>
                            </div>
                            <div class="col-sm-2">
                              @error('galeri4')
                                <p class="help-block"><strong>{{ $message }}</strong></p>
                              @enderror
                            </div>
                          </div>
                          <script type="text/javascript">
                            var uploadField = document.getElementById("galeri4");

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
