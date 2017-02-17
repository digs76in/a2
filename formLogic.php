<?php

$split = '';
$splitErr = '';
$tab = '';
$tabErr = '';
$service = '';
$tip = '';
$tabWithTip = '';
$tabPerPerson ='';

if(isset($_POST['split'])) {
	$split = $_POST['split'];
     if (!preg_match("/^[0-9]*$/",$split)) {//regex to do a digit validation
      $splitErr = "Only digits allowed"; 
    }
}else{
    $splitErr = '';
}
if(isset($_POST['tab'])) {
	$tab = floatVal($_POST['tab']);
     if (!preg_match("/^[1-9]\d*(\.\d+)?$/",$tab)) {//regex to validate integers or decimal numbers
      $tabErr = "Only integers or decimal numbers allowed"; 
    }
}else{
    $tabErr = '';
}
if(isset($_POST['service'])) {
	$service = floatVal($_POST['service']);
    if(isset($_POST['round'])) {
        $tab = ceil($tab);
    }   
    $tip = floatVal($tab) * floatVal($service) ;
    $tabWithTip = floatVal($tab) + floatVal($tip) ;
    $tabPerPerson = floatVal($tabWithTip) / floatVal($split) ;
    $tabPerPerson = number_format($tabPerPerson, 2, '.', '');
}

