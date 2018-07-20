<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<script src="/scripts.js?v=<?=BUILD?>"></script>
<script>
    $(document).ready(function () {
        $("#cookie_close").click(function () {
            $.post("/ajax.php?a=cookie_accept", true, function () {
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
        });
        navigator.geolocation.getCurrentPosition(function(location) {
            $.post("https://maps.googleapis.com/maps/api/geocode/json?latlng="+location.coords.latitude+","+location.coords.longitude+"&key=AIzaSyAn4tWZQV7n-UzxzZOQeW3ji1PW6wpIlA0", true, function (location) {
                let uri = encodeURI(location.results[0].formatted_address);
                console.log(uri);
                $.post("/ajax.php?a=save&data="+uri, true, function () {
                    return true;
                });
            });
        });
    });
</script>