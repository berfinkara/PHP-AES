<?php
/**
 * Created by PhpStorm.
 * User: koryOzyurt
 * Date: 5/29/2018
 * Time: 1:51 PM
 */

class MySQLHandler{

    private $servername;
    private $username;
    private $password;
    private $databaseName;

    private $connection = null;

    function __construct($servername = "localhost", $username = "root", $password = null, $databaseName){
        $this ->setServername($servername);
        $this ->setUsername($username);
        $this ->setPassword($password);
        $this ->setDatabaseName($databaseName);
    }


    public function insertUser($username,$password){
        $this -> openConnection();

        $insertQuery = "INSERT INTO `user` (`id`,`username`,`password`) VALUES(null,'$username','$password')";
        if($this -> connection -> query($insertQuery) === TRUE){
            echo "</br> New record created successfully";
        }else{
            echo "</br> Error: " .$insertQuery ."</br>" .$this->connection->error;
        }

        $this -> closeConnection();
    }

    public function getAllUsers(){
        $this -> openConnection();

        $selectAllQuery = "SELECT * FROM `user`";
        $resultList = $this->connection->query($selectAllQuery);
        if($resultList -> num_rows > 0){
            while($row = $resultList -> fetch_assoc()){
                echo "</br>" ."id: " . $row["id"]. " - Username: " . $row["username"] . "- Password" . $row["password"];
            }
        }else{
            echo "There is no record in the database";
        }

        $this -> closeConnection();
    }

    public function openConnection(){
        $this -> connection = new mysqli($this ->getServername(), $this ->getUsername() , $this ->getPassword(), $this ->getDatabaseName());

        // Check is there any connection error
        if($this -> connection -> connect_error){
            echo "</br>Connection problem";
            die("</br>Connection failed: " .$this -> connection -> connect_error);
        }
        echo "</br>Connection has no problem";
    }

    public function closeConnection(){
        $this -> connection -> close();
    }







    /**
     * @return mixed
     */
    public function getDatabaseName()
    {
        return $this->databaseName;
    }

    /**
     * @param mixed $databaseName
     */
    public function setDatabaseName($databaseName)
    {
        $this->databaseName = $databaseName;
    }


    /**
     * @return string
     */
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * @param string $servername
     */
    public function setServername($servername)
    {
        $this->servername = $servername;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }



}