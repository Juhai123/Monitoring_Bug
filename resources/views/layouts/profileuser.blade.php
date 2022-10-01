
                <li class="nav-item dropdown pe-3">

<a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
    data-bs-toggle="dropdown">
    @if(Auth::user()->image)
              <img src="{{asset('storage/'.Auth::user()->image)}}" alt="Profile" class="rounded-circle" />
                            @else
                            <img src="{{ asset('nice') }}/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            @endif
    <span class="d-none d-md-block dropdown-toggle ps-2">{{Auth::user()->name}}</span>
</a><!-- End Profile Iamge Icon -->

<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
    <li class="dropdown-header">
        <h6>{{Auth::user()->name}}</h6>
        <span>{{Auth::user()->job}}</span>
    </li>
    <li>
        <hr class="dropdown-divider">
    </li>

    <li class="nav-item">
       
        <a class="nav-link {{ Request()->routeIs('user.profile.*') ? '' : 'collapsed' }}" 
                href="{{ route('user.profile.index') }}">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
        </a>
    </li>
    
    <li>
        <hr class="dropdown-divider">
    </li>

    <li>
        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
        </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
    </li>

</ul><!-- End Profile Dropdown Items -->
</li><!-- End Profile Nav -->