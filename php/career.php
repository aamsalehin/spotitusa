<?php
include "db.php";
if (!$_POST) exit;
if (isset($_POST['apply'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $cEmail = $_POST['c_email'];
    $cContact = $_POST['c_contact'];
    $cEducation = $_POST['c_education'];
    $cPosition = $_POST['c_position'];
    $cCurrentPosition = $_POST['c_current-position'];
    $cSalary = $_POST['c_salary'];
    $cCv = $_FILES['c_cv']['name'];
    $cCvTmp = $_FILES['c_cv']['tmp_name'];
    move_uploaded_file($cCvTmp, "../cv/" . $cCv);
    $query = "INSERT INTO career(fname,lname,email,contact,education,position,current_position,salary,cv) ";
    $query .= "VALUES('{$firstName}','{$lastName}','{$cEmail}','{$cContact}','{$cEducation}','{$cPosition}','{$cCurrentPosition}','{$cSalary}','{$cCv}')";
    $add_career = mysqli_query($connection, $query);
    if (!$add_career) {
        echo mysqli_error($connection);
    } else {
        header("Location: /success.html");
    }
}