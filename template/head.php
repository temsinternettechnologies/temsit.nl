<?php
try {
    $content = Database::select("SELECT * FROM pages WHERE url = '" . getRequestUri() . "'")[0];
    if (!count($content)){
        throw new Exception("Er heeft zich een onverwachte fout voorgedaan. Onze ontwikkelaars zijn op de hoogte gesteld.");
    }
} catch (Exception $e) {
    try{
        if(!Database::insert("error", array("message" => "No data in table 'pages' for url '" . getRequestUri() . "'"))){
            throw new Exception("Er heeft zich een onverwachte fout voorgedaan. Het is ons ook niet gelukt de ontwikkelaar op de hoogte te stellen...");
        }
    }catch (Exception $x){
        echo $x->getMessage();
        exit;
    }
    echo $e->getMessage();
    exit();
}
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= $content->meta_description ?>">
<meta name="author" content="Menno Spijker, Tycho Engberink">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="">

<title><?= $content->title ?></title>

<meta name="keywords"
      content="website laten maken, goedkope website laten maken, websitebouwer, websites voor starters">

<!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<!-- Custom fonts for this template -->
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js"
        integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+"
        crossorigin="anonymous"></script>
<link href="/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet"
      type="text/css">

<!-- Custom styles for this template -->

<link href="/css/style.min.css" rel="stylesheet">
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