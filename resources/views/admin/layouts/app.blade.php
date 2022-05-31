<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/script.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/MMuser.css') }}" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" /></head>
<style>
    .navbar-sticky-top{
   
    background-color: #1e2021;
    border-bottom: 2px solid rgb(186, 186, 186);
}
</style>
    <body class="homepage" >
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navbar-sticky-top mb-3" style="  background: #edecf0;">

            <div class="container">

                <a style="font-size: 30px" class="navbar-brand " href="{{ route('admin.home') }}">
                    {{'HOME'}}
                </a>

                {{-- <a class="navbar-brand" href="{{ route('userall') }}">
                    {{'Edit User'}}
                </a>

                <a class="navbar-brand" href="{{ route('newsall') }}">
                    {{'Edit News'}}
                </a>

                <a class="navbar-brand" href="{{ route('popupall') }}">
                    {{'Edit popup'}}
                </a>  --}}
                


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <li class="center"><a class="navbar-brand" href="{{ route('userall') }}">
                                    {{'Edit User'}}
                            </a>
                        </li>

                        <li class="center">
                            <a class="navbar-brand" href="{{ route('newsall') }}">
                                {{'Edit News'}}
                            </a>
                        </li>
        
                        <li class="center"><a class="navbar-brand" href="{{ route('popupall') }}">
                            {{'Edit popup'}}
                        </a> </li>

                            <li class=""> 
                        <a class="navbar-brand" href="{{ route('log_all') }}">
                            {{'LOG'}}
                        </a> 
                            </li>
                        

                        
                        {{-- <a class="navbar-brand" href="{{ route('admin.dashbord.user') }}">
                            {{'MANAGEMENT'}}
                        </a>  --}}
                        <!-- Authentication Links -->
                        
                        
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-bell"></i> 
                                @if(auth()->user()->unreadnotifications->count())
                                <span class="position-absolute top-0 start-30 translate-middle badge rounded-pill bg-danger">{{auth()->user()->unreadnotifications->count()}}</span>
                                @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->unreadnotifications->count())
                                <a class="dropdown-item p-2" style="color: green" href="{{route('markAsRead')}}">read all</a>
                                @endif
                                
                                @forelse ( Auth::user()->unreadNotifications as $notification)
                                <a class="dropdown-item p-2" href="{{url('admin/detailNoti/news/'.$notification->data['title'] )}}">
                                    {{ $notification->data['title'] }}
                                </a>   

                                @empty
                                <a class="dropdown-item p-2" href="#">
                                    No notification
                                </a>    
                               
                                @endforelse
                              
                            </div>    
                          
                        </li>     



                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }}
                                </a>

                            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    
                                    {{-- <a class="dropdown-item" href="{{ route('userall') }}">
                                        {{'Edit User'}}
                                    </a>
                    
                                    <a class="dropdown-item" href="{{ route('newsall') }}">
                                        {{'Edit News'}}
                                    </a>
                    
                                    <a class="dropdown-item" href="{{ route('popupall') }}">
                                        {{'Edit popup'}}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('log') }}">
                                        {{'LOG'}}
                                    </a>  --}}

                                    <a href="{{route('Admin.profile.edit')}}" class="dropdown-item p-2">{{'Edit Profile'}}</a>
                                    </a>

                                    <a class="dropdown-item p-2" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                                 </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                            
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

      

        <main class="homepage">
            @yield('content')
           
        </main>
    </div>
</body>
</html>


