<?php

/**
 * @file
 * Provide views data for diff.module.
 */

/**
 * Implements hook_views_data().
 */
function ad_entity_views_views_data() {
  $data = [];

  $data['views']['ad_entity_views'] = [
    'title' => t('Ad entity'),
    'help' => t('Shows ads among views results.'),
    'area' => [
      'id' => 'ad_entity_views',
    ],
  ];

  return $data;
}
