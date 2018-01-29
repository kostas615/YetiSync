<?php
/**
* @file
*
* YetiSync - view database controller.
*
* Author: Konstantinos Chatzis <kostaschatzis01@gmail.com>
*
* 28/01/2018
*/

namespace Drupal\yetisync\Controller;

use Drupal\Core\Controller\ControllerBase;

class YetiSyncContactsController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   */
  public function content() {

    $result = \Drupal::database()->select('yetisync_contacts', 'n')
            ->fields(
              'n',
              array(
                'id',
                'name',
                'phone',
                'email',
                'address'
              ))
            ->execute()->fetchAllAssoc('id');

      $rows = array();
      foreach ($result as $row => $content) {
        $rows[] = array(
          'data' => array(
            $content->id,
            $content->name,
            $content->phone,
            $content->email,
            $content->address
          ));
      }

    $header = array('ID', t('Name'), t('Phone Number'), t('Email'), t('Address'));
    $output = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows
    );
    return $output;
  }

}
