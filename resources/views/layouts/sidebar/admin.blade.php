<!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<!--sidebar start-->

<aside>
  <div id="sidebar"  class="nav-collapse ">
      <!-- sidebar menu start-->
      <ul class="sidebar-menu" id="nav-accordion">
      
          <p class="centered"><a href="profile.html"><img src="{{asset('/atia/img/bandung-logo.png')}}" width="60"></a></p>
          <h5 class="centered">{{Auth::user()->nama}}</h5>
            
          <li class="sub-menu">
              <a class="@if(Route::is('izin.admin.index')) active @endif" href="{{route('izin.admin.index')}}">
                  <i class="fa fa-tasks"></i>
                  <span>Daftar Permohonan Izin</span>
              </a>
          </li>

          <li class="sub-menu">
              <a href="javascript:;">
                  <i class="fa fa-cogs"></i>
                  <span>Manajemen</span>
              </a>
              <ul class='sub'>
                <li><a href='{{route('izin.status.index')}}'>Status Izin</a></li>
                <li><a href='{{route('izin.jenis.index')}}'>Jenis Izin</a></li>
                <li><a href='{{route('izin.template.index')}}'>Template Dokumen</a></li>
              </ul>
          </li>
      </ul>
      <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->