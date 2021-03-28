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
<div class="top-bar">
    <div class="top-bar-left">

        @if(Auth::check())
            <ul class="menu">
                <li class="menu-text"></li>
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/reciepes">Recettes</router-link></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/admin/recette/create">Créer une recette</a></li>
                <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-dropdown-link>
                        </form>
                </li>
            </ul>

        @else
            <ul class="menu">
                <li class="menu-text"></li>
                <li><router-link to="/">Home</router-link></li>
                <li><router-link to="/reciepes">Recettes</router-link></li>
                <li><a href="/contact">Contact</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            </ul>

        @endif

    </div>
</div>


<!-- End Top Bar -->
<div class="callout large primary">
    <div class="text-center">
        <h1>Recettes</h1>
        <h2 class="subheader">Le maître de la cuisine</h2>
    </div>
</div>

<article class="grid-container">

    @yield('content')

</article>

</div>
<script src="{{asset('js/app.js')}}"></script>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
