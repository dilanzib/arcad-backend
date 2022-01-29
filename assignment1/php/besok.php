<?php 

//Öppna en fil, skapa en ny fil ifall filen inte finns
//Ifall något går fel (t.ex. rättigheter) svara med exit() eller die()

//Räknar helt vanligt antalet besökare på sidan
$myfiles = fopen("besok.txt", "r") or die("Kunde inte öpna filen!");
$innehall = (int)fread($myfiles, filesize("antalbesok.txt")); //Läs in antalet besökare från loggen
$besokare = $innehall +1 ; //Lägg till nuvarande besök



print("<p> Du är besökare nummer " . $besokare . "</p>");  
fclose($myfiles); //Kom ihåg att stänga filen

$myfiles = fopen("besok.txt", "w") or die("Kunde inte öpna filen!"); 
fwrite($myfiles, $besokare); //Skriv nya antalet besök till filen
fclose($myfiles); //Kom ihåg att stänga filen




//Räknar raderna till besökare (med ip o tid)
$myfile = fopen("antalbesok.txt", "a+") or die("Kunde inte öppna filen!");
$ip =  $_SERVER['REMOTE_ADDR'];
$date = date("d.m.Y  H:i");
fwrite($myfile, "<b>IP: </b>".$ip . " <b> Tid:</b> " . $date . "\n");
fclose($myfile);

$file = fopen("antalbesok.txt", "r");

$linecount = -1;
while(! feof($file)) {
  $line = fgets($file);
  echo $line. "<br>";
  $linecount++;  
}

fclose($file);



?>