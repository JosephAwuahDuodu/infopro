<?php

class DBQueries {
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function insert_into_db()
    {
        $encrypted_password = $this->password; // add a hashing algorithm / salt here
        $stmt = "INSERT INTO users (`email`, `password`) VALUES ($this->email, $encrypted_password)";

        try {
            $dBConn = new DBConn();
            $conn = $dBConn->get_db_connection();
            $perform_insert =$conn->query($stmt) or die($conn->error);
    
            return true;
        } catch (\Throwable $th) {
            return false;
        }

    }

    public function check_user_existence(): bool
    {
        $encrypt_password = $this->password;

        $dBConn = new DBConn();
        $conn = $dBConn->get_db_connection();
        $find_user =$conn->query("SELECT * FROM users WHERE email = '".$this->email."' AND password = '".$encrypt_password."'");  
        $user_data = $find_user->fetch_assoc();  
        
        return $find_user->num_rows ? true : false;
    }


}