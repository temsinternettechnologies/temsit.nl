<?php
require_once('../core/init.php');
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <meta name="google-site-verification" content="2ooCwpIaYCwxEQSoshDu7dWta3ep5A-RD2_x5c96EjI" />
    
    <link rel="icon" href="../opzet1/assets/img/code-flat.png?build=<?= BUILD ?>">

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

    <title>temsIT</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="style.css?build=<?= BUILD ?>" rel="stylesheet">

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

</head>

<body>
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center bash">
            <div class="bash-title">
                <div class="buttons">
                    <div class="button bg-danger"></div>
                    <div class="button bg-warning"></div>
                    <div class="button bg-success"></div>
                </div>
                <p class="lead" style="display:inline-block; padding:0 100px; text-align: center; color: #000;">
                    tems.exe</p>
            </div>
            <div class="bash-content text-left">
                <h5 id="heading">$ </h5>
            </div>
        </div>
    </div>
    <?php
    if (Cookies::getCookie("subscribed") == true) {
        ?>
        <br/>
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
        <h5>Wat leuk dat u op de hoogte wilt blijven van ons concept.<br/>Stay posted!</h5>
        </div>
    </div>
        <?php
    } else {
        ?>
        <br/>
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-xs-12 text-center">
                <h5>Wilt u geinformeerd worden wanneer wij officieel van start gaan?<br/>Vul dit formulier in!</h5>
                <br/>
                <form method="post" action="handler.php" id="form">
                    <div class="col-lg-10 offset-lg-1 text-center" style="margin-bottom: 10px">
                        <input class="form-control" type="text" name="data[name]" id="name"
                               placeholder="Voor en achternaam"/>
                    </div>
                    <div class="col-lg-10 offset-lg-1 text-center" style="margin-bottom: 10px">
                        <input class="form-control" type="email" name="data[email]" id="email"
                               placeholder="E-mailadres"/>
                    </div>
                </form>
                <div class="col-lg-10 offset-lg-1 text-center" style="margin-bottom: 10px">
                    <button class="form-control btn btn-warning" id="submit">Meld mij aan!</button>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="https://mattboldt.com/demos/typed-js/js/typed.custom.js"></script>
<script>
    $(document).ready(function () {
        $("#submit").click(function () {
            var pass = true;
            if ($("#name").val() === '') {
                $("#name").addClass("false-validate");
                pass = false;
            } else {
                $("#name").removeClass("false-validate");
            }
            if ($("#email").val() === '') {
                $("#email").addClass("false-validate");
                pass = false;
            } else {
                $("#email").removeClass("false-validate");
            }

            if (pass === true) {
                $("#form").submit();
            }
        });
    });

    $(function () {

        $("#heading").typed({
            strings: ["Initinating 'TEMS Internet Technologies'..."],
            typeSpeed: 30,
            callback: function () {
                $('.typed-cursor').hide(100);
            }
        });

    });

</script>
</body>
</html>
