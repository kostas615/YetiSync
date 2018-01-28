<?php
/**
* @file
*
* YetiSync - synchronize database controller.
*
* Author: Konstantinos Chatzis <kostaschatzis01@gmail.com>
*
* 27/01/2018
*/


namespace Drupal\yetisync\Controller;

use Drupal\Core\Controller\ControllerBase;

class YetiSyncUpdateController extends ControllerBase {

  /**
   * Display the markup.
   *
   * @return array
   */
  public function content() {
    $this->updateAccounts();
    $this->updateContacts();
    return $this->redirect('yetisync.content');
  }

  /**
    * Updates Accounts table
    */
  private function updateAccounts() {
    include_once (__DIR__ . '/../../yeti-api/api-get-json.php');
    $json = new \ApiGetJson;

    // Try fetching info, otherwise dont delete the old data.
    try {

      $result = $json->getAccounts();
      $accounts = $result->result->records;

      if (isset($accounts)) {

        $query = \Drupal::database()->delete('yetisync_accounts')
          ->execute();

        $id = 0;
        foreach ($accounts as $account) {
          $id = $id+1;
          $query = \Drupal::database()->insert('yetisync_accounts')
            ->fields([
              'id',
              'name',
              'phone',
              'email',
              'address'
            ])
            ->values(array(
              $id,
              $account->accountname,
              $account->phone,
              $account->email1,
              $account->addresslevel8a . ", " . $account->addresslevel7a . " " . $account->addresslevel5a . ", " . $account->addresslevel3a
            ))
            ->execute();
        }
      }

    }
    catch (\Exception $e){
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

  }

  /**
    * Updates Contacts table
    */
  private function updateContacts() {
    include_once (__DIR__ . '/../../yeti-api/api-get-json.php');
    $json = new \ApiGetJson;

    // Try fetching info, otherwise dont delete the old data.
    try {

      $result = $json->getContacts();
      $contacts = $result->result->records;

      if (isset($contacts)) {

        $query = \Drupal::database()->delete('yetisync_contacts')
          ->execute();

        $id = 0;
        foreach ($contacts as $contact) {
          $id = $id+1;
          $query = \Drupal::database()->insert('yetisync_contacts')
            ->fields([
              'id',
              'name',
              'phone',
              'email',
              'address'
            ])
            ->values(array(
              $id,
              $contact->lastname . " " . $contact->firstname,
              $contact->phone,
              $contact->email,
              $contact->addresslevel8a . ", " . $contact->addresslevel7a . " " . $contact->addresslevel5a . ", " . $contact->addresslevel3a
            ))
            ->execute();
        }
      }

    }
    catch (\Exception $e){
      echo 'Caught exception: ',  $e->getMessage(), "\n";
    }

  }


}
