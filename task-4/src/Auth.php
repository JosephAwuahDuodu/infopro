<?php

class Auth extends DBConn {
    
    

    public function signup(string $email, string $password ): bool
    {
        // validate user inputs
        try {

            $validate = new Validations;

            $validate->validate_email($email);
            $validate->validate_password($password);

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