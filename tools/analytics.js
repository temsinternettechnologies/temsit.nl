function connect(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            return true;
        }
    };
    xmlhttp.open("GET", "http://localhost:8080/tools/analytics.php?a=connect", true);
    xmlhttp.send();
}

function disconnect(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            return true;
        }
    };
    xmlhttp.open("GET", "http://localhost:8080/tools/analytics.php?a=disconnect", true);
    xmlhttp.send();
}