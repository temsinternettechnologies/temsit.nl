function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function saveEmail(email) {
    $.get("handler.php?a=save&email=" + email, function (data, status) {
        if (data == '1') {
            $('#form-top-input').attr("title", "Dit emailadres bestaat al. Probeer een ander emailadres.");
            $('#form-top-input').tooltip("show");
            $("#form-top-input").click(function () {
                $('#form-top-input').tooltip("hide");
                $('#form-bottom-input').tooltip("hide");
            });

            $('#form-bottom-input').attr("title", "Dit emailadres bestaat al. Probeer een ander emailadres.");
            $('#form-bottom-input').tooltip("show");
            $("#form-bottom-input").click(function () {
                $('#form-bottom-input').tooltip("hide");
                $('#form-top-input').tooltip("hide");
            })
            return false;
        } else if (data == "error") {
            $('#form-top-input').attr("title", "Helaas heeft zich een fout voortgedaan. Probeer het op een later moment nog een keer.");
            $('#form-top-input').tooltip("show");
            $("#form-top-input").click(function () {
                $('#form-top-input').tooltip("hide");
                $('#form-bottom-input').tooltip("hide");
            });

            $('#form-bottom-input').attr("title", "Helaas heeft zich een fout voortgedaan. Probeer het op een later moment nog een keer.");
            $('#form-bottom-input').tooltip("show");
            $("#form-bottom-input").click(function () {
                $('#form-bottom-input').tooltip("hide");
                $('#form-top-input').tooltip("hide");
            });
            return false;
        } else if (data == "2") {
            thankyouMessage();
        }
    });
}

function thankyouMessage() {
    $("#form-top").removeClass('form-row');
    $("#form-top").html("<h2>Bedankt!</h2><h3> Wij zullen zo spoedig mogelijk contact opnemen.</h3>");

    $("#form-bottom").removeClass('form-row');
    $("#form-bottom").html("<h2>Bedankt!</h2><h3> Wij zullen zo spoedig mogelijk contact opnemen.</h3>");
}
