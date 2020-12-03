<?php
session_start();
if ($_SESSION['connecte']) {
    header("location: ../Pages/".$_SESSION['secu'].".php");
    exit;
}