<!doctype html>
<html lang="nl">
<?php
define("TITLE","temsit.nl");
require_once 'core/head.php';
?>
<body>

<div class="container main">
    <?php
    require_once 'core/nav.php';
    ?>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark"
         style="background: url('assets/img/codeblur.png'); background-size: cover;">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">TEMS Internet Technologies</h1>
            <p class="lead my-3">Het op 23 Maart 2018 door Tycho Engberink en Menno Spijker opgerichte bedrijf dat
                diverse internet technologieën aanbied is vanaf heden officieel.</p>
            <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Lees meer...</a></p>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary">Development</strong>
                    <h5 class="mb-0">
                        <a class="text-dark" href="#">Creet</a>
                    </h5>
                    <div class="mb-1 text-muted">25 Maart 2018</div>
                    <p class="card-text mb-auto auto-hide">Na een goede samenwerking met temsIT is mijn starters platform online
                        gegaan!</p>
                    <a href="#">Lees verder</a>
                </div>
                <div class="card-img-right flex-auto d-none d-md-block bg-dark text-light"
                     style="background: url('assets/img/noimg.jpeg'); background-size: cover; background-position: center; width: 220px"></div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                    <h5 class="mb-0">
                        <a class="text-dark" href="#">Lorem ipsum dolor</a>
                    </h5>
                    <div class="mb-1 text-muted">Nov 11</div>
                    <p class="card-text mb-auto auto-hide">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                        commodo ligula eget dolor.</p>
                    <a href="#">Lees verder</a>
                </div>
                <div class="card-img-right flex-auto d-none d-md-block bg-dark text-light"
                     style="background: url('assets/img/noimg.jpeg'); background-size: cover; background-position: center; width: 220px"></div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'core/footer.php';
?>
</body>
</html>
