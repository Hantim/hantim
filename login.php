<?php
$username=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST['submit'])!='') {
    if($username==''|| $password==''){
        echo "Please fill the empty field";
    }else{
        $dbh=new PDO('pgsql:host=localhost;port=5432;dbname=mydb;','postgres','uNjUDY0q');
        $dbh->beginTransaction();
        $search=$dbh->query("select username,password from users where username='$username'");
        $row=$search->fetch(PDO::FETCH_ASSOC);
        if($row['password']===$password){
                echo "Welcome $username!";
        }else{
            echo "wrong login/password";
        }
        $dbh->commit();
    }
}
$dbh=null;
