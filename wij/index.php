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
    <style>
        header.masthead {
            padding: 0;
        }

        .testimonials .testimonial-item img {
            box-shadow: 0 5px 5px 0 rgba(1,1,1,0.5);
        }

        .testimonials-no-image {
            background-color: transparent !important;
        }
    </style>
<!-- Masthead -->
<header class="masthead-testimonials text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <section class="testimonials-no-image text-center">
                    <div class="container">
                        <h2 class="m-5">TemsIT, wie zijn dat eigenlijk?</h2>
                        <div class="row p-5">
                            <div class="col-lg-6">
                                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                    <img class="img-fluid rounded-circle mb-3" src="../img/temp/img_avatar3.png" alt="Tycho E.">
                                    <h5>Tycho Engberink</h5>
                                    <p class="font-weight-light mb-0">"Ik ben Tycho."</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                                    <img class="img-fluid rounded-circle mb-3" src="../img/temp/img_avatar3.png" alt="Menno S.">
                                    <h5>Menno Spijker</h5>
                                    <p class="font-weight-light mb-0">"Ik Menno, een spontane en creatieve student in de
                                        sector ICT.
                                        Mijn interesses liggen merendeels in computers maar ook zeker in het
                                        buitenleven."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row p-5">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-map m-auto"></i>
                    </div>
                    <h3>Apeldoorn</h3>
                    <p class="lead mb-0">Tems IT is bedacht door twee studenten uit Apeldoorn. Zij wilen graag hun
                        verkregen kennis gebruiken om mensen te helpen.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-book-open m-auto"></i>
                    </div>
                    <h3>Studenten</h3>
                    <p class="lead mb-0">Wij zijn twee studenten, dit betekend dat wij nog veel aan het leren zijn en zo
                        steeds een beetje extra kunnen leveren aan een top product.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon icon-call-in m-auto"></i>
                    </div>
                    <h3>Contact</h3>
                    <p class="lead mb-0">Wij zijn zeer snel in contact. Mede door de snelle handeling via bijvoorbeeld
                        de smartphone kunnen wij snel reageren op een bericht of aanvraag.</p>
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
