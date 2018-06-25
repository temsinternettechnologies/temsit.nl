<?php
require "init.php";
try {
    $content = Database::select("SELECT * FROM pages WHERE url = '/'")[0];
}catch(Exception $e){
    echo "Er heeft zich een onverwachte fout voorgedaan. Onze ontwikkelaars zijn op de hoogte gesteld.";
    exit("[Content error]");
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="<?=$content->meta_description?>">
    <meta name="author" content="Menno Spijker, Tycho Engberink">
    <meta name="robots" content="index, follow">

    <title><?=$content->title?></title>

    <meta name="keywords" content="website laten maken, goedkope website laten maken, websitebouwer, websites voor starters">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
          type="text/css">

    <!-- Custom styles for this template -->

    <link href="css/style.min.css" rel="stylesheet">
    <?php
    if ($_SERVER['REMOTE_ADDR'] != "::1") {
        ?>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-116390520-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];

            function gtag() {
                dataLayer.push(arguments);
            }

            gtag('js', new Date());

            gtag('config', 'UA-116390520-1');
        </script>
        <?php
    }
    ?>
</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#">TEMS - IT</a>
        <a class="btn btn-info disabled" href="/glass/">Inloggen</a>
    </div>
</nav>

<?php
/*<!-- Masthead -->
<!--<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">TEMS Internet Technologies<br/>Dé website bouwer voor starters!</h1>
            </div>
            <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">
                <div class="form-row" id="form-top">
                    <div class="col-12 col-md-8 mb-2 mb-md-0">
                        <input type="email" id="form-top-input" class="form-control form-control-lg"
                               placeholder="vul hier jouw emailadres in..." data-toggle="tooltip" data-html="true"
                               data-placement="bottom"
                               title="<div style='padding:5px 10px'>Dit is geen emailadres...</div>">
                    </div>
                    <div class="col-12 col-md-4">
                        <button id="form-top-btn" class="btn btn-block btn-lg btn-orange">Meer informatie!</button>
                    </div>
                </div>
                <div class="col-12 col-md-12">
                    <p style="font-size: 0.70em">Wij gebruiken uw emailadres enkel tijdens het zoeken van en het onderhouden van contact. wij delen geen gegevens met derde partijen.</p>
                </div>
        </div>
    </div>
</header>-->*/

?>
<header class="masthead-teampower text-white text-center">
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
        <div class="row p-5">
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
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2-860x574.png');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Software</h2>
                <p class="lead mb-0">Wij maken altijd gebruik van de nieuwste updates om er voor te zorgen dat applicaties goed beveiligd zijn en lekker soepel werken!</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img"
                 style="background-image: url('img/bg-showcase-3-860x574.png');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Samenwerking</h2>
                <p class="lead mb-0">Wij willen de beste producten leveren, daarom kunt u bij ons altijd terecht voor een goed gesprek!</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials text-center">
    <img src="img/mbp.png" class="mbp hidden" />
    <div class="container">
        <h2 onclick="location.href = '/wij/'" class="p-5">Wie zijn wij..?</h2>
        <div class="row p-5">
            <div class="col-lg-6">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/tycho.jpg" alt="Tycho E.">
                    <h5>Tycho Engberink</h5>
                    <p class="font-weight-light mb-0">Ik ben een spontane hardwerkende student altijd die openstaat voor een nieuw avontuur.</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/menno.jpg" alt="Menno S.">
                    <h5>Menno Spijker</h5>
                    <p class="font-weight-light mb-0">Ik ben een creatieve student in de sector ICT. Na mijn MBO afgerond te hebben, begin ik binnenkort aan mijn HBO.</p>
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
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img" />
                </div>
                <h3>TEMS-IT</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2 text-center">
                <div class="customer-img-container">
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img" />
                </div>
                <h3>TEMS-IT</h3>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 pt-2 text-center">
                <div class="customer-img-container">
                    <img src="img/customers/temsit.png" class="rounded pb-4 customer-img" />
                </div>
                <h3>TEMS-IT</h3>
            </div>
        </div>
    </div>
</section>

<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Klaar voor je eigen website? meld je nu aan!</h2>
            </div>
            <div class="col-md-12 col-lg-10 col-xl-8 mx-auto">
                <div class="form-row" id="form-bottom">
                    <div class="col-12 col-md-8 mb-2 mb-md-0">
                        <input type="email" id="form-bottom-input" class="form-control form-control-lg"
                               placeholder="vul hier jouw emailadres in..." data-toggle="tooltip" data-html="true"
                               data-placement="bottom"
                               title="<div style='padding:5px 10px'>Dit is geen emailadres...</div>">
                    </div>
                    <div class="col-12 col-md-4">
                        <button id="form-bottom-btn" class="btn btn-block btn-lg btn-orange">Meer informatie!</button>
                    </div>
                    <div class="col-12 col-md-12">
                        <p style="font-size: 0.70em">Wij gebruiken uw emailadres enkel tijdens het zoeken van en het onderhouden van contact. wij delen geen gegevens met derde partijen.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>
<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script>
    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    function saveEmail(email){
        $.get("handler.php?a=save&email="+email, function(data, status){
            if(data == '1'){
                $('#form-top-input').attr("title", "Dit emailadres bestaat al. Probeer een ander emailadres.");
                $('#form-top-input').tooltip("show");
                $("#form-top-input").click(function () {
                    $('#form-top-input').tooltip("hide");
                    $('#form-bottom-input').tooltip("hide");
                });

                $('#form-bottom-input').attr("title", "Dit emailadres bestaat al. Probeer een ander emailadres.");
                $('#form-bottom-input').tooltip("show");
                $("#form-bottom-input").click(function () {
                    $('#form-bottom-input').tooltip("hide");
                    $('#form-top-input').tooltip("hide");
                })
                return false;
            }else if(data == "error") {
                $('#form-top-input').attr("title", "Helaas heeft zich een fout voortgedaan. Probeer het op een later moment nog een keer.");
                $('#form-top-input').tooltip("show");
                $("#form-top-input").click(function () {
                    $('#form-top-input').tooltip("hide");
                    $('#form-bottom-input').tooltip("hide");
                });

                $('#form-bottom-input').attr("title", "Helaas heeft zich een fout voortgedaan. Probeer het op een later moment nog een keer.");
                $('#form-bottom-input').tooltip("show");
                $("#form-bottom-input").click(function () {
                    $('#form-bottom-input').tooltip("hide");
                    $('#form-top-input').tooltip("hide");
                });
                return false;
            }else if(data == "2"){
                thankyouMessage();
            }
        });
    }
    function thankyouMessage() {
        $("#form-top").removeClass('form-row');
        $("#form-top").html("<h2>Bedankt!</h2><h3> Wij zullen zo spoedig mogelijk contact opnemen.</h3>");

        $("#form-bottom").removeClass('form-row');
        $("#form-bottom").html("<h2>Bedankt!</h2><h3> Wij zullen zo spoedig mogelijk contact opnemen.</h3>");
    }


    $(document).ready(function () {
        $("#form-top-btn").click(function () {
            var email = $("#form-top-input").val();
            if (validateEmail(email)) {
                saveEmail(email);
            } else {
                $('#form-top-input').tooltip("show");
                $("#form-top-input").click(function () {
                    $('#form-top-input').tooltip("hide");
                });
            }
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
