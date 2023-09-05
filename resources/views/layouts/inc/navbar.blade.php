<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
    <li class="nav-item text-right">
        <a class="nav-link text-right" href="{{route('index')}}">
            <img id="navbar-logo" src="{{url('frontend/images/Wish.png')}}"/>
        </a>
      </li>
      <li class="nav-item text-right">
        <a class="nav-link text-right" href="{{route('index')}}">
            {{__('navbar.index')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('about')}}">
            {{__('navbar.about')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('contact')}}">
            {{__('navbar.contact')}}
        </a>
      </li>
    </ul>
  </div>
</nav>
