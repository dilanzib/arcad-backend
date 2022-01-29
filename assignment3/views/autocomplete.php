<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>


<script> 
function getData(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesearch").innerHTML = this.responseText;
        }
    };


    xhttp.open("GET", "../models/ajaxsearch.php?query="+str, true);  
    xhttp.send();
}
</script>


<article> 
    <h2>Autocomplete </h2>
    <p>Skriv in början på ett användarnamn så hittar jag de som matchar <br>
    testa t.ex. d, s och a.
    </p>

    <form>
    <input type="text" size="38" onkeyup="getData(this.value)">
    <div id="livesearch" style="width: 200px;background-color: #E0E0E0; border-radius: 6px;"></div>
    </form>

</article>




