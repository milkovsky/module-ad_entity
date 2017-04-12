<?php

namespace Drupal\ad_entity\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;

/**
 * Plugin implementation of the 'ad_entity_tree_aggregation_context' formatter.
 *
 * @FieldFormatter(
 *   id = "ad_entity_tree_aggregation_context",
 *   label = @Translation("Aggregated context from taxonomy tree"),
 *   field_types = {
 *     "ad_entity_context"
 *   }
 * )
 */
class TreeAggregationContextFormatter extends ContextFormatterBase {

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    switch ($field_definition->getTargetEntityTypeId()) {
      case 'taxonomy_term':
        return TRUE;
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $element = [];

    /* TODO apply contexts.
    foreach ($items as $delta => $item) {
    }*/

    return $element;
  }

}