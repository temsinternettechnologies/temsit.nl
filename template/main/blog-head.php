<?php
$blogId = Database::escape($_GET["id"]);
$blog = Database::select(sprintf("SELECT * FROM blogs where id = %d", $blogId))[0];
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="<?= substr($blog->content,0,150) ?>">
<meta name="author" content="Menno Spijker, Tycho Engberink">
<meta name="robots" content="index, follow">
<meta name="theme-color" content="">
<meta name="google-site-verification" content="EA5iv8f1DlpCyjVBdo73sU2_q44YDZ2EAPDl0koqjQw" />

<title><?=$blog->subject?></title>

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

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
    (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-4928043878967484",
        enable_page_level_ads: true
    });
</script>

<!-- Custom styles for this template -->

<?php
if ($_SERVER['REMOTE_ADDR'] != "::1") {
    ?>
    <link href="/css/style.css?v=<?=BUILD?>" rel="stylesheet">
    <?php
}else {
    ?>
    <link href="/temsit.nl/css/style.css?v=<?=BUILD?>" rel="stylesheet">

    <?php
}
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
