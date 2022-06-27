<?php

class Auth extends DBConn {

    public function login(string $email, string $password ): bool
    {
        try {
            // validate user inputs
            $validate = new Validations;

            $validate->validate_email($email);
            $validate->validate_password($password);

            // insert into db
            $dBQueries = new DBQueries(email:$email, password: $password);
            $dBQueries->check_user_existence();
            

        } catch (\Throwable $th) {
            return json_encode( [
                'status_code' => $this->err_code,
                'message' => $this->err_message,
            ] );
        }

    }

    public function allow_user_access(mixed $user_data): void
    {
        // prevent session fixation attack
        session_regenerate_id();

        // set username in the session
        $_SESSION['email'] = $user_data['email'];
        $_SESSION['user_id']  = $user_data['id'];

        // create sessions and redirect user to login page
        $this->redirect_to('homepage.php');

    }

    private function redirect_to($path): void
    {
        header("Location: $path");
        exit();
    }

    public function is_user_logged_in()
    {        
        return isset($_SESSION['email']);
    }

    public function logout(): void
    {
        if ($this->is_user_logged_in()) {
            unset($_SESSION['email'], $_SESSION['user_id']);
            session_destroy();
            $this->redirect_to('login.php');
        }
    }


}