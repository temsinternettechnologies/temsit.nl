<?php
require "init.php";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    require "template/head.php";
    ?>
</head>

<body>
<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

require_once("template/navbar.php");
?>

<header class="masthead-blur text-white text-center">
    <div class="overlay"></div>
    <div class="container p-2">
        <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">TEMS Internet Technologies<br/>Dé website bouwer voor starters!</h1>
        </div>
    </div>
</header>
<section class="text-center mt-5">
    <h1>Wat gebruiken wij?</h1>
</section>
<!-- Icons Grid -->
<section class="features-icons bg-fifth-light text-center">
    <div class="container">
        <div class="row p-2">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-size-actual m-auto"></i>
                    </div>
                    <h3>Volledig resposive</h3>
                    <p class="lead mb-0">De websites die door ons ontwikkeld zijn zien er goed uit op elk apparaat, voor
                        elk formaat!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-layers m-auto"></i>
                    </div>
                    <h3>Bootstrap 4</h3>
                    <p class="lead mb-0">Wij maken gebruik van het betrouwbare Bootstrap 4 Framework!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-speedometer m-auto"></i>
                    </div>
                    <h3>Snel in gebruik</h3>
                    <p class="lead mb-0">Onze websites worden specifiek ontwikkeld om snel te werken op elke
                        apparaat!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase bg-fifth-light">
    <div class="container p-0 bg-white">
        <div class="row no-gutters">

            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-1-860x574.png');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Beschikbaarheid op alle apparaten</h2>
                <p class="lead mb-0">Omdat wij gebruik maken van het Bootstrap 4 Framework zijn al onze websites mooi op
                    alle apparaten, </p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-2-860x574.png');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Software</h2>
                <p class="lead mb-0">Wij maken altijd gebruik van de nieuwste updates om er voor te zorgen dat
                    applicaties goed beveiligd zijn en lekker soepel werken!</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-3-860x574.png');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Samenwerking</h2>
                <p class="lead mb-0">Wij willen de beste producten leveren, daarom kunt u bij ons altijd terecht voor
                    een goed gesprek!</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials text-center">
    <img src="img/mbp.png" class="mbp hidden"/>
    <div class="container">
        <h2 onclick="location.href = '/wij/'" class="p-5">Wie zijn wij..?</h2>
        <div class="row p-5">
            <div class="col-lg-6">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/tycho.jpg" alt="Tycho E.">
                    <h5>Tycho Engberink</h5>
                    <p class="font-weight-light mb-0">Ik ben een spontane hardwerkende student altijd die openstaat voor
                        een nieuw avontuur.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/menno.jpg" alt="Menno S.">
                    <h5>Menno Spijker</h5>
                    <p class="font-weight-light mb-0">Ik ben een creatieve student in de sector ICT. Na mijn MBO
                        afgerond te hebben, begin ik binnenkort aan mijn HBO.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="customers bg-third-light hidden">
    <div class="container bg-white p-5">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2 text-center">
                <div class="customer-img-container">
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img"/>
                </div>
                <h3>TEMS-IT</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2 text-center">
                <div class="customer-img-container">
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img"/>
                </div>
                <h3>TEMS-IT</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2 text-center">
                <div class="customer-img-container">
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img"/>
                </div>
                <h3>TEMS-IT</h3>
            </div>
        </div>
    </div>
</section>

<?php
include "template/cal-to-action.php";
include "template/footer.php";
?>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>

<script src="javascript/scripts.js"></script>
<script>
    $(document).ready(function () {
        $("#cookie_close").click(function () {
            $.post("ajax.php?a=cookie_accept", true, function () {
                $(".cookies").remove();
            });
        });

        $("#form-bottom-btn").click(function () {
            var email = $("#form-bottom-input").val();
            if (validateEmail(email)) {
                saveEmail(email);
            } else {
                $('#form-bottom-input').tooltip("show");
                $("#form-bottom-input").click(function () {
                    $('#form-bottom-input').tooltip("hide");
                });
            }
        })
    });
</script>
</body>

</html>
