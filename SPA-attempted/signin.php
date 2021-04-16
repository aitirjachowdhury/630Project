<?php
session_start();

  include "connectdb.php";
  $data = json_decode(file_get_contents("php://input"));

  $uname = $conn->real_escape_string($data->username);
  $psw = $conn->real_escape_string($data->password);
  $mode = $conn->real_escape_string($data->mode);

  $uname = strtolower(trim($uname));
  $psw = trim($psw);
  

  $sql = "SELECT salt, pswrd FROM ADM WHERE username = '$uname'";

                  try {
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      if($row["pswrd"] == md5($psw.$row["salt"])){
                        header("location: db.php");
                      }
                      else{
                        echo '<script>alert("Incorrect password.")</script>';
                      }
                    } else {
                      echo '<script>alert("Admin not found.")</script>';
                    }
                  } catch (Exception $e) {
                      echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                    }
                }
                else{
                  $sql = "SELECT userid, salt, pswrd FROM USERS WHERE username = '$uname'";

                  try {
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc();
                      if($row["pswrd"] == md5($psw.$row["salt"])){
                        $_SESSION['loggedin'] = true;
                        $_SESSION['userid'] = $row["userid"];
                        $_SESSION['service'] = "";
                        header("location: main.php#!/home");
                      }
                      else{
                        echo '<script>alert("Incorrect password.")</script>';
                      }
                    } else {
                      echo '<script>alert("Username not found.")</script>';
                    }
                  } catch (Exception $e) {
                      echo "<h2> ERROR: " . $e->getMessage() . "</h2>";
                    }
              }
              $conn->close();
                        
?>
