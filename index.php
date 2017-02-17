<?php require('formLogic.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>A Form to Illustrate Validation using the jQuery Validation Plugin</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/main.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.2.2.min.js"
    type="text/javascript"></script>
    <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js">
    </script>
    <script type="text/javascript" src="js/form.js">
    </script>
   
   
</head>
<body>
    <div class="container">
        <form id="myForm" method="post">
            <fieldset>
                <legend>Bill Splitter</legend>
                <p>
                    <label for="split">Split how many ways? 
                        <span class="asterisk">*</span>
                    </label> 
                    <br/>
                    <input id="split" name="split" size="25" class="required digits" value="<?php if(isset($_POST['split'])) echo $_POST['split'] ?>"/> <span class="server_error"><?php echo $splitErr;?></span>
                </p>
                <p>
                    <label for="tab">How much was the tab? 
                        <span class="asterisk">*</span>
                    </label> 
                    <br/>
                    <input id="tab" name="tab" size="25" minlength="2" class="required number" value="<?php if(isset($_POST['tab'])) echo $_POST['tab'] ?>"/> <span class="server_error"><?php echo $tabErr;?></span>
                </p>
                <p>
                    <label for="service">How was the service?</label> 
                    <br/>
                    <select name="service" id="service">

                        <option value='0.2' <?php if($service == '0.2') echo 'SELECTED'?>>Good -> 20% Tip</option>
                        <option value='0.15' <?php if($service == '0.15') echo 'SELECTED'?>>Satisfactory -> 15% Tip</option>
                        <option value='0.10' <?php if($service == '0.10') echo 'SELECTED'?>>Poor -> 10% Tip</option>
                    </select> 
                </p>
                <p>
                    <label for="round">Round Up?</label> 
                    <br/>
                    <input type = "checkbox" name="round" id = "round" <?php if(isset($_POST['round'])) echo 'CHECKED'?> />Yes
                </p>
                <p>
                    <input class="submit" type="submit" value="Calculate"/> 
                </p>
            </fieldset> 
                               
        </form>
         
        <?php if(!empty($tabPerPerson)): ?>
        <div class="alert alert-success">
            Everybody owes $<?php echo $tabPerPerson; ?>
        </div>
        <?php endif; ?>
                
        
    </div>
</body>
</html>
