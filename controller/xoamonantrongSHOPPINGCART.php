<?php

    session_start();
    $id_monan = $_GET["maso"];
    unset($_SESSION["shoppingCart"][$id_monan]);
    header("Location: ../pages/viewCart.php");

?>