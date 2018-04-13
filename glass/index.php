<?php
require_once("../glass/core/init.php");

if (!isset($_SESSION["GID"]) || !is_numeric(Cookies::getCookie("GID"))) {
    header("location: auth");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Glass | TemsIT</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <a class="navbar-brand" href="#">Glass</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Pagina's</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Berichten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">klanten</a>
            </li>
        </ul>
        <span class="navbar-text">
      TemsIT / <span class="uitloggen">uitloggen</span>
    </span>
    </div>
</nav>
<main class="container-fluid bg-light text-dark">
    <div class="row p-5">
        <div class="offset-2 col-2 text-center border p-0 rounded" style="overflow: hidden">
            <div class="bg-danger text-light p-2" data-toggle="tooltip" data-placement="bottom"
                 title="Het aantal bezoekers sinds 00:00 <?= date("d-m-y") ?>"><h5>Views</h5></div>
            <div class="p-3"><h3>201</h3></div>
        </div>
        <div class="offset-1 col-2 text-center border p-0 rounded" style="overflow: hidden">
            <div class="bg-warning text-light p-2"><h5>Abonnees</h5></div>
            <div class="p-3"><h3>11</h3></div>
        </div>
        <div class="offset-1 col-2 text-center border p-0 rounded" style="overflow: hidden">
            <div class="bg-success text-light p-2"><h5>Klanten</h5></div>
            <div class="p-3"><h3>4</h3></div>
        </div>
    </div>
    <div class="row">
        <div class="offset-2 col-8 text-center">
            <h2>Vandaag</h2>
            <div class="fake-table p-2">
                <div class="row">
                    <div class="col col-4 fake-table-head">Klant</div>
                    <div class="col col-4 fake-table-head">Afspraak</div>
                    <div class="col col-4 fake-table-head">Opdracht</div>
                </div>
                <div class="row fake-table-row">
                    <div class="col col-4">Temsit</div>
                    <div class="col col-4">Bel afspraak</div>
                    <div class="col col-4">Bellen met dhr. Engberink over layout.</div>
                </div>
            </div>
        </div>
    </div>
</main>
<footer class="container-fluid text-center">
    <p>Copyright TemsIT, &copy; 2017 - <?= date("Y") ?></p>
</footer>

<!--<script src="http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1');
</script>-->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $(".uitloggen").click(function () {
            $.ajax({
                type: 'POST',
                url: 'handler.php?a=exit',
                data: '',
                dataType: 'json',
                callback: location.reload()
            });
        });
    })
</script>
</body>
</html>
