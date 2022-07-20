<?php
    class DB{
        private $connect = NULL;
        
        public function __construct(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "smhos";
            $this->connect = "";
            try{
                $this->connect = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connect->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
            }catch(PDOException $e){
                echo 'Error: ' . $e->getMessage();
            }  
        }

        //Start Insert
        public function tbl_insert($tblquery,$tblvalue = array()){ 
            try{
                $stmt = $this->connect->prepare($tblquery);
                $results = $stmt->execute($tblvalue);
                return $results; 
            }catch(PDOException $e){
                echo 'Insert Error: ' . $e->getMessage();
            }
        }
	      // End Insert

  
        //Start Select
        public function tbl_select($tblquery,$tblvalue = array()){ 
            try{
                $stmt = $this->connect->prepare($tblquery);
                $stmt->execute($tblvalue);  
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $results; 
            }catch(PDOException $e){
                echo 'Select Error: ' . $e->getMessage();
            }
        }
        //End Select

        //Start Update
        public function tbl_update($tblquery,$tblvalue = array()){ 
            try{
                $stmt = $this->connect->prepare($tblquery);
                $results = $stmt->execute($tblvalue);
                return $results; 
            }catch(PDOException $e){
                echo 'Update Error: ' . $e->getMessage();
            }
        }
	      //End Update

        //Start Delete
        public function tbl_delete($tblquery,$tblvalue = array()){ 
            try{
                $stmt = $this->connect->prepare($tblquery);
                $results = $stmt->execute($tblvalue);
                return $results; 
            } catch(PDOException $e) {
                echo 'Delete Error: ' . $e->getMessage();
            }
        }
        //End Delete
  
        //Encoding Password
        public function epass($epass){
            try{
                $epass = crypt($epass, '$5$3$');
                return $epass;
            }catch(PDOException $e){
                echo 'Error:' . $e->getMessage();
            }
        }
        //End Password Encoding
	
    }
?>
