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
          <a href="{{route('users.index')}}"><i class="fa fa-dashboard fa-fw nav_icon"></i>Say Halal</a>
        </li>
        <li>
          <a href="{{route('users.tentang')}}"><i class="fa fa-info-circle fa-fw nav_icon"></i>Tentang Say Halal</a>
        </li>
        @if (Auth::user()->lph == null && Auth::user()->halal_center == null && Auth::user()->auditor_halal == null && Auth::user()->penyelia_halal == null
              && Auth::user()->manager_halal == null && Auth::user()->juleha == null && Auth::user()->pelaku_usaha == null)
          <li>
            <a href="#"><i class="fa fa-desktop nav_icon"></i>Instrumen JPH<span class="fa arrow"></span></a>
              <ul class="nav nav-second-level">
                <li>
                  <a href="#"><i class="fa fa-laptop nav_icon"></i>Lembaga Halal <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                      <li>
                        <a href="{{route('users.lph')}}"><i class="fa fa-building-o nav_icon"></i>LPH (Lembaga Pemeriksa Halal)</a>
                      </li>
                      <li>
                        <a href="{{route('users.halal_center')}}"><i class="fa fa-building-o nav_icon"></i>Halal Center</a>
                      </li>
                    </ul>
                </li>
                <li>
                  <a href="#"><i class="fa fa-laptop nav_icon"></i>Perorangan <span class="fa arrow"></span></a>
                    <ul class="nav nav-third-level">
                      <li>
                        <a href="{{route('users.auditor_halal')}}"><i class="fa fa-user nav_icon"></i>Auditor Halal</a>
                      </li>
                      <li>
                        <a href="{{route('users.penyelia_halal')}}"><i class="fa fa-user nav_icon"></i>Penyelia Halal</a>
                      </li>
                      <li>
                        <a href="{{route('users.manager_halal')}}"><i class="fa fa-user nav_icon"></i>Manager Halal</a>
                      </li>
                      <li>
                        <a href="{{route('users.juleha')}}"><i class="fa fa-user nav_icon"></i>Juru Sembelih Halal (Juleha)</a>
                      </li>
                    </ul>
                </li>
              </ul>
            </li>
            <li>
              <a href="{{route('users.pelaku_usaha')}}"><i class="fa fa-money fa-fw nav_icon"></i>Pelaku Usaha</a>
            </li>
          @elseif (Auth::user()->lph != null)
            <li>
              <a href="{{route('users.lph')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->halal_center != null)
            <li>
              <a href="{{route('users.halal_center')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->auditor_halal != null)
            <li>
              <a href="{{route('users.auditor_halal')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->penyelia_halal != null)
            <li>
              <a href="{{route('users.penyelia_halal')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->manager_halal != null)
            <li>
              <a href="{{route('users.manager_halal')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->juleha != null)
            <li>
              <a href="{{route('users.juleha')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @elseif (Auth::user()->pelaku_usaha != null)
            <li>
              <a href="{{route('users.pelaku_usaha')}}"><i class="fa fa-user fa-fw nav_icon"></i>Profil</a>
            </li>
          @endif
          <li>
            <a href="/logout"><i class="fa fa-sign-out fa-fw nav_icon"></i>Log Out</a>
          </li>
      </ul>
    </div>
    <!-- /.sidebar-collapse -->
  </div>
  <!-- /.navbar-static-side -->
</nav>
