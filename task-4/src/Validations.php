<?php 

class Validations {
    public function validate_email(string $email):bool 
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    public function validate_password(string $password):bool 
    {
        if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*W).*$#", $password )){
            return true;
        } else {
            $this->err_message['password'] = "Password must meet this standard: Include Number, Uppercase, Lowercase letter and greater than 8 characters.";
            return false;
        }
    }
}