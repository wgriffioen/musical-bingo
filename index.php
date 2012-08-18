<?php

error_reporting(E_ALL);

require 'cart.php';

if (!file_exists('songs.txt')) {
  die('File with songs not found');
}

$songs = explode("\n", file_get_contents('songs.txt'));
$numberOfCards = (isset($_GET['count'])) ? (int) $_GET['count'] : 0;
$carts = array();

for ($i = 1; $i <= $numberOfCards; $i++) {
  try {
    $cards[] = new Cart($songs);
  } catch (Exception $e) {
    echo $e->getMessage();
  }
}

include 'page.html.php';
