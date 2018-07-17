<?php
include('../init.php');

if(isset($_POST['delete_post'])){
	$Delete=$db->query("DELETE FROM posts WHERE id=".$_POST['delete_post']);
}

if(isset($_POST['delete_cat'])){
    $Delete=$db->query("DELETE FROM categories WHERE id=".$_POST['delete_cat']);
}

if(isset($_POST['delete_word'])){
    $Delete=$db->query("DELETE FROM words WHERE id=".$_POST['delete_word']);
}