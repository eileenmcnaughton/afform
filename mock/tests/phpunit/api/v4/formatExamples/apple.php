<?php

return [
  'html' => '<strong>New text!</strong>',
  'pretty' => "<strong>New text!</strong>\n",
  'shallow' => [
    ['#tag' => 'strong', '#markup' => 'New text!'],
  ],
  'deep' => [
    ['#tag' => 'strong', '#children' => [['#text' => 'New text!']]],
  ],
];
