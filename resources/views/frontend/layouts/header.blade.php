<header class="header-top">

  <div class="header-sec-1">
    <a href="{{route('index')}}"><img src="{{asset('frontend/img/footer_logo.png')}}" class="header-img" alt=""></a>
    <div class="btns" >
      <button class="btn btn-lg"><a href="" class="header-live "> <i class="fa fa-youtube mr-1"></i>Live</a></button>
      <button class="btn btn-lg"><a href="" class="header-donate "> <i class="fa fa-heart mr-1"></i>DONATE</a></button>
    </div>
  </div>
  <div class="header-sec-2">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <button class="navbar-toggler ml-auto mr-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        Menu &nbsp;<span class="navbar-toggler-icon custom-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto header-navbar-ul">
          <li class="nav-item active header-navbar-li">
            <a class="nav-link text-light" href="{{route('index')}}">Home</a>
          </li>
          <li class="nav-item active header-navbar-li">
            <a class="nav-link text-light" href="#">About Us </a>
          </li>
          <li class="nav-item active header-navbar-li">
            <a class="nav-link text-light" href="#">Our Values </a>
          </li>
          <li class="nav-item dropdown header-navbar-li">
            <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Our Team
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item active header-navbar-li">
            <a class="nav-link text-light" href="#">Events </a>
          </li>
          <li class="nav-item active header-navbar-li">
            <a class="nav-link text-light" href="#">Membership Application</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>


</header>