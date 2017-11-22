<?php
 
class db {
 
    public $host = "localhost"; //host name
    public $user = "root";//database user name
    public $password = "bhea@123";//database password if set  
    public $database = "loginform_php"; //database name
    public $con;
 
    public function Connect() {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
 
        if (mysqli_errno($this->con)) {
            echo 'Error: ' . mysqli_connect_error();
            exit();
        }
    }
 
    public function Disconnect() {
        mysqli_close($this->con);
    }
 
    /**
     * ExecuteQuery function
     * @param string $sql Proivde your sql statements here.
     * @param int $type 1:Select, 2:Insert, 3:Update
     * @return boolean
     */
    public function ExecuteQuery($sql, $type = 1) {
        $returnData;
        try {
            $sql = str_replace("''", "null", $sql);
            $this->Connect();
            //$sql = mysqli_escape_string($this->con, $sql);
            $data = mysqli_query($this->con, $sql);
 
            if ($type == 1) {
                $returnData = $data;
            }
            if ($type == 2) {
                $returnData = mysqli_insert_id($this->con);
            }
            if ($type == 3) {
                $returnData = mysqli_affected_rows($this->con);
            }
 
            $this->Disconnect();
        } catch (Exception $exe) {
            $returnData = FALSE;
        }
        return $returnData;
    }
 
}
?>
