<?php
// <!-- Ryan Lucas session 6 work web programming with PHP -->

        $data = array();
        $errors = array();

        function userName($name) {
            if(strlen($name) > 150) {
                return false;
            }
            if ($name == '') {
                return false;
            }
            if (strpos($name, ' ') === false) {
                return false;
            }
            return true;
        }  

        function emailValid($email) {
            if ($email == '') {
                return false;
            }
            if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
                return false; 
            }
            return true;
        }

        function validTerms($terms) {
            if ($terms != 'yes') {
                return false;
            }
            if ($terms == '') {
                return false; 
            }
            return true;
        }


// function userName($name) {
//             if(strlen($name) > 150) {
//                 return false;
//             }
//             if ($name == '') {
//                 return false;
//             }
//             if (strpos($name, ' ') === false) {
//                 return false;
//             }
//             return true;
//         }  

//         function emailValid($email) {
//             if ($email == '') {
//                 return false;
//             }
//             if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
//                 return false; 
//             }
//             return true;
//         }

//         function validTerms($terms) {
//             if ($terms != 'yes') {
//                 return false;
//             }
//             if ($terms == '') {
//                 return false; 
//             }
//             return true;
//         }

        ?>


