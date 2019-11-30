<?php

return [
  'html' => '<div class="af-block"><strong>  New text!</strong><strong class="af-text"> No whitespace! </strong><af-field name="do_not_sms" defn="{label: \'Do not do any of the emailing\'}" /></div>',
  'pretty' => '<div class="af-block">
  <strong>  New text!</strong>
  <strong class="af-text">No whitespace!</strong>
  <af-field name="do_not_sms" defn="{label: \'Do not do any of the emailing\'}" />
</div>
',
  'stripped' => [
    [
      '#tag' => 'div',
      'class' => 'af-block',
      '#children' => [
        ['#tag' => 'strong', '#markup' => '  New text!'],
        ['#tag' => 'strong', 'class' => 'af-text', '#children' => [['#text' => 'No whitespace!']]],
        ['#tag' => 'af-field', 'name' => 'do_not_sms', 'defn' => "{label: 'Do not do any of the emailing'}"],
      ],
    ],
  ],
  'shallow' => [
    [
      '#tag' => 'div',
      'class' => 'af-block',
      '#children' => [
        ['#tag' => 'strong', '#markup' => '  New text!'],
        ['#tag' => 'strong', 'class' => 'af-text', '#children' => [['#text' => ' No whitespace! ']]],
        ['#tag' => 'af-field', 'name' => 'do_not_sms', 'defn' => "{label: 'Do not do any of the emailing'}"],
      ],
    ],
  ],
  'deep' => [
    [
      '#tag' => 'div',
      'class' => 'af-block',
      '#children' => [
        ['#tag' => 'strong', '#children' => [['#text' => '  New text!']]],
        ['#tag' => 'strong', 'class' => 'af-text', '#children' => [['#text' => ' No whitespace! ']]],
        ['#tag' => 'af-field', 'name' => 'do_not_sms', 'defn' => ['label' => 'Do not do any of the emailing']],
      ],
    ],
  ],
];
