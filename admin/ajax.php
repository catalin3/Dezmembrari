<?php
include('../init.php');

if(isset($_POST['delete_oferta'])){
	$Delete=$db->query("DELETE FROM oferte WHERE id=".$_POST['delete_oferta']);
}

if(isset($_POST['delete_categoria'])){
    $Delete=$db->query("DELETE FROM categorii WHERE id=".$_POST['delete_categoria']);
}

if(isset($_POST['delete_piesa'])){
    $Delete=$db->query("DELETE FROM piese WHERE id=".$_POST['delete_piesa']);
}