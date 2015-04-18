<!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
            @if (Auth::check())
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            @endif
            <!--logo start-->
            <a href="index.html" class="logo"><b>Aplikasi Terkait Izin Angkutan</b></a>
            <!--logo end-->
            <div class="nav notify-row navbar-right" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    @if (!Auth::guest())
                    <li class='dropdown'>
                        <a href="{{route('logout')}}">
                            <i class="fa fa-power-off"></i>
                            <span>Logout</span>
                        </a>
                        
                    </li>
                    @endif
                </ul>
                <!--  notification end -->
            </div>
        </header>
      <!--header end-->