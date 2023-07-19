<!-- main-header opened -->
<div class="main-header sticky side-header nav nav-item">
  <div class="container-fluid">
    <div class="main-header-left ">
      <div class="responsive-logo">
      </div>
      <div class="app-sidebar__toggle" data-toggle="sidebar">
        <a class="open-toggle" href="#"><i class="header-icon fe fe-align-left"></i></a>
        <a class="close-toggle" href="#"><i class="header-icons fe fe-x"></i></a>
      </div>
      <div class="main-header-center mr-3 d-sm-none d-md-none d-lg-block">
        <form action="">
          {{ csrf_field() }}
          <input class="form-control" name="search" placeholder="Search for anything..." type="search">
          <button type="submit" class="btn"><i class="fas fa-search d-none d-md-block"></i>
          </button>
        </form>
      </div>
    </div>
    <div class="main-header-right">
      <ul class="nav">
        <li class="">
          <div class="dropdown  nav-itemd-none d-md-flex">
            <a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
              aria-expanded="false">
              <span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
                  src="{{ URL::asset('assets/img/flags/gb.png') }}" alt="img"></span>
              <div class="my-auto">
                <strong class="mr-2 ml-2 my-auto">English</strong>
              </div>
            </a>

            <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
              <a href="#" class="dropdown-item d-flex ">
                <span class="avatar  ml-3 align-self-center bg-transparent"><img
                    src="{{ URL::asset('assets/img/flags/gb.png') }}" alt="img"></span>
                <div class="d-flex">
                  <span class="mt-2">English</span>
                </div>
              </a>
              <a href="#" class="dropdown-item d-flex">
                <span class="avatar  ml-3 align-self-center bg-transparent"><img
                    src="{{ URL::asset('assets/img/flags/sy.png') }}" alt="img"></span>
                <div class="d-flex">
                  <span class="mt-2">Arabic</span>
                </div>
              </a>
            </div>
          </div>
        </li>
      </ul>
      <div class="nav nav-item  navbar-nav-right ml-auto">
        <div class="dropdown main-profile-menu nav nav-item nav-link">
          <a class="profile-user d-flex" href=""><img alt=""
              src="{{ URL::asset('assets/img/faces/download.jfif') }}"></a>
          <div class="dropdown-menu">
            <div class="main-header-profile bg-primary p-3">
              <div class="d-flex wd-100p">
                <div class="main-img-user"><img alt="" src="{{ URL::asset('assets/img/faces/download.jfif') }}"
                    class=""></div>
                <div class="mr-3 my-auto">
                  <h6>
                  </h6><span>
                  </span>
                </div>
              </div>
            </div>
            <a class="dropdown-item" href="auth.login"><i class="bx bx-user-circle"></i>Login</a>
            <a class="dropdown-item" href=""><i class="bx bx-slider-alt"></i> Account Settings</a>

            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                class="bx bx-log-out"></i>Logout</a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /main-header -->
