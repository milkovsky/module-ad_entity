<?php

namespace Drupal\ad_entity_views\Plugin\views\area;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityViewBuilderInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Plugin\views\area\AreaPluginBase;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Shows ads among views results.
 *
 * @ingroup views_area_handlers
 *
 * @ViewsArea("ad_entity_views")
 */
class AdEntityArea extends AreaPluginBase {

  /**
   * The storage of Display configs for Advertisement.
   *
   * @var \Drupal\Core\Entity\EntityStorageInterface
   */
  protected $adDisplayStorage;

  /**
   * The view builder for Display configs for Advertisement.
   *
   * @var \Drupal\Core\Entity\EntityViewBuilderInterface
   */
  protected $adDisplayViewBuilder;

  /**
   * Constructs a new Entity instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Entity\EntityStorageInterface $ad_display_storage
   *   The storage of Display configs for Advertisement.
   * @param \Drupal\Core\Entity\EntityViewBuilderInterface $ad_display_view_builder
   *   The view builder for Display configs for Advertisement.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityStorageInterface $ad_display_storage, EntityViewBuilderInterface $ad_display_view_builder) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->adDisplayStorage = $ad_display_storage;
    $this->adDisplayViewBuilder = $ad_display_view_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    $type_manager = $container->get('entity_type.manager');
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $type_manager->getStorage('ad_display'),
      $type_manager->getViewBuilder('ad_display')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    $options['ad_entity_display'] = ['default' => NULL];
    $options['ad_entity_position'] = ['default' => 0];

    return $options;
  }

  /**
   * {@inheritdoc}
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);

    $options = [];

    $ads = $this->adDisplayStorage->loadMultiple();
    /** @var \Drupal\ad_entity\Entity\AdDisplayInterface[] $ads */
    if ($ads) {
      foreach ($ads as $ad_name => $ad) {
        $options[$ad_name] = $ad->label();
      }
    }

    $form['ad_entity_display'] = [
      '#title' => $this->t('Ad display'),
      '#type' => 'select',
      '#default_value' => $this->options['ad_entity_display'],
      '#options' => $options,
    ];

    $form['ad_entity_position'] = [
      '#title' => $this->t('Ad position'),
      '#despricption' => $this->t('Ad position in the rows list starting from 0. If negative, it starts counting from the end of the list.'),
      '#type' => 'number',
      '#default_value' => $this->options['ad_entity_position'],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function render($empty = FALSE) {
    if (!$empty || !empty($this->options['empty'])) {
      $ad = $this->adDisplayStorage->load($this->options['ad_entity_display']);
      $build = $this->adDisplayViewBuilder->view($ad);
      return $build;
    }
  }

}
