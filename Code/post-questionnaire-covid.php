<?php
session_start();
$flowmed = NEW SQLite3('../Ressources/Donnees/flowmed.db');
$_REQUEST['frisson_score'];
$_REQUEST['freq_respir_score'];
$_REQUEST['malaise_score'];
$_REQUEST['freq_card_score'];
$_REQUEST['gene_respir_score'];
$_REQUEST['temperature_score'];
$_REQUEST['saturation_score'];
$_REQUEST['nausea_score'];
$url = '../Ressources/Pages/'.$_SESSION['personne'].'.'.$_SESSION['secu'].'.php';
$flowmed = null;
header('location: '.$url);
exit;
?>