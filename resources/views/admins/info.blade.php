<!DOCTYPE HTML>
<html>

<head>
  <title>Say Halal | Info</title>
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
  <script src="https://lepassuntuk.com/textboxio-client/textboxio/textboxio.js"></script>
</head>

<body>
  <div id="wrapper">
    <!-- Navigation -->
    @include('layouts.navigation_admin')
    <div id="page-wrapper">
      <div class="grid_3 grid_5">
        <h3>Info</h3>
        <div class="but_list">
          <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Info</a></li>
              <li role="presentation"><a href="#info" role="tab" id="info-tab" data-toggle="tab" aria-controls="info">Tambah Info</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                <div class="col-md-12 graphs">
                  <div class="xs">
                    <h3>Info</h3>
                    <div class="bs-example4" data-example-id="simple-responsive-table">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Judul</th>
                              <th>Lampiran</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $l = 1;
                            ?>
                            @foreach ($info as $inf)
                              <tr>
                                <th scope="row">{{$l}}</th>
                                <td>{{$inf->judul}}</td>
                                <td>{{$inf->lampiran}}</td>
                                <td>
                                  <form method="POST" action="{{route('admins.info_hapus', $inf->id)}}">
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
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane fade" id="info" aria-labelledby="info-tab">
                <div class="graphs">
                  <div class="xs">
                    <h3>Tambah Info</h3>
                    <div class="tab-content">
                      <div class="tab-pane active" id="horizontal-form">
                          <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="{{route('admins.info_post')}}">
                            @csrf
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Nama *</label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control1" id="judul" name="judul" value="{{old('judul')}}" placeholder="Judul" required>
                              </div>
                              <div class="col-sm-2">
                                @error('judul')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="txtarea1" class="col-sm-2 control-label">Info *</label>
                              <div class="col-sm-8">
                                <textarea class="textarea" id="mytextarea1" placeholder="Info...." name="info"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{old('info')}}</textarea>
                              </div>
                              <div class="col-sm-2">
                                @error('info')
                                  <p class="help-block"><strong>{{ $message }}</strong></p>
                                @enderror
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="focusedinput" class="col-sm-2 control-label">Lampiran (pdf)</label>
                              <div class="col-sm-8">
                                <input type="file" class="form-control1" id="lampiran" name="lampiran" accept=".pdf">
                              </div>
                              <div class="col-sm-2">
                                @error('lampiran')
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
  <script type="text/javascript">
    var editor = textboxio.replace('#mytextarea1');
  </script>
  <script type="text/javascript">
    var editor = textboxio.replace('#mytextarea2');
  </script>
  <script type="text/javascript">
    var editor = textboxio.replace('#mytextarea3');
  </script>
  <script type="text/javascript">
    var editor = textboxio.replace('#mytextarea4');
  </script>
</body>

</html>
