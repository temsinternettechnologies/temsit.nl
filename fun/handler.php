<?php
require_once('../core/init.php');
if(Database::insert("abonnees", $_POST["data"])){
    Cookies::setCookie("subscribed", true);
}
?>
<html>
<head>
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
<form method="post" action="/fun" id="form">
    <input type="hidden" name="action" value="validate-subscription">
    <a class="click">Je wordt omgeleid, geen zin om te wachten? klik hier!</a>
</form>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
    $('.click').click(function () {
        $('#form').submit();
    });
    $(document).ready(function () {
        $("#form").submit();
    })
</script>
</body>
</html>