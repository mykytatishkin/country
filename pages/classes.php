<?php

//id, name, capital, population, flag
class Country{
    public $id = "";
    public $name = "";
    public $capital = "";
    public $population = "";
    public $flag = "";

    function __construct($name, $capital, $population, $flag, $id = 0){
        $this->name = $name;
        $this->capital = $capital;
        $this->population = $population;
        $this->flag = $flag;
        $this->id = $id;
    }
}

//PDO
class DbHelper{
    public static function connect(
        $host = 'localhost:3306',
        $user = 'root',
        $password = '123456',
        $database = 'country'
    ){
        $connectionString = 'mysql:host='. $host .';dbname='. $database .';charset=utf8;';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8'
        ];
        try{    
            $pdo = new PDO($connectionString, $user, $password, $options);
            return $pdo;
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            return false;
        }
    }
}

class CountryRepository{

    //id, name, capital, population, flag
    //[1, ukraine, kyiv, 40000, flag ]    
    //[2, usa, Wsh, 40000, flag]
    //[3, uk, London, 40000, flag]

    static function getCountries(){
        $countries = [];
        $db = DbHelper::connect();
        $ps = $db->prepare('select * from country');
        $ps->execute();
        while($row = $ps->fetch()){
            $countries[] = new Country($row['name'],$row['capital'],$row['population'],$row['flag'],$row['id'],);
        }
        return $countries;
    }

    static function addCountry(Country $country){

        try{    
            $db = DbHelper::connect();
            $query = 'insert into country (name, capital, population, flag) values (:name, :capital, :population, :flag)';
            $ps = $db->prepare($query);
            $params = [
                'name'=>$country->name, 
                'capital'=>$country->capital, 
                'population'=>$country->population, 
                'flag'=>$country->flag
            ];
            $ps->execute($params);
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            return false;
        }
    }

    static function getFlag($id){
        //select flag from country where id = id
        $db = DbHelper::connect();
        $ps = $db->prepare('select flag from country where id = ?');
        $ps->execute([$id]);
        $row = $ps->fetch();
        if(!$row){
            return false;
        }
        return $row['flag'];
    }

    static function addPicture($countryid, $data){
        try{    
            $db = DbHelper::connect();
            $query = 'insert into picture (countryid, image_data) values (:countryid, :image_data)';
            $ps = $db->prepare($query);
            $params = [
                'countryid'=>$countryid, 
                'image_data'=>$data 
            ];
            $ps->execute($params);
        }
        catch(PDOException $ex){
            echo $ex->getMessage();
            return false;
        }
    }
}


?>