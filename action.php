<?php
$username=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST['submit'])!='') {
    if($username==''|| $password==''||$_POST['confirm_password']==''){
        echo "Please fill the empty field";
    }else{
        if($password!=$_POST['confirm_password']){
            echo "Password not match";
        }else{
            $dbh=new PDO('pgsql:host=localhost;port=5432;dbname=mydb;','postgres','uNjUDY0q');
            $dbh->beginTransaction();
            $dbh->exec("insert into users (username, password) values ('$username','$password')");
            $dbh->commit();
            echo "Welcome ".$username."!";
            }
        }
    }


$dbh=null;
