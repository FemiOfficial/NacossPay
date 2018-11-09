<?php
include_once("res/connect.php");
  include_once("res/session.php");
include_once("res/functions.php");
              if(isset($_POST['matric_number'])){
                 $matric_number = $_POST['matric_number'];
                 $session = $_POST['session'];

                 sql = "INSERT INTO payments (user_matric, payment_date, session) VALUES ('$matric_number', now(), '$session')";
                 $result = mysqli_query($conn, $sql);
              }
?>
