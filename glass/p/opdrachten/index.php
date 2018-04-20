<?php
require_once("../../../glass/core/init.php");

if (!isset($_SESSION["GID"]) || !is_numeric(Cookies::getCookie("GID"))) {
    header("location: auth");
}

//sendMail(array("mail" => "spijkermenno@gmail.com", "name" => "Menno"), "mail from php code", "Hij werkt G");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Opdrachten | Glass | TemsIT</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom fonts for this template -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
            integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
            crossorigin="anonymous"></script>
    <link href="../../style.css" rel="stylesheet">

    <script>
        function assignment_checkbox(thing){
            console.log($(thing).attr("title"));
        }
    </script>
</head>
<body onload="connect()" onunload="disconnect()">
<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
    <a class="navbar-brand" href="/glass/">Glass</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="/glass/p/klanten">Klanten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/glass/p/opdrachten">Opdrachten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/glass/p/inzicht">Inzicht</a>
            </li>
        </ul>
        <span class="navbar-text">
      TemsIT / <span class="uitloggen">uitloggen</span>
    </span>
    </div>
</nav>

<main class="container-fluid bg-light text-dark">
    <?php
    $assignments_todo = Database::select("select a.id as id, a.assignment as assignment, c.name as name, t.name as type, a.end_date as end_date from assignments as a inner join customer as c on a.customer_id = c.id inner join `type` as t on a.type_id = t.id where  start_date = NOW() or end_date >= NOW() and is_valid = true and done = false");
    $assignments_finished = Database::select("select a.assignment, c.name, t.name as type from assignments as a inner join customer as c on a.customer_id = c.id inner join `type` as t on a.type_id = t.id where  start_date = NOW() or end_date >= NOW() and is_valid = true and done = true");

    function dateDifference($date_1 )
    {
        $datetime1 = date_create($date_1);
        $datetime2 = date_create();

        $interval = date_diff($datetime1, $datetime2);

        return $interval->format("%a");

    }

    ?>

    <div class="row">
        <div class="offset-lg-2 offset-md-1 offset-xs-0 col-lg-8 col-md-10 col-xs-12 text-center">
            <h2>Opdrachten</h2>
            <div class="fake-table p-2">
                <div class="row">
                    <div class="col col-lg-2 col-md-12 col-12 fake-table-head">Klant</div>
                    <div class="col col-lg-2 col-md-6 col-6 fake-table-head">Afspraak</div>
                    <div class="col col-lg-2 col-md-6 col-6 fake-table-head">Dagen resterend</div>
                    <div class="col col-lg-4  col-md-10 col-10  fake-table-head">Opdracht</div>
                    <div class="col col-lg-2  col-md-2 col-2 fake-table-head"><i class="fas fa-check-square"></i>

                    </div>
                </div>
                <?php
                foreach ($assignments_todo as $assignment) {
                    ?>
                    <div class="row fake-table-row">
                        <div class="col col-lg-2 col-md-12 col-12"><?=$assignment->name?></div>
                        <div class="col col-lg-2 col-md-6 col-6"><?=$assignment->type?></div>
                        <div class="col col-lg-2 col-md-6 col-6"><?=dateDifference($assignment->end_date)?></div>
                        <div class="col col-lg-4 col-md-10 col-10"><?=$assignment->assignment?></div>
                        <div class="col col-lg-2 col-md-2 col-2"><input onchange="assignment_checkbox(this)" title="<?=$assignment->id?>" type="checkbox"></div>
                    </div>
                    <?php
                }
                if($assignments_finished) {
                    ?>
                    <div class="row fake-table-row">
                        <div class="col col-12"></div>
                    </div>
                    <?php
                    foreach ($assignments_finished as $assignment) {
                        ?>
                        <div class="row fake-table-row">
                            <div class="col col-4"><?= $assignment->name ?></div>
                            <div class="col col-4"><?= $assignment->type ?></div>
                            <div class="col col-4"><?= $assignment->assignment ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</main>
<footer class="container-fluid text-center">
    <p>Copyright TemsIT, &copy; 2017 - <?= date("Y") ?></p>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="../tools/analytics.js"></script>
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
    });
</script>
</body>
</html>
