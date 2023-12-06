<?php
include_once('classes.php');
$image = CountryRepository::getFlag($_GET['id']);
header("Content-Type: image/jpg");
echo $image;
?>