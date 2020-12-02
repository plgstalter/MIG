<?php
$sexe = "Femme";
$date = '21/04/2000';
if ($sexe == "Homme") {
    $chaine = 'Né le ';
}
elseif ($sexe == "Femme") {
    $chaine = 'Née le ';
}
else {
    $chaine = 'Né.e le ';
}
echo  $chaine, $date;
?>