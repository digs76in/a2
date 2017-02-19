<?php
require('Bill.php');
require('Form.php');


$split = '';

$tab = '';

$service = '';


$tabPerPerson ='';
$roundup = false;

$errors = [];

$form = new DWA\Form($_POST);

if($form->isSubmitted()) {
   
    $errors = $form->validate(
        [
            'split' => 'required|numeric',
            'tab' => 'required|floatTwoPoints',
            'service' => 'required',
           
        ]
    );
    if(!$errors){
        $split = $form->get('split'); # String
        $tab = $form->get('tab'); # String
        $service = $form->get('service'); # String    
        $roundUp = $form->isChosen('round'); # Boolean
        if( $roundUp)  $tab = ceil($tab);
        $bill = new Bill($split,$tab,$service,$roundup);
        $tabPerPerson = $bill->getTabPerPerson();
    }
        
}



