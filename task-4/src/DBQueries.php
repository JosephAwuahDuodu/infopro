<?php

class DBQueries {
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function check_user_existence(): bool
    {
        $encrypt_password = $this->password;

        $dBConn = new DBConn();
        $conn = $dBConn->get_db_connection();
        $find_user =$conn->query("SELECT * FROM users WHERE email = '".$this->email."' AND password = '".$encrypt_password."' LIMIT ! ");  

        if ($find_user->num_rows > 0) {
            $user_data = $find_user->fetch_assoc();  

            $authorize = new Auth;
            $authorize->allow_user_access($user_data);
        } else {
            return false;
        }
        
        
    }


}