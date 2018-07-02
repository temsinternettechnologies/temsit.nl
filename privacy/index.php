<?php
require "../init.php";
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <?php
    require "../template/head.php";
    ?>
</head>

<body>
<?php
if (!$value = Cookies::getCookie("TID")) {
    require_once("../partials/cookies.php");
} else {
    // make sure the user cookie stays set.
    Cookies::setCookie("TID", $value);
}

require_once("../template/navbar.php");
?>

<!-- Masthead -->
<header class="masthead-backup text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <div class="container">
                    <h2 class="mb-5">Privacy policy,<br/>Alles wat je moet weten.</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-1">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-eyeglass m-auto"></i>
                    </div>
                    <h2>Privacy policy</h2>
                    <hr/>
                    <h4>Aanmelding</h4>
                    <p class="lead mb-0">Wanneer u zich met uw emailadres aanmeld voor 'meer informatie' wordt uw
                        emailadres opgeslagen in ons systeem. wij delen deze gegevens met GEEN enkele andere partij
                        zonder u hier eerst over geinformeerd te hebben en u de mogelijkheid te hebben gegeven om uw
                        gegevens uit onze database te verwijderen.</p>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include "../template/cal-to-action.php";
include "../template/footer.php";
?>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="../javascript/scripts.js"></script>
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
