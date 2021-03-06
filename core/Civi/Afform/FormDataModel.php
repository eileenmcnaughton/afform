<?php

namespace Civi\Afform;

/**
 * Class FormDataModel
 * @package Civi\Afform
 *
 * The FormDataModel examines a form and determines the list of entities/fields
 * which are used by the form.
 */
class FormDataModel {

  /**
   * @var array
   *   Ex: $entities['spouse']['type'] = 'Contact';
   */
  protected $entities;

  /**
   * Gets entity metadata and all fields from the form
   *
   * @param array $layout
   *   The root element of the layout, in shallow/deep format.
   * @return static
   *   Parsed summary of the entities used in a given form.
   */
  public static function create($layout) {
    $root = AHQ::makeRoot($layout);
    $entities = array_column(AHQ::getTags($root, 'af-entity'), NULL, 'name');
    foreach (array_keys($entities) as $entity) {
      $entities[$entity]['fields'] = [];
    }
    self::parseFields($root, $entities);

    $self = new static();
    $self->entities = $entities;
    return $self;
  }

  /**
   * @param array $element
   *   The root element of the layout, in shallow/deep format.
   * @param array $entities
   *   A list of entities, keyed by named.
   *   This will be updated to include 'fields'.
   *   Ex: $entities['spouse']['type'] = 'Contact';
   */
  protected static function parseFields($element, &$entities) {
    if (!isset($element['#children'])) {
      return;
    }
    foreach ($element['#children'] as $child) {
      if (is_string($child) || isset($child['#text'])) {
        //nothing
      }
      elseif (!empty($child['af-fieldset']) && !empty($child['#children'])) {
        $entities[$child['af-fieldset']]['fields'] = array_merge($entities[$child['af-fieldset']]['fields'] ?? [], AHQ::getTags($child, 'af-field'));
      }
      else {
        self::parseFields($child, $entities);
      }
    }
  }

  /**
   * @return array
   *   Ex: $entities['spouse']['type'] = 'Contact';
   */
  public function getEntities() {
    return $this->entities;
  }

}
