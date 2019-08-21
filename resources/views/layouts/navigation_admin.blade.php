<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">Say Halal</a>
  </div>
  <!-- /.navbar-header -->
  <ul class="nav navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="/images/1.png">
      </a>
      <ul class="dropdown-menu">
        <li class="m_2"><a href="/logout"><i class="fa fa-lock"></i> Logout</a></li>
      </ul>
    </li>
  </ul>
  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <a href="{{route('admins.index')}}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Say Halal</a>
        </li>
        <li>
          <a href="{{route('admins.tentang')}}"><i class="fa fa-info-circle fa-fw nav_icon"></i>Tentang Say Halal</a>
        </li>
        <li>
          <a href="{{route('admins.galeri')}}"><i class="fa fa-picture-o fa-fw nav_icon"></i>Galeri</a>
        </li>
        <li>
          <a href="{{route('admins.info')}}"><i class="fa fa-info fa-fw nav_icon"></i>Info</a>
        </li>
        <li>
          <a href="{{route('admins.youtube')}}"><i class="fa fa-youtube fa-fw nav_icon"></i>Youtube</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-desktop nav_icon"></i>Instrumen JPH<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="#"><i class="fa fa-laptop nav_icon"></i>Lembaga Halal <span class="fa arrow"></span></a>
                  <ul class="nav nav-third-level">
                    <li>
                      <a href="{{route('admins.lph')}}"><i class="fa fa-building-o nav_icon"></i>LPH (Lembaga Pemeriksa Halal)</a>
                    </li>
                    <li>
                      <a href="{{route('admins.halal_center')}}"><i class="fa fa-building-o nav_icon"></i>Halal Center</a>
                    </li>
                  </ul>
              </li>
              <li>
                <a href="#"><i class="fa fa-laptop nav_icon"></i>Perorangan <span class="fa arrow"></span></a>
                  <ul class="nav nav-third-level">
                    <li>
                      <a href="{{route('admins.auditor_halal')}}"><i class="fa fa-user nav_icon"></i>Auditor Halal</a>
                    </li>
                    <li>
                      <a href="{{route('admins.penyelia_halal')}}"><i class="fa fa-user nav_icon"></i>Penyelia Halal</a>
                    </li>
                    <li>
                      <a href="{{route('admins.manager_halal')}}"><i class="fa fa-user nav_icon"></i>Manager Halal</a>
                    </li>
                    <li>
                      <a href="{{route('admins.juleha')}}"><i class="fa fa-user nav_icon"></i>Juru Sembelih Halal (Juleha)</a>
                    </li>
                  </ul>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{route('admins.pelaku_usaha')}}"><i class="fa fa-money fa-fw nav_icon"></i>Pelaku Usaha</a>
          </li>
          <li>
            <a href="/logout"><i class="fa fa-sign-out fa-fw nav_icon"></i>Log Out</a>
          </li>
      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>
