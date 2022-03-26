<?php

namespace Drupal\onform\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\node\Entity\Node;

/**
 * OnForm controller.
 */
class OnForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'on_form';
  }

  /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['description'] = [
      '#type' => 'item',
      '#markup' => $this->t('Some description text'),
    ];

  

$form['new_hire'] = array(
  '#type' => 'fieldset',
  '#title' => $this
    ->t('New Hire'),
);

$form['new_hire']['person_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#required' => TRUE,
    ];

$form['new_hire']['person_email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email'),
      '#required' => TRUE,
    ];

$form['new_hire']['person_phone'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone Number'),
      '#required' => TRUE,
    ];

$form['new_hire']['person_office'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Office'),
      '#required' => TRUE,
    ];

$form['new_hire']['person_gnumber'] = [
      '#type' => 'textfield',
      '#title' => $this->t('G Number'),
      '#required' => TRUE,
    ];



$form['lists'] = array(
  '#type' => 'fieldset',
  '#title' => $this
    ->t('Lists'),
);
$form['lists']['allstaff'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('All Staff'),
);
$form['lists']['sub_libs'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Subject Librarians - subjectlibrarians@furbo.gmu.edu'),
);
$form['lists']['libstaff'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Library Staff - libstaff@furbo.gmu.edu'),
);
$form['lists']['libcouncil'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Librarians Council - libcouncil@furbo.gmu.edu'),
);
$form['lists']['virtual'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Virtual Reference - virtual@furbo.gmu.edu'),
);


$form['webaccounts'] = array(
  '#type' => 'fieldset',
  '#title' => $this
    ->t('Web site accounts'),
);
$form['webaccounts']['intranet'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Intranet'),
);
$form['webaccounts']['libapps'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('LibApps'),
);
$form['webaccounts']['web_profile'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Fac/Staff Web Profile'),
);


$form['almaaccounts'] = array(
  '#type' => 'fieldset',
  '#title' => $this
    ->t('Alma profiles'),
);
$form['almaaccounts']['acquisitions'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Acquisitions Operator'),
);
$form['almaaccounts']['cataloger'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Cataloger'),
);
$form['almaaccounts']['reserves'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Reserves Operator '),
);
$form['almaaccounts']['mercer_staff'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Mercer Staff'),
);
$form['almaaccounts']['acl_staff'] = array(
  '#type' => 'checkbox',
  '#title' => $this
    ->t('Arlington Staff'),
);


   
    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];



    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;

  }

  /**
   * Validate the title and the checkbox of the form.
   *
   * @param array $form
   *   The form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

 
   

   

  }

  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    // Display the results
    // Call the Static Service Container wrapper
    // We should inject the messenger service, but its beyond the scope
    // of this example.
    $messenger = \Drupal::messenger();
 $messenger->addMessage('Submitted request for ' . $form_state->getValue('person_name'));


$almlists = "";

if ($form_state->getValue('acquisitions') ==1) {
$almlists = $almlists . "\n - Acquisitions Operator";
}
if ($form_state->getValue('cataloger') ==1) {
$almlists = $almlists . "\n - Cataloger";
}
if ($form_state->getValue('reserves') ==1) {
$almlists = $almlists . "\n - Reserves";
}
if ($form_state->getValue('mercer_staff') ==1) {
$almlists = $almlists . "\n - Mercer Staff";
}
if ($form_state->getValue('acl_staff') ==1) {
$almlists = $almlists . "\n - ACL Staff";
}


$webaccnts = "";
if ($form_state->getValue('intranet') ==1) {
$webaccnts = $webaccnts . "\n - Intranet";
}
if ($form_state->getValue('libapps') ==1) {
$webaccnts = $webaccnts . "\n - LibApps";
}
if ($form_state->getValue('web_profile') ==1) {
$webaccnts = $webaccnts . "\n - Fac/Staff Web Profile";
}




$elists = "";

if ($form_state->getValue('allstaff') ==1) {
$elists = $elists . "\n - All Staff";
}
if ($form_state->getValue('sub_libs') ==1) {
$elists = $elists . "\n - Subject Librarians";
}
if ($form_state->getValue('libstaff') ==1) {
$elists = $elists . "\n - Library Staff";
}
if ($form_state->getValue('virtual') ==1) {
$elists = $elists . "\n - Virtual Reference";
}
if ($form_state->getValue('libcouncil') ==1) {
$elists = $elists . "\n - Librarians Council";
}

if ($almlists != '') {

$my_ticket = Node::create(['type' => 'ticket']);
$my_ticket->set('title', $form_state->getValue('person_name') . ' - Alma Accounts');
$my_ticket->set('body', "\nAdd to Alma" . $almlists);
// $my_ticket->set('field_ticket_type', 'Account Creation');
$my_ticket->field_ticket_type->target_id = 4;	
$my_ticket->field_assigned_to->target_id = 7;
$my_ticket->enforceIsNew();
$my_ticket->save();

}

if ($webaccnts != '') {

$my_ticket = Node::create(['type' => 'ticket']);
$my_ticket->set('title', $form_state->getValue('person_name') . ' - Web Accounts');
$my_ticket->set('body', "\nAdd following accounts" . $webaccnts);
// $my_ticket->set('field_ticket_type', 'Account Creation');
$my_ticket->field_ticket_type->target_id = 4;	
$my_ticket->field_assigned_to->target_id = 6;
$my_ticket->enforceIsNew();
$my_ticket->save();

}


if ($elists != '') {

$elists = $elists . "\n\n";


$my_ticket = Node::create(['type' => 'ticket']);
$my_ticket->set('title', $form_state->getValue('person_name') . ' - Email Lists');
$my_ticket->set('body', "\nAdd to Email Lists" . $elists);
// $my_ticket->set('field_ticket_type', 'Account Creation');
$my_ticket->field_ticket_type->target_id = 4;	
$my_ticket->field_assigned_to->target_id = 5;
$my_ticket->enforceIsNew();
$my_ticket->save();
}



    // Redirect to home.
    $form_state->setRedirect('<front>');
  }

}
