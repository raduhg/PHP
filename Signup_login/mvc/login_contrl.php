<?php
declare(strict_types = 1);


 function is_input_empty(string $email, string $psw) 
{
    if (empty($email) || empty($psw)) {
        return true;
    } else {
         return false;
    }
}

function is_email_wrong(bool|array $results) //will accept boolean and string types
{
   if ($results) {
        return true;
   } else {
        return false;
   }
}

function is_psw_wrong(string $psw, string $hashedPsw)
{
   if (!password_verify($psw, $hashedPsw)) { //if passwords do NOT match
        return true;
   } else {
        return false;
   }
}