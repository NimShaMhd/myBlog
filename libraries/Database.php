<?php
    class Database{
        public $host=DB_HOST;
        public $user=DB_USER;
        public $pass=DB_PASS;
        public $db_name=DB_NAME;

        public $link;
        public $error;

        public function __construct(){
            $this->connect();
        }

        private function connect(){
            $this->link=new mysqli($this->host,$this->user,$this->pass,$this->db_name);
            if(!$this->link){
                $this->error="Connection failed".$this->link->connect_error;
                return false;
            }
        }
        public function select($query){
            $result=$this->link->query($query) or die($this->link->error.__LINE__);
            //validate
            if($result->num_rows>0){
               return $result;
            }else{
                return false;
            }
        }
        public function insert($query){
            $result=$this->link->query($query) or die($this->link->error.__LINE__);
            //validate
            if($insert_row){
                header("Location: index.php?msg=". urlencode('Record Added'));
                exit();
            }else{
                die("Error:(".$this->link->errno .")".$this->link->error);
            }
        }
        public function delete($query){
            $result=$this->link->query($query) or die($this->link->error.__LINE__);
            //validate
            if($delete_row){
                header("Location: index.php?msg=". urlencode('Record Deleted'));
                exit();
            }else{
                die("Error:(".$this->link->errno .")".$this->link->error);
            }
        }
        public function update($query){
            $result=$this->link->query($query) or die($this->link->error.__LINE__);
            //validate
            if($update_row){
                header("Location: index.php?msg=". urlencode('Record Updated'));
                exit();
            }else{
                die("Error:(".$this->link->errno .")".$this->link->error);
            }
        }

    }
?>
