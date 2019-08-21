<!DOCTYPE HTML>
<html>

<head>
    <title>Say Halal | Beranda</title>
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
    <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="css/style.css" rel='stylesheet' type='text/css' />
    <!-- Graph CSS -->
    <link href="css/lines.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <!----webfonts--->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
    <!---//webfonts--->
    <!-- Nav CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/metisMenu.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- Graph JavaScript -->
    <script src="js/d3.v3.js"></script>
    <script src="js/rickshaw.js"></script>
    <style media="screen">
      .col-md-6 iframe {
        display:block;
        margin:auto;
      }
    </style>
</head>

<body>
  <div id="wrapper">
      <!-- Navigation -->
      @include('layouts.navigation')
      <div id="page-wrapper">
          <div class="graphs">
              <div class="col_1">
                  <div class="col-md-6 span_7">
                    @if ($galeri != null)
                      <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @if ($galeri->galeri1 != null)
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            @endif
                            @if ($galeri->galeri2 != null)
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                            @endif
                            @if ($galeri->galeri3 != null)
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                            @endif
                            @if ($galeri->galeri4 != null)
                              <li data-target="#myCarousel" data-slide-to="3"></li>
                            @endif
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            @if ($galeri->galeri1 != null)
                              <div class="item active">
                                <img src="/images/galeri/{{$galeri->galeri1}}" alt="Galeri 1">
                              </div>
                            @endif

                            @if ($galeri->galeri2 != null)
                              <div class="item">
                                <img src="/images/galeri/{{$galeri->galeri2}}" alt="Galeri 2">
                              </div>
                            @endif

                            @if ($galeri->galeri3 != null)
                              <div class="item">
                                <img src="/images/galeri/{{$galeri->galeri3}}" alt="Galeri 3">
                              </div>
                            @endif

                            @if ($galeri->galeri4 != null)
                              <div class="item">
                                <img src="/images/galeri/{{$galeri->galeri4}}" alt="Galeri 4">
                              </div>
                            @endif
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                          <span class="glyphicon glyphicon-chevron-left"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                    @endif
                  </div>
                  <div class="col-md-6 span_8">
                      <div class="activity_box">
                        <h2>Info</h2>
                          <div class="scrollbar" id="style-2">
                            <?php $in = 1; ?>
                            @foreach ($info as $inf)

                              <div class="activity-row">
                                  <div class="col-xs-1"><i class="fa fa-thumbs-up text-info icon_13"> </i> </div>
                                  <div class="col-xs-3 activity-img"><img src='/images/1.png' class="img-responsive" alt="" /></div>
                                  <div class="col-xs-8 activity-desc">
                                      <h5><a href="#" onclick="ubah_isi{{$in}}()">{{$inf->judul}}</a></h5>
                                      <!-- <p>Lorem Ipsum is simply dummy</p> -->
                                      <h6>{{$inf->created_at}}</h6>
                                  </div>
                                  <script type="text/javascript">
                                    function ubah_isi{{$in}}() {
                                      document.getElementById("info_judul").innerHTML = '{!!htmlspecialchars_decode(stripslashes($inf->judul))!!}';
                                      document.getElementById("info_isi").innerHTML = '{!!htmlspecialchars_decode(stripslashes($inf->info))!!}';
                                      document.getElementById("info_lampiran").innerHTML = 'Lampiran: <a target="_blank" href="http://say-halal.com/info/lampiran/{{$inf->lampiran}}">{{$inf->lampiran}}</a>';
                                    }
                                  </script>
                                  <div class="clearfix"> </div>
                              </div>
                              <?php $in = $in + 1; ?>
                            @endforeach
                          </div>
                      </div>
                  </div>
                  <div class="col-md-12 stats-info">
                      <div class="panel-heading">
                          <h2 class="panel-title text-center">Informasi</h2> <br>
                          <h4 class="panel-title" id="info_judul"></h4>
                      </div>
                      <div class="panel-body text-justify" id="info_isi">
                      </div>
                      <div class="panel-body text-justify" id="info_lampiran">
                      </div>
                  </div>
                  <div class="col-md-12 stats-info">
                      <div class="panel-heading">
                          <h2 class="panel-title text-center">Instagram</h2> <br>
                      </div>
                      <div class="tz-gallery">
                        <div class="row">
                          <?php
                            $im = 0;
                          ?>
                          @foreach($images as $image)
                            <div class="col-sm-6 col-xs-6 col-md-6">
                                <a class="lightbox" target="_blank" href="{{ $image->link }}">
                                    <img src="{{ $image->images->standard_resolution->url }}" alt="Instagram Feed" class="img-responsive">
                                </a>
                            </div>
                            @if ($im % 2 == 1)
                              <div class="col-sm-12 col-xs-12 col-md-12">
                                <img>
                              </div>
                            @endif
                            <?php
                              $im++;
                            ?>
                          @endforeach
                        </div>
                      </div>
                      <br>
                  </div>
                  <div class="col-md-12 stats-info">
                      <div class="panel-heading">
                          <h2 class="panel-title text-center">YouTube</h2> <br>
                      </div>
                      <div class="tz-gallery">
                        <div class="row">
                          @if ($youtube != null) 
                              @if ($youtube->youtube1 != null)
                                <div class="col-sm-6 col-xs-6 col-md-6">
                                    <iframe width="420" height="315" src="{{$youtube->youtube1}}"></iframe>
                                </div>
                              @endif
                              @if ($youtube->youtube2 != null)
                                <div class="col-sm-6 col-xs-6 col-md-6">
                                    <iframe width="420" height="315" src="{{$youtube->youtube2}}"></iframe>
                                </div>
                              @endif
                          @endif
                        </div>
                      </div>
                      <br>
                  </div>
                  <div class="clearfix"> </div>
              </div>
              <div class="span_11">
                  <div class="col-md-6 col_4">
                      <!----Calender -------->
                      <link rel="stylesheet" href="css/clndr.css" type="text/css" />
                      <script src="js/underscore-min.js" type="text/javascript"></script>
                      <script src="js/moment-2.2.1.js" type="text/javascript"></script>
                      <script src="js/clndr.js" type="text/javascript"></script>
                      <script src="js/site.js" type="text/javascript"></script>
                      <!----End Calender -------->
                  </div>
                  <div class="clearfix"> </div>
              </div>
              @include('layouts.footer')
          </div>
      </div>
      <!-- /#page-wrapper -->
  </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
