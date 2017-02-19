<?php require('formLogic.php'); ?>

<!DOCTYPE html>
<html>
<head>

	<title>Bill Splitter Application</title>
	<meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet'>
	<link href='https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css' rel='stylesheet'>
	<link href='css/main.css' rel='stylesheet'>


</head>
<body>
   
    <div class="container">
        <div class='page-header'>
            <h1>Bill Splitter</h1>        
        </div>

        <form id="myForm" method='POST' action='index.php' class="form-horizontal">
            <div class="form-group">
                <label for='split' class='control-label col-sm-2'>Split # of ways? <span class="asterisk">*</span></label>
                <div class='col-sm-10'>
                    <input type='text' name='split' required id='split' value='<?=$form->prefill('split')?>'>
                </div>
            </div>
            <div class="form-group">
                <label for='tab' class='control-label col-sm-2'>Total Tab? <span class="asterisk">*</span> </label>
                <div class='col-sm-10'>
                    <input type='text' name='tab' required id='tab' value='<?=$form->prefill('tab')?>'>
                </div>
            </div>
            <div class="form-group">
                <label for='service' class='control-label col-sm-2'>How is the service?    </label>
                <div class='col-sm-10'>
                    <select name="service" id="service">

                        <option value='0.2' <?php if($service == '0.2') echo 'SELECTED'?>>Good -> 20% Tip
                        </option>
                        <option value='0.15' <?php if($service == '0.15') echo 'SELECTED'?>>Satisfactory -> 15% Tip
                        </option>
                        <option value='0.10' <?php if($service == '0.10') echo 'SELECTED'?>>Poor -> 10% Tip
                        </option>
                    </select> 
                </div>
            </div>

            <div class='form-group'>
                <div class='col-sm-offset-2 col-sm-10'>
                    <div class='checkbox'>
                        <label><input type='checkbox' name='round' <?php   if($form->isChosen('round')) echo 'CHECKED' ?>> Round up</label>
                    </div>
                </div>
            </div>
            <div class="form-group"> 
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary btn-small">Calculate</button>
                </div>
            </div>


            <div class='row'>
                <?php if($errors): ?>

                    <div class='alert alert-danger'>
                        <ul>
                            <?php foreach($errors as $error): ?>
                                <li><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                <?php elseif($form->isSubmitted()): ?>

                    <?php if(!empty($tabPerPerson)): ?>
                        <div class="alert alert-success">
                            Everybody owes $<?php echo $tabPerPerson; ?>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>

        </form>
    </div>
</body>
</html>