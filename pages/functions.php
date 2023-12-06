<?php

$users = "pages/users.txt";

function register($login, $password){
    $login = trim($login);
    $password = trim($password);
    if(empty($login) || empty($password)){  
        return false;
    }
    global $users;

    $file = fopen($users, "r+");
    if(!$file){ 
        return false;
    }
    //check whether the $login is unique
    while( $line = fgets($file, 64)  ){
        $n = strpos($line,":");
        $name_from_file = substr($line, 0, $n);
        if($name_from_file == $login){
            return false;
        }
    }
    fclose($file);
    $file = fopen($users, "a");
    $line = $login.":".md5($password)."\r\n";
    fputs($file, $line);
    fclose($file);
    return true;
}

function login($login, $password){
    $login = trim($login);
    $password = trim($password);
    
    if(empty($login) || empty($password)){  
        return false;
    }
    global $users;

    $file = fopen($users, "r+");
    if(!$file){ 
        return false;
    }

    //echo $login." - ".md5($password)."<br/>";
    while( $line = fgets($file, 64) ){
        $n = strpos($line,":");
        $name_from_file = substr($line, 0, $n);
        $pass_from_file = substr($line, $n+1);
        //echo $name_from_file." : ".$pass_from_file."<br/>";
        //echo strcmp( $pass, $pass_from_file);
        //$pass = md5($password);
        if( $login == $name_from_file ) {
            return true;
        }
    }
    fclose($file);
    return false;
}



?>