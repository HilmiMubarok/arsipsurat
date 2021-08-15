<?php
// require_once 'config.php';
/**

*@ Dynamic CRUD with PHP Data Object

*@ Author: Ariyal

*@ Author URI: https://www.rakepoint.com

*/

class DynamicCrud

{

    private $conn = "";

    private $servername = SERVER_NAME;

    private $username = USER_NAME;

    private $password = PASSWORD;

    private $dbname = DATABASE;

    public function __construct()

    {

        try {

            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

            // set the PDO error mode to exception

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return "Connected successfully";


        } catch (Exception $e) {

            return "Connection failed: " . $e->getMessage();

        }

    }

    public function insert($tablename, $arrayval){

        if(is_array($arrayval)):

        try {


            $array_ks = array_keys($arrayval);

            $array_ks_1 = implode(", ", $array_ks);


            $i=0;

            foreach ($arrayval as $key => $value) {

                $stmtVal[$i] = $value;

                $stmtParam[$i] = ":".$key;

                $i++;

            }


            $stmtParam_1 = implode(", ", $stmtParam);

            // prepare and bind

            $stmt = $this->conn->prepare("INSERT INTO $tablename ($array_ks_1) VALUES ($stmtParam_1)");


            foreach ($stmtParam as $key => $value) {

                $stmt->bindParam($value,$stmtVal[$key]);

            }


            $stmt->execute();

            return true;


        } catch (Exception $e) {

            echo $e . "<br>" . $e->getMessage();

        }

        endif;

    }

    public function delete($tablename, array $arrayval){

        try {


            $i = 0;

            foreach ($arrayval as $key => $value) {

                $expression[$i] = $key."='".$value."'";

            }


            $expression = implode(" AND ", $expression);


            $stmt = $this->conn->prepare("DELETE FROM $tablename WHERE $expression");

            $stmt->execute();

            return true;


        } catch (Exception $e) {

            echo $e . "<br>" . $e->getMessage();

        }

    }

    public function update($tablename, array $setvals, array $condition){

        try {


            $i = 0;

            foreach ($setvals as $key => $value) {

                $setExp[$i] = $key."='".$value."'";

                $i++;

            }


            $setExp = implode(", ", $setExp);


            $a = 0;


            foreach ($condition as $key => $value) {

                $setCondition[$a] = $key."='".$value."'";

                $a++;

            }


            $setCondition = implode(" AND ", $setCondition);


            $stmt = $this->conn->prepare("UPDATE $tablename SET $setExp WHERE $setCondition");

            $stmt->execute();

            return true;


        } catch (Exception $e) {

            echo $e->getMessage();

        }


    }

    public function fetchall($tablename, array $arrayval){

        try {


            $array_keys = implode(", ", $arrayval);


            $stmt = $this->conn->prepare("SELECT $array_keys FROM $tablename");

            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);

            return $result = $stmt->fetchAll();

        } catch (Exception $e) {

            echo $e->getMessage();

        }

    }

}

// $obj = new DynamicCrud();
//
// //inserting values
//
// $tablename = "users";
//
// $insertValues =  array("fullname"=>"Ariyal","username"=>"ariyal","password"=>"ariyalpassword","email"=>"ariyal@rakepoint.com");
//
// $obj->insert($tablename,$insertValues);
//
// //deleting row
//
// $deleteColumn = array("username"=>"rakeysharyal");
//
// $obj->delete($tablename,$deleteColumn);
//
// //update
//
// $condition = array('email'=>'ariyal@rakepoint.com','username'=>'ariyal');
//
// $setvals = array('email'=>'iariyal@rakepoint.com','username'=>'ariyal1','fullname'=>'Ariyal R');
//
// $obj->update($tablename,$setvals,$condition);
//
// //fetch all
//
// $results = $obj->fetchall($tablename,array('email','username','fullname'));
//
// print_r($results);
