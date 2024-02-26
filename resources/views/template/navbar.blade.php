

<div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>
                        <div class="col-md-6">
                    <div class="search">
                        <form method="GET" action= "{{ route('search') }}"enctype="multipart/form-data">
                            {{-- Add a name attribute to the input field --}}
                            <input type="text" id="search" name="search" placeholder="Search">
                            <button type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </form> 
                    </div>
                    </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            
                                            <h6 class="mb-0 text-gray-600">
                                                 @auth
                                                {{ Auth::user()->name }}
                                                @endguest
                                            </h6>
                                            @guest
                                            <a href="{{ route('login') }}" class="mb-0 text-gray-600">{{ __('Login') }} / </a>
                                                @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="mb-0 text-gray-600">{{ __('Register') }}</a>
                                                @endif
                                            @else
                                            <p class="mb-0 text-sm text-gray-600">{{ Auth::user()->role }}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                    @endguest
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">  
                                         @auth
                                         {{ Auth::user()->name }}
                                        @endguest
                                    </h6>
                                    </li>
                                    
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="/historypeminjaman"><i class="icon-mid bi bi-gear me-2"></i>
                                            History Peminjaman</a></li>
                                    <li><a class="dropdown-item" href="/historypengembalian"><i class="icon-mid bi bi-wallet me-2"></i>
                                            History Pengembalian</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <form method="POST" action="{{ __('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                    </form>

                                    <!-- <li><a class="dropdown-item" href="{{ route('logout') }}" >
                                <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li> -->
                                      
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
    
    </div>