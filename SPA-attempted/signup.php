<?php
  include "connectdb.php";
  $data = json_decode(file_get_contents("php://input"));

  $uname = $conn->real_escape_string($data->username);
  $psw = $conn->real_escape_string($data->password);
  $fname = $conn->real_escape_string($data->fname);
  $lname = $conn->real_escape_string($data->lname);
  $number = $conn->real_escape_string($data->number);
  $address = $conn->real_escape_string($data->address);
  $email = $conn->real_escape_string($data->email);

  echo '<script>alert("Hello World")</script>' ;

  //Check data
  if(empty(trim($uname))){
    echo '<script>alert("Please enter a valid username.")</script>' ;
  } 
  else{
      $uname = trim($uname);
      if(empty(trim($psw)) || strlen(trim($psw)) < 8){
        echo '<script>alert("Please enter a valid password with 8 or more characters.")</script>' ;
      }
      else{
        $psw = trim($psw);
        if(empty(trim($fname))){
          echo '<script>alert("Please enter your first name.")</script>' ;
        } 
        else{
          $fname = trim($fname);
          if(empty(trim($lname))){
            echo '<script>alert("Please enter your last name.")</script>' ;
          } 
          else{
            $lname = trim($lname);

            if(empty(trim($number))){
              echo '<script>alert("Please enter a valid phone number.")</script>' ;
            }
            else{
              $number = trim($number);
              $number = str_replace("-", "", $number);
              if(empty(trim($address))){
                echo '<script>alert("Please enter a valid address.")</script>' ;
              } 
              else{
                $address = trim($address);

                if(empty(trim($email))){
                  echo '<script>alert("Please enter a valid email address.")</script>' ;
                }
                else{
                  $email = trim($email);
                  
                  // TO CREATE TABLE
                  $sql = "CREATE TABLE USERS(
                    userid int PRIMARY KEY AUTO_INCREMENT,
                    username VARCHAR(30) UNIQUE NOT NULL,
                    pswrd VARCHAR(50) NOT NULL,
                    salt VARCHAR(50) NOT NULL,
                    firstName text NOT NULL,
                    lastName text NOT NULL,
                    telNo VARCHAR(10) NOT NULL,
                    mailAddr VARCHAR(50)NOT NULL,
                    email VARCHAR(40) NOT NULL,
                    balance int DEFAULT 0)";

                    $conn->query($sql);
                    $salt = generateRandomSalt();
                    $psw = md5($psw.$salt);
                    $sql = "INSERT INTO USERS(username, pswrd, salt, firstName, lastName, telNo, mailAddr, email) VALUES ('$uname', '$psw', '$salt', '$fname', '$lname', '$number', '$address', '$email')";
                    $conn->query($sql);
                }}}}}}}

  $conn->close();

  function generateRandomSalt(){
    return base64_encode(random_bytes(12));
  }     
?>
