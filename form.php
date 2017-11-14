<?php
    $formdata = explode('&', $_POST['data']);
    parse_str( $_POST['data'], $values);

    $server = 'localhost';
    $username = 'dstead';
    $password = 'password';
    $dbname  = 'signup';

    $connection = mysqli_connect($server,$username,$password,$dbname);

    if (!$connection){
        echo "problem connecting";
    }
    else {
        echo "connected successfully";
    }

    $encryptedPassword = password_hash($values['password'],PASSWORD_DEFAULT);

    // foreach ($values as $key => $value) {
    //     echo " " . $key. " is " .$value . ", ";

    // }

    $sql = "Insert into userinfo (firstname,lastname,email,password,gender,charactername,mainclass)
    VALUES('" 
    .$values['firstname'] . "', '" 
    .$values['lastname'] . "', '" 
    .$values['email'] . "', '" 
    .$encryptedPassword . "', '" 
    .$values['gender'] . "', '" 
    .$values['charactername']. "', '" 
    .$values['mainclass']. "');";

    $query = mysqli_query($connection, $sql);
    if ($query){
        echo " 1 row inserted";
    }
    else {
        echo "mysql_query error - couldn't insert to table";
    }



?>