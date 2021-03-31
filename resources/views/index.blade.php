
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cooking | Welcome</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>
    {{-- <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'> --}}
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>

<div id="app">
<!-- Start Top Bar -->
    <!-- <Navbar/> -->
    <div class="top-bar">
    <div class="top-bar-left">

            <ul class="menu">
                <li class="menu-text"></li>
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/recipes">Recettes</router-link></li>
                <li><router-link to="/contact">Contact</router-link></li>
                @if(Auth::check())
                <li><a href="/admin/recette/create">Créer une recette</a></li>
                <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                </li>
                @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endif
            </ul>


    </div>
</div>


<!-- End Top Bar -->
<div class="callout large primary">
    <div class="text-center">
        <h1>Recettes</h1>
        <h2 class="subheader">Le maître de la cuisine</h2>
    </div>
</div>

<!-- <article class="grid-container">

    @yield('content')

</article> -->

    <router-view></router-view>
</div>

@if (Auth::check())
    <script>window.authUser={!! json_encode(Auth::user()); !!};</script>
@else
    <script>window.authUser=null;</script>
@endif

<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
