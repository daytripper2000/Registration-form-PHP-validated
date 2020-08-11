<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <!-- Ryan Lucas doc -->
        <title>Sign Up to our Mailing List! Session 6 redisplaying Forms</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style type="text/css">
        	span {
        		color: red;
        	}
        </style>
    </head>
    <body>
<!-- Ryan Lucas session 6 work web programming with PHP -->
<?php
        include 'functions.php';
        $form_is_submitted = false;
        $errors_dectected = false; 
        $clean = array(); // formerly $data array
        $errors = array();

        
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
                $errors['UserName'] =  $userName .  " $userName is not a valid username";
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
                $errors['Email'] = $email . ' is not a valid Email ';
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
            // Check box
        if (isset($_POST['readTerms'])) {
            $trimmed = trim($_POST['readTerms']);
            $readTerms = htmlentities($trimmed);
            if (validTerms($readTerms)) {
                $clean['Terms'] = $readTerms;
                echo "<p>Read terms : " . htmlentities($readTerms) . "</p>";
            } else {
             $errors['Terms'] = $readTerms . ' is not valid';
             echo "<p>you must agree to our terms and conditions</p>";
             } 
        } else {
            echo "<p> No terms submission </p>";
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
            echo '<p>Submit Status Request : ' . $html . '</p>';
        } else {
            echo '<p>Submit Status : not submitted </p>';
        }


        
        // this foreach iterates the array and displays the keys and values
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


       if (empty($errors)) {
           echo "<p>The errors array is empty, there are no errors, all fields <b>PASSED</b></p>";
       } else {
            echo "<p>There were some <b>ERRORS</b>, here they are</p>";
            foreach ($errors as $key => $value) {
                echo '<p> Contents of Errors  array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
                
            }
       }

        if (empty($clean)) { 
            echo "The valid data array is <b>EMPTY</b> <b>NO FIELDS PASSED Validation</b>";
        } else {
            echo "<p>List of fields that <b>PASSED VALIDATION</b> and the data entered</p>";
            foreach ($clean as $key => $value) {
                echo '<p> Contents of Valid Data array Key is: ' . $key . ' and value: ' . htmlentities($value) . '</p>';
            }
          }
       

    
  ?>           

            	
    	<?php $self = htmlentities($_SERVER['PHP_SELF']); 
        ?>
        <script type="text/javascript">
        </script>
        <h1>Sign Up to Our Mailing List!</h1>
        <form action="<?php echo $self; ?>" method="post">
            <fieldset>
			<legend>Sign Up</legend>
                <div>
                    <label for="name">Full Name</label>
                    <input type="text" name="userName" id="name" 
						value="<?php           
	                    if (isset($clean['UserName'])) {
	                        $userName = htmlentities($clean['UserName']);
	                        } else {
	                        $userName = '';
	                    } 
	                        echo htmlentities($userName); ?>"/> 

		     			 <?php
		     			 	if (isset($errors['UserName'])) {
		     			 		echo "<span>Error invalid name</span>";
		     			 	}
		     			  ?> 
		     			 <!-- below php old code is for the span error displays on page load though is the problem -->	                        	
                       <!-- <?php if($userName == '') { 
                        // echo "<span>Error invalid name</span>";   
                            }?>  -->
                </div>
                <div>            
                    <label for="email">Email</label>
                    <input type="text" name="userEmail" id="email" 

	                    value="<?php if (isset($clean['Email'])) {
	        			$email = $clean['Email'];
	        			} else {
	        			$email = '';
		     			 } echo htmlentities($email); ?>" />
		     			 
		     			 <?php
		     			 	if (isset($errors['Email'])) {
		     			 		echo "<span>Error invalid email</span>";

		     			 	}
		     			  ?>
		     			 
		     			 <!-- below old php code is for the span error -->
		     			 <!-- <?php if ($email == '') { 
		     			 	// echo "<span>Error invalid email</span>";
		     			 } ?> -->

                </div>
                <div> 

                	<?php $selected = "selected" ?>           
                    <label for="format">Mail format</label>
                    <select name="mailFormat" id="format">
                        <option value="plain" 
                        <?php if ($_POST['mailFormat'] =="plain") {
                        	echo htmlentities('selected="selected"');
                        } 
                         ?> >Plain text</option>
                        <option value="html"  <?php if($_POST['mailFormat'] =="html") {
                        	echo htmlentities('selected="selected"');
                        } ?> >HTML</option>
                        <!-- unsure about this dropdown menu thing -->

                        
                    </select>
                </div>

                <?php $ticked = "checked=yes"; ?>
                <div>            
                    <input type="checkbox" name="readTerms" id="checkbox"  value="yes" <?php if (isset($_POST['readTerms'])) {
                        echo htmlentities($ticked);
                          } ?> /> 
                    <label for="checkbox">Tick this box to confirm you have read our <a href="#">terms and conditions</a></label>
                </div>
                <div>
                    <input type="hidden" name="ref" value="A5treats3645W1LD" />
                </div>                
                <div>            
                    <input type="submit" name="submitbtn" value="Submit" />
                </div>
            </fieldset>
        </form>
       
    </body>
</html>
