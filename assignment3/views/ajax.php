<?php include "../components/head.php" ?>
<?php include "../components/init.php" ?>
<?php include "../components/navbar.php" ?>

<script>
function getData(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.getElementById("ajaxData").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "../models/ajaxsearch.php?query="+str, true);
    xhttp.send();
}

</script>

<article> 
    <h2> Sök data med AJAX via PHP och SQL</h2>
    <!-- Sökfält -->
    <form>
        <select name="users" onchange="getData(this.value)">
            <option value="">Välj en användare </option>
            <option value="dilan">Dilan Z</option>
            <option value="skurk">Skurk B</option>
            <option value="asd">Asd A</option>
        </select>
    </form><br>  


     <!-- Tilläggsdata -->
    <div id="ajaxData"> Här kommer tilläggsinformation om användaren</div>

</article>


