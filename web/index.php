<?php
require '../src/claviska/SimpleImage.php';

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
    ->text($texts['invitation_to']['text'], $texts['invitation_to']['options'])
    ->toScreen();

} catch(Exception $err) {
  // Handle errors
  echo $err->getMessage();
}
