<?php
    session_start();
    
    require 'db_connect.php';

    function validate(){
        global $conn;
        return mysqli_real_escape_string($conn, $inputData);
    }
    
    function getALL($tableName){
        global $conn;
        $table = validate($tableName);
        $query = "SELECT * FROM $table";
        $result=mysqli_query($conn,$query);
        return $result;
    }

    function getUser($email){
        // global $conn;
        $sql = "SELECT id, name, password FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
    }

    function productInfo(){
        
        return($name);
    }
?>