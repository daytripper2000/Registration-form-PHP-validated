<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <!-- Ryan Lucas 1 and 1 server doc -->
        <title>Sign Up to our Mailing List! Redisplaying Forms</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body>
<!-- Ryan Lucas web programming with PHP -->
<?php
        include 'functions/functions.php';
        $form_is_submitted = false;
        $errors_dectected = false; 
        $clean = array(); // formerly $data array
        $errors = array();

        if (isset($_POST['submitbtn'])) {
            # code...
        
        $form_is_submitted = true;
        // Process the form data here...
        // full name field
        if(isset($_POST['userName'])) {
            $trimmed = trim($_POST['userName']);
            $userName = htmlentities($trimmed);
            if (userName($userName)) {
                // $userName = $html;
                $clean['UserName'] = $userName;
                // echo "<p>you entered: htmlentities($userName) </p>";
            } else {
                $errors['UserName'] =  $userName .  " Is not a valid Full name";
                // echo "<p> Username invalid </p>";
              }
        } else {
            echo "<p> No submission </p>";
          } 
            // Email
        if (isset($_POST['userEmail'])) {
            $trimmed = trim($_POST['userEmail']);
            $email = htmlentities($trimmed);
            if (emailValid($email)) {
                $clean['Email'] = $email;
                // echo "<p>you entered $email</p>";
            } else {
                $errors['Email'] = $email . ' Is not a valid Email ';
                // echo "<p>Invalid email address</p>";
            }   
        } else {
            echo "<p>No submission</p>";
        }
            // Mail format
        $valid_choices = array('plain','html');
        if (isset($_POST['mailFormat'])) {
            $trimmed = trim($_POST['mailFormat']);
            $mailFormat = htmlentities($trimmed);
        
            if (in_array($mailFormat, $valid_choices)) {
                $clean['mailFormat'] = $mailFormat; 
                // echo "<p>Your choice was $mailFormat</p>";
            } else {
                $errors['mailFormat'] = $mailFormat . ' is not a valid format';
                echo "<p>Invalid mail format choice or error</p>";
            } 
        } else {
            echo "<p>Mail format not submitted</p>";
        }
            // Terms and conditions Check box
        if (isset($_POST['readTerms'])) {
            $trimmed = trim($_POST['readTerms']);
            $readTerms = htmlentities($trimmed);
            if (validTerms($readTerms)) {
                $clean['Terms'] = $readTerms;
                // debugging for terms
                //echo "<p>Read terms : " . htmlentities($readTerms) . "</p>";
            } else {
             $errors['Terms'] = $readTerms . ' is not valid';
             echo "<p>you must agree to our terms and conditions</p>";
             } 
        } else {
            $errors['Terms'] = ' Read terms';
            // debugging code below
            //echo "<p> No terms submission </p>";
          }

            // just toying around with hidden field in form
        if (isset($_POST['ref'])) {
            $html = htmlentities($_POST['ref']);
            // echo "<p> ref was : $html</p>";
        } else {
            // echo "no hidden ref";
        }

        if (isset($_POST['submitbtn'])) {
            $trimmed = trim($_POST['submitbtn']);
            $html = htmlentities($trimmed);
            // debugging below for submit button
            //echo '<p>Submit Status Request : ' . $html . '</p>';
        } else {
          // debugging for submit button
          //  echo '<p>Submit Status : not submitted </p>';
        }

    // CLEAN DATA VALIDATION FOR RE-DISPLAY IN FORM
        if (isset($clean['Terms'])) {
            $UserReadTerms = htmlentities($clean['Terms']);
        } else {
            $UserReadTerms = '';
        }

    // ERRORS SETTING THE FORM FIELD DATA
        if (isset($errors['Terms'])) {
            $ReadTermsError = htmlentities($errors['Terms']);
        } else {
            $ReadTermsError = '';
        }   
         
    } // closes isset form submit button and then boolean true

        if ($form_is_submitted === true && empty($errors)) {
            echo "No errors detected, thank you for submitting :) ";
         // VERY IMPORTANT ELSE BLOCK CONTAINS HTML FORM CODE
        } else {  

        // debugging this foreach iterates the array and displays the keys and values
        // if ($clean) {
        //     echo "<p><b>List of Fields that PASSED validation</b></p>";
        //     foreach ($clean as $key => $value) {
        //         echo '<p> Contents of Valid Data array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
        //     }
        // } 
        // if ($errors) {
        //     echo "<p><b>List of Fields that FAILED validation</b></p>";
        //     foreach($errors as $key => $value) {
        //         echo '<p> Contents of Errors  array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
        //     }
        // }


       // if (empty($errors)) {
       //   debugging code below 
       //      echo "<p>The errors array is empty, there are no errors, all fields <b>PASSED</b></p>"; 
       // } else {
       //      echo "<p style =color:red>Please correct the highlighted errors</p>";
       //      foreach ($errors as $key => $value) {
       //          echo '<p> Contents of Errors  array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
                
       //      }
       // }

        // if (empty($clean)) {
        //  debugging code below 
        //     echo "The valid data array is <b>EMPTY</b> <b>NO FIELDS PASSED Validation</b>";
        // } else {
        //    debugging code below
        //     echo "<p>List of fields that <b>PASSED VALIDATION</b> and the data entered</p>";
        //     foreach ($clean as $key => $value) {
        //         echo '<p> Contents of Valid Data array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
        //     }
        //   }
       

  ?>           


        <?php $self = htmlentities($_SERVER['PHP_SELF']); 
        ?>
        
        <h1>Sign Up to Our Mailing List!</h1>
      <div class="container"> 
        <form action="<?php echo $self; ?>" method="post">
            <fieldset>
            <legend>Sign Up</legend>
                <div class="row">
                  <div class="col-25">
                    <label for="name">Full Name</label>
                  </div>
                  <div class="col-75"> 
                    <input type="text" name="userName" required id="name" 
                        value="<?php           
                        if (isset($clean['UserName'])) {
                            $userName = htmlentities($clean['UserName']);
                            } else {
                            $userName = '';
                        } 
                            echo htmlentities($userName); ?>" /> </div> </div>

                         <?php
                            if (isset($errors['UserName'])) {
                                echo "<span>" .$errors['UserName'] . "</span>";
                            }
                           
                    
                            ?>  
                
                <div class="row">
                  <div class="col-25">   
                    <label for="email">Email</label>
                  </div>
                  <div class="col-75">  
                    <input type="text" name="userEmail" required id="email" 

                        value="<?php if (isset($clean['Email'])) {
                        $email = $clean['Email'];
                        } else {
                        $email = '';
                         } echo htmlentities($email); ?>" /> </div></div>
                         
                         <?php
                            if (isset($errors['Email'])) {
                                 echo "<span>" .$errors['Email'] . "</span>";

                            }
                          ?>
                         

                

                    
                <div class="row">
                  <div class="col-25">           
                    <label for="format">Mail format</label>
                  </div>
                  <div class="col-75">  
                    <select name="mailFormat" id="format">
                        <option value="plain" 
                        <?php if ($mailFormat =="plain") {
                            echo htmlentities('selected="selected"');
                        } 
                         ?> >Plain text</option>
                        <option value="html"  <?php if($mailFormat =="html") {
                            echo htmlentities('selected="selected"');
                        } ?> >HTML</option>
                    
                    </select>
                  </div>
                </div>
                

                
                <!-- <div class="row"> -->
                  <!-- <div class="col-25"> -->
                     <label for="checkbox">Tick this box to confirm you have<br /> read our <a href="#">terms and conditions</a></label>
                  <!-- </div> -->
                  <!-- <div class="col-75">               -->
                    <input type="checkbox"
                           name="readTerms"
                           id="checkbox"
                           value="yes" 
                           <?php if ($UserReadTerms == 'yes') {
                        echo htmlentities(" checked");
                          } ?> /> 
                  <!-- </div>  -->
                <!-- </div> -->

                    <?php if (isset($errors['Terms'])) { echo '<span>' . $ReadTermsError . '</span>';
                    } ?>
                    
                <div>
                    <input type="hidden" name="ref" value="A5treats3645W1LD" />
                </div>                
                  <div class="row">   
                    <input type="submit" name="submitbtn" value="Submit" />
                  </div>
                
            </fieldset>
        </form>
     </div> <!-- closes form container  -->
    <?php 
        } 
    ?>
       
    </body>
</html>
