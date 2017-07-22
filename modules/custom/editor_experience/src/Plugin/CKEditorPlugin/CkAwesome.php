<?php

/**
 * @file
 * Definition of \Drupal\editor_experience\Plugin\CKEditorPlugin\CkAwesome.
 */

namespace Drupal\editor_experience\Plugin\CKEditorPlugin;

use Drupal\ckeditor\CKEditorPluginBase;
use Drupal\editor\Entity\Editor;

/**
 * Defines the "CkAwesome" plugin.
 *
 * @CKEditorPlugin(
 *   id = "ckawesome",
 *   label = @Translation("CK AWESOME")
 * )
 */
class CKAwesome extends CKEditorPluginBase {

 /**
 * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::isInternal().
 */
public function isInternal() {
  return FALSE;
}


/**
 * Implements \Drupal\ckeditor\Plugin\CKEditorPluginInterface::getFile().
 */
public function getFile() {
  return libraries_get_path('ckawesome') . '/plugin.js';
}


/**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginButtonsInterface::getButtons().
   */
  public function getButtons() {
    return [
      'ckawesome' => [
        'label' => t('CK awsome'),
        'image' => libraries_get_path('ckawesome') . '/icons/ckawesome.png'
      ]
    ];
  }


//config.toolbar = [{ name: 'CKAwesome', items: ['Image', 'ckawesome']}];
//config.fontawesomePath = 'path/to/your/fontawesome/folder/font-awesome.min.css';

/**
   * Implements \Drupal\ckeditor\Plugin\CKEditorPluginButtonsInterface::getConfig().
   */
    public function getConfig(Editor $editor) {
            $settings = $editor->getSettings();

    // enableMore can only be supported if the Color Dialog plugin is present.
    $config = [
      'toolbar' => array('name'=> 'CKAwesome'),
      'fontawesomePath' => true,
    ];

    if (!empty($settings['plugins']['colorbutton']['colors'])) {
      $config['colorButton_colors'] = $settings['plugins']['colorbutton']['colors'];
    }

    return $config;

  }


}