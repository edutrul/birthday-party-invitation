<?php

require '../src/claviska/SimpleImage.php';

// redirect('https://us02web.zoom.us/j/9327563790');

function redirect($url) {
    ob_start();
    header('Location: '.$url);
    ob_end_flush();
    die();
}

// Ignore notices
error_reporting(E_ALL & ~E_NOTICE);

$font_file = [
  'regular' => __DIR__ . '/fonts/minecraft/minecraft-font-2.ttf',
];

$texts = [
  'invitation_to' => [
    'text' => !empty($_GET['name']) ? $_GET['name'] : 'Soy Axel',
    'options' => [
      'fontFile' => $font_file['regular'],
      'size' => 37,
      'xOffset' => 228,
      'yOffset' => -187
    ]
  ]
];

try {
  // Create a new SimpleImage object
  $image = new \claviska\SimpleImage();

  // Manipulate it
  $image
    ->fromFile('invitacion.jpg')
    ->text($texts['invitation_to']['text'], $texts['invitation_to']['options']);
  // It is homepage.
  if (!isset($_GET['name'])) {
    alert("Fue una gran FIESTA. GRACIAS POR VENIR A MI CUMPLE. TE QUIERO MUCHO!!");
  }
  // Name to write and just download.
  if (!empty($_GET['name']) && isset($_GET['download'])) {
    $image->toDownload('invitacion_' . $_GET['name'] . '.png');
  }
  // Display invitation
  else {
    $image_uri = $image->toDataUri();
    print '<img class="img-invitation" src="' . $image_uri . '">';
  }


} catch(Exception $err) {
  // Handle errors
  echo $err->getMessage();
}


function alert($msg) {
  echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>
  <style>
    body {
      background-color: black;
      cursor: pointer;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }
  </style>

<?php
