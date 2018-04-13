<?php
require_once("../../glass/core/init.php");

if (isset($_POST["username"])) {
    $username = Database::escape($_POST['username']);
    $password = Database::escape($_POST['password']);
    $query = sprintf("SELECT * FROM users WHERE username = '%s' and password = '%s'", $username, $password);
    $userdata = Database::select($query);
    if (isset($userdata[0])) {
        $userdata = $userdata[0];
        if ($_POST['remember'] == "on"){
            Cookies::setCookie("GID", $userdata->id);
        }
        $_SESSION["GID"] =  $userdata->id;
        header("location: /glass");
    } else {
        echo "<style>input[type=text], input[type=password]{border-bottom:solid 3px crimson !important;};</style>";
    }
}
?>
<style>
    body {
        color: #999;
        font-family: sans-serif;
    }

    h2 {
        color: #999;
        font-size: 15px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 10px;
    }

    a {
        color: #999;
        text-decoration: none;
    }

    .login {
        width: 250px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -184px 0px 0px -155px;
        background: rgba(0, 0, 0, 0.5);
        padding: 40px 50px;
        border-radius: 5px;
        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.3), inset 0px 1px 0px rgba(255, 255, 255, 0.07)
    }

    input[type="text"], input[type="password"] {
        width: 250px;
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
    }

    #remember:checked ~ label[for=remember] {
        background: #b5cd60;
        border: 3px solid #252730;
        box-shadow: 0px 0px 0px 2px #b5cd60;
    }

    input[type="submit"] {
        background: #b5cd60;
        border: 0;
        width: 250px;
        height: 40px;
        border-radius: 3px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    input[type="submit"]:hover {
        background: #16aa56;
    }

    .forgot {
        margin-top: 30px;
        display: block;
        font-size: 11px;
        text-align: center;
        font-weight: bold;
    }

    .forgot:hover {
        margin-top: 30px;
        display: block;
        font-size: 11px;
        text-align: center;
        font-weight: bold;
        color: #6d7781;
    }

    .remember {
        padding: 30px 0px;
        font-size: 12px;
        text-indent: 25px;
        line-height: 15px;
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
    <h2>Inloggen</h2>
    <form method="post">
        <input name='username' placeholder='Username' type='text'/>
        <input id='pw' name='password' placeholder='Password' type='password'/>
        <div class='remember'>
            <input checked='' id='remember' name='remember' type='checkbox'/>
            <label for='remember'></label>Remember me
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
        $("#pw").focus(function () {
            this.type = "text";
        }).blur(function () {
            this.type = "password";
        })
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