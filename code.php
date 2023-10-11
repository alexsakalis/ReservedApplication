<?php

session_start();
require 'database.php';

if(isset($_POST['delete-user']))
{
    $id = mysqli_real_escape_string($conn, $_POST['delete-user']);

    $query = "DELETE FROM users WHERE id = '$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User has been deleted successfully!";
        header("Location: admin_page.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User has not been deleted!";
        header("Location: admin_page.php");
        exit(0);
    }
}

if(isset($_POST['update-user']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $fullname = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $query = "UPDATE users SET full_name='$fullname', email='$email' WHERE id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User has been updated successfully!";
        header("Location: admin_page.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User has not been updated!";
        header("Location: admin_page.php");
        exit(0);
    }
    
}

if(isset($_POST['save-user']))
{
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $fullname = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);
    $query = "INSERT INTO users (id, full_name, email, password) VALUES('$id','$fullname', '$email', '$password')";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User has been saved successfully!";
        header("Location: admin_page.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User has not been saved!";
        header("Location: admin_page.php");
        exit(0);
    }
    
}


?>