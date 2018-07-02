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
                    <h2 class="mb-5">Opzoek naar contact?</h2>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <a href="mailto:info@temsit.nl" style="margin: 0 auto"><i class="icon icon-envelope-open m-auto"></i></a>
                    </div>
                    <h3>Mail</h3>
                    <p class="lead mb-2">Mail ons,<br/> Druk op boventstaande icon!</p>
                    <p class="lead">Werkt dit niet?<br/> U kunt ons bereiken via <br/><i style="color: darkblue;">info@temsit.nl</i></p>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-call-in m-auto"></i>
                    </div>
                    <h3>Bellen</h3>
                    <p class="lead mb-0">Omdat temsit voortkomt uit twee studenten is bellen zonder afspraak vaak niet mogelijk. Probeer ons te mailen!</p>
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

<script src="../scripts.js"></script>
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
