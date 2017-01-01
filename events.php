<?php

       // constructor
           require_once 'include/DB_Connect.php';
        // connecting to database
        $db = new Db_Connect();
        $conn = $db->connect();
$data = json_decode(file_get_contents("php://input"),true);
      $stmt = $conn->prepare("INSERT INTO users(userid,usertoken) VALUES(?,?)");
        $stmt->bind_param("ss", $data['userId'],$data['userToken']);
       echo $data['userToken'];
      echo base64_decode($_GET['flockValidationToken']);
        $result = $stmt->execute();
        $stmt->close();
  http_response_code(200);
    exit(0);
 
   
?>