<nav id="navScroll" class="navbar navbar-dark bg-black fixed-top px-vw-5" tabindex="0">
    <div class="container">
        <a class="navbar-brand pe-md-4 fs-4 col-12 col-md-auto text-center" href="{{ url('/home') }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-stack"
                viewBox="0 0 16 16">
                <path
                    d="m14.12 10.163 1.715.858c.22.11.22.424 0 .534L8.267 15.34a.598.598 0 0 1-.534 0L.165 11.555a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.66zM7.733.063a.598.598 0 0 1 .534 0l7.568 3.784a.3.3 0 0 1 0 .535L8.267 8.165a.598.598 0 0 1-.534 0L.165 4.382a.299.299 0 0 1 0-.535L7.733.063z" />
                <path
                    d="m14.12 6.576 1.715.858c.22.11.22.424 0 .534l-7.568 3.784a.598.598 0 0 1-.534 0L.165 7.968a.299.299 0 0 1 0-.534l1.716-.858 5.317 2.659c.505.252 1.1.252 1.604 0l5.317-2.659z" />
            </svg>
            <span class="ms-md-1 mt-1 fw-bolder me-md-5">SPONSTORE</span>
        </a>

        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
            <li class="nav-item">
            <a class="nav-link fs-5" href="{{ url('/home') }}" aria-label="Homepage">
                Home
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link fs-5" href="{{ url('/profile') }}" aria-label="A sample content page">
                Profile
            </a>
            </li>
            <li class="nav-item">
                @if (Auth::guard('sponsor')->check())
                    <a class="nav-link fs-5" href="{{ url('/inbox') }}" aria-label="A system message page">
                        Inbox
                    </a>
                @elseif (Auth::guard('user')->check())
                    <a class="nav-link fs-5" href="{{ url('/inboxuser') }}" aria-label="A system message page">
                        Inbox
                    </a>
                @endif
            </li>
            <li class="nav-item">
                @if (Auth::guard('sponsor')->check())
                    <a class="nav-link fs-5" style="font-weight: 700; color: aquamarine" aria-label="A system message page">
                        Hello, {{Auth::guard('sponsor')->user()->name}}, ID {{Auth::guard('sponsor')->user()->id}}
                    </a>
                @elseif (Auth::guard('user')->check())
                    <a class="nav-link fs-5" style="font-weight: 700; color: aquamarine" aria-label="A system message page">
                        Hi, {{Auth::guard('user')->user()->name}}, ID {{Auth::guard('user')->user()->id}}
                    </a>
                @else
                    <p class="nav-link fs-5" style="font-weight: 555; color:aliceblue" aria-label="A system message page">Welcome to our page!</p>
                @endif
            </li>
        </ul>

      <!-- <form action="/search" class="d-flex me-3" role="search">
        <div class="input-group">
          <div class="form-outline">
            <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          </div>
          <button class="btn btn-outline-light" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </form> -->

      <!-- <form action="/search" class="d-flex me-3" role="search">
      <div class="container justify-content-center">
        <div class="row">
          <div class="col-md-8">
            <div class="input-group mb-3">
              <input type="search" class="form-control input-text" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-outline-warning btn-lg" type="submit"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form> -->

        <form action="/search" class="d-flex me-3" role="search">
            <div class="input-group" style="display: flex; align-items: center; border-right: none; border-radius: 5px 0 0 5px;">
                <input name="search" class="form-control" style="border-radius: 0;" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-warning" style="border-radius: 0;" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>

        @if (Auth::guard('sponsor')->check() || Auth::guard('user')->check())
            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" style="color: red" aria-label="Download this template" class="btn btn-outline-light">
                    <small>Log Out</small>
                </button>
            </form>
        @else
            <a href="{{ url('/') }}" style="color: greenyellow" aria-label="Download this template" class="btn btn-outline-light">
                <small>Log In</small>
            </a>
        @endif
    </div>
</nav>
