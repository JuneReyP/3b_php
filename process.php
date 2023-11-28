<?php
include 'conn.php';

// add data
if (isset($_POST['add'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    // INSERT INTO table_name (column1, column2, column3, ...)VALUES (value1, value2, value3, ...);

    $insertData = $conn->prepare("INSERT INTO personal_info(fname, lname, address, age) VALUES(?, ?, ?, ?)");
    $insertData->execute([$fname, $lname, $address, $age]);

    $msg = "Data Inserted";
    header("Location: index.php?msg=$msg");
} else {

    $msg = "Something went wrong!";
    header("Location: index.php?msg = $msg");
}

// update data
if (isset($_POST['update'])) {
    $userID = $_POST['userID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $age = $_POST['age'];

    $updateUser = $conn->prepare("UPDATE personal_info SET fname = ?, lname = ?, address = ?, age = ? WHERE p_id = ?");
    $updateUser->execute([
        $fname,
        $lname,
        $address,
        $age,
        $userID
    ]);

    $msg = "User updated";
    header("Location: index.php?msg=$msg");
}

// delete data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM personal_info WHERE p_id = ?");
    $delete->execute([$id]);

    $msg = "User deleted!";
    header("Location: index.php?msg=$msg");
}

//add user
if (isset($_POST['register'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    if ($pass1 == $pass2) {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);

        $insert_user = $conn->prepare("INSERT INTO users(user_fname, user_lname,user_email, user_pass) VALUES(?, ?, ?, ?)");
        $insert_user->execute([
            $fname,
            $lname,
            $email,
            $hash
        ]);

        $msg = "User Created!";
        header("Location: register.php?msg=$msg");
    }else{
        $msg = "Password do not match";
        header("Location: register.php?msg=$msg");
    }
}

// logout
if(isset($_GET['logout'])){
    session_start();
    unset($_SESSION['logged_in']);
    unset($_SESSION['u_id']);

    header("location: login.php");
}
