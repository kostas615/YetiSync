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

class YetiSyncController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   */
  public function content() {

    return [
    '#type' => 'markup',
    '#markup' => $this->t('<h3>YetiSync</h3><br><br><p>Go to <i>Configuration > Development</i> and select the list of synchronized tables you want to see, or select <i>YetiSync Synchronize</i> to update your database.</p><br><br><h5>Developed by Konstantinos Chatzis<br>Email: kostaschatzis01@gmail.com</h5><br><br>')
  ];

  }

}
