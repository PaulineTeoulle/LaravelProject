
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recette | Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/css/foundation-prototype.min.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/foundicons/3.0.0/foundation-icons.css' rel='stylesheet' type='text/css'>

    <style>
        input, textarea{
            border : 1px solid #000;
        }
    </style>
    <!-- optional CDN for Foundation Icons ^^ -->
</head>
<body>
<!-- Info Banner For Announcements or Links -->
<!-- <a href="https://zurb.com/university/foundation-intro" class="docs-banner course-banner">
  <div class="info">
    <h5 class=""><strong>To master everything new in 6.4, along with the rest of Foundation register for our Aug 8th Webinar Class &rsaquo;</strong></h5>
  </div>
</a> -->

<!-- <a href="https://zurb.com/wired" id="notice">
  <div class="info hide-for-small">
    <div id="clockdiv" class="countdown">
        <span class="timer-day days"></span>
        <span class="timer-colon">:</span>
      <span class="timer-hour hours"></span>
      <span class="timer-colon">:</span>
      <span class="timer-hour minutes"></span>
      <span class="timer-colon">:</span>
      <span class="timer-seconds seconds"></span>
    </div>
  </div>
</a> -->


<!-- Start Top Bar -->
<div class="top-bar">
    <div class="top-bar-left">
        <ul class="menu">
            <li class="menu-text"></li>
            <li><a href="/home">Home</a></li>
            <li><a href="/recettes">Recettes</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="admin/recettes/create">Créer</a></li>
        </ul>
    </div>
</div>
<!-- End Top Bar -->

<div class="callout large primary">
    <div class="text-center">
        <h1>Les Recettes</h1>
        <h2 class="subheader">Such a Simple Recipe Layout</h2>
    </div>
</div>

@yield('content')

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.4.3/js/foundation.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/motion-ui/1.2.3/motion-ui.min.js"></script>
<script>
    $(document).foundation();
</script>
</body>
</html>
