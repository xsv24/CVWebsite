<?php
class DB{
    
    function __construct($host, $user, $pass, $db_name){
        $this->db = new mysqli($host, $user, $pass, $db_name);

        
        if($this->db->connect_error){
            die("Connection Failed");
            echo("Connection Failed");
        }
    }
    
    function __destruct(){
        $this->db->close();
    }

    function query($query){
        $query = $this->db->escape_string($query);
        $query_res = $this->db->query($query);
       
        return $this->format_res($query_res); 
    }
    
    public function format_res($result){
		$table = Array();
    	$n = 0;
    	while ($row = $result->fetch_assoc()) {
      		$table[$n] = $row;
      	    $n++;
   		}
   		$result->close();
    	return $table;
    }
    

} 