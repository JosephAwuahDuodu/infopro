<?php

class Auth extends DBConn {
    
    private function validate_email(string $email):bool 
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        return true;
    }

    private function validate_password(string $password):bool 
    {
        if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*W).*$#", $password )){
            return true;
        } else {
            $this->err_message['password'] = "Password must meet this standard: Include Number, Uppercase, Lowercase letter and greater than 8 characters.";
            return false;
        }
    }

    public function signup(string $email, string $password ): bool
    {
        // validate user inputs
        try {
            $this->validate_email($email);
            $this->validate_password($password);

            $dBQueries = new DBQueries(email:$email, password: $password);
            $dBQueries->insert_into_db();

        } catch (\Throwable $th) {
            return json_encode( [
                'status_code' => $this->err_code,
                'message' => $this->err_message,
            ] );
        }

        return false;
    }

}