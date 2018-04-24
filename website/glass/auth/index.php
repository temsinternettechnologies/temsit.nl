<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Glass | Login</title>
</head>
<?php
require_once("../../core/init.php");

if (isset($_POST["username"])) {
    $username = Database::escape($_POST['username']);
    $password = Database::escape($_POST['password']);

    $password = sha1($password);

    $query = sprintf("SELECT * FROM users WHERE username = '%s' and password = '%s'", $username, $password);
    $userdata = Database::select($query);

    if (isset($userdata[0])) {
        $userdata = $userdata[0];
        if ($_POST['remember'] == "on") {
            Cookies::setCookie("GID", $userdata->id);
        }
        $_SESSION["GID"] = $userdata->id;
        header("location: /glass");
    } else {
        echo "<style>input[type=text], input[type=password]{border-bottom:solid 3px crimson !important;};</style>";
        $userdata = Database::select(sprintf("select * from users where username = '%s'", $username));
        if (isset($userdata[0])) {
            $authError = "Dit wachtwoord komt niet overeen met het wachtwoord van deze gebruikersnaam.";
        }else{
            $authError = "Deze gebruikernaam is niet bij ons bekend.";
        }
    }
}
?>
<style>
    body {
        color: #999;
        font-family: sans-serif;
        background-color: orange;
        transition: background-color 6s;
    }

    h2 {
        color: #999;
        font-size: 15px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 10px;
    }

    h1 {
        text-align: center;
        color: white;
        letter-spacing: 5px;
    }

    a {
        color: #999;
        text-decoration: none;
    }

    .login {
        width: 90vw;
        height:auto;
        top: 5vh;
        left: 5vw;
        position: absolute;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 5px;
        box-shadow: 0px 0px 5px rgba(200, 200, 200, 0.2), inset 0px 1px 0px rgba(255, 255, 255, 0.07);
        padding-bottom: 10px;
    }

    @media only screen and (min-width: 400px) {
        .login {
            width: 80vw;
            top: 7.5vh;
            left: 10vw;
        }
    }

    @media only screen and (min-width: 600px) {
        .login {
            width: 50vw;
            top: 5vh;
            left: 5vw;
        }
    }
    @media only screen and (min-width: 750px) {
        .login {
            width: 40vw;
            top: 10vh;
            left: 10vw;
        }
    }
    @media only screen and (min-width: 1000px) {
        .login {
            width: 30vw;
           top: 10vh;
            left: 10vw;
        }
    }
    @media only screen and (min-width: 1300px) {
        .login {
            width: 20vw;
            top: unset;
            bottom: 20vh;
            left: 10vw;
        }
    }

    input[type="text"], input[type="password"] {
        width: 100%;
        margin-top: 5px;
        padding: 25px 0px;
        background: rgba(200, 200, 200, 0.2);
        border: 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        outline: none;
        color: white;
        text-align: center;
    }

    input::placeholder {
        color: #aaa;
        text-align: center;
    }

    input[type=checkbox] {
        display: none;
    }

    label {
        display: block;
        position: absolute;
        margin-top: 2px;
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #46485c;
        content: "";
        transition: all 0.3s ease-in-out;
        cursor: pointer;
        border: 3px solid #252730;
        box-shadow: 0px 0px 0px 2px #46485c;
        margin-left: 5%;
    }

    #remember:checked ~ label[for=remember] {
        background: #b5cd60;
        border: 3px solid #252730;
        box-shadow: 0px 0px 0px 2px #b5cd60;
        margin-left: 5%;
    }

    input[type="submit"] {
        background: limegreen;
        border: 0;
        width: 90%;
        height: 40px;
        border-radius: 3px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
        margin-left: 5%;
    }

    input[type="submit"]:hover {
        background: #16aa56;
    }

    .remember {
        padding: 30px 0px;
        font-size: 12px;
        text-indent: 25px;
        line-height: 15px;
    }

    .remember span {
        margin-left: 5%;
    }

    ::-webkit-input-placeholder {
        color: #46485c;
    }

    [placeholder]:focus::-webkit-input-placeholder {
        transition: all 0.2s linear;
        transform: translate(10px, 0);
        opacity: 0;
    }

</style>
<div class='login'>
    <h1>TEMS-IT</h1>
    <h2>Inloggen</h2>
    <?php
    if(isset($authError)) {
        echo "<p style='text-align: center; color: #f0f0f0; background-color: rgba(200,200,200,0.5); padding: 25px 0;'>" . $authError . "</p>";
    }
    ?>
    <form method="post" autocomplete="off">
        <input name='username' placeholder='Username' type='text' value="" autocomplete="new"/>
        <input id='pw' name='password' placeholder='Password' type='password' value="" autocomplete="new-password"/>
        <div class='remember'>
            <input checked='' id='remember' name='remember' type='checkbox'/>
            <label for='remember'></label><span>Remember me<span>
        </div>
        <input type='submit' value='Sign in'/>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script>
    //show password
    $(document).ready(function () {

        setRandomColor();
        setInterval(setRandomColor, 6000);


        /* $("#pw").focus(function () {
             this.type = "text";
         }).blur(function () {
             this.type = "password";
         })*/
    });

    //Placeholder fixed for Internet Explorer
    $(function () {
        var input = document.createElement("input");
        if (('placeholder' in input) == false) {
            $('[placeholder]').focus(function () {
                var i = $(this);
                if (i.val() == i.attr('placeholder')) {
                    i.val('').removeClass('placeholder');
                    if (i.hasClass('password')) {
                        i.removeClass('password');
                        this.type = 'password';
                    }
                }
            }).blur(function () {
                var i = $(this);
                if (i.val() == '' || i.val() == i.attr('placeholder')) {
                    if (this.type == 'password') {
                        i.addClass('password');
                        this.type = 'text';
                    }
                    i.addClass('placeholder').val(i.attr('placeholder'));
                }
            }).blur().parents('form').submit(function () {
                $(this).find('[placeholder]').each(function () {
                    var i = $(this);
                    if (i.val() == i.attr('placeholder'))
                        i.val('');
                })
            });
        }
    });

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }


    function setRandomColor() {
        $("body").css("background-color", getRandomColor());
    }
</script>