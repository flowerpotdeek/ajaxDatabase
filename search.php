<?php

$firstname = "";
$lastname = "";
$sql = "";

if (isset($_POST['searchfirstname']))
{
$firstname = $_POST['search'];
$sql = "Select * from userinfo where firstname='" .$firstname . "';";
}
elseif (isset($_POST['searchlastname']))
{
$lastname =  $_POST['search'];
$sql = "Select * from userinfo where lastname='" .$lastname . "';";
}

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


$query = mysqli_query($connection, $sql);
if ($query){
    //Fetch rows if successful
    echo " <table><thead>
    <tr>
    <th>First name</th>
    <th>Last name</th>
    <th>Email </th>
    <th>Gender</th>
    <th>Character name</th>
    <th>Main Class</th>
    </tr>
    </thead><tbody>";
    while ($row = mysqli_fetch_row($query)){
        printf("<tr>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
            <td>%s</td>
        </tr>"
            , $row[1], $row[2], $row[3], $row[5], $row[6], $row[7]);
    }
    echo " </tbody></table>  ";
    mysqli_free_result($query);
    mysqli_close($connection);
    }
    else {
        echo "mysql_query error - couldn't insert to table";
    }



?>