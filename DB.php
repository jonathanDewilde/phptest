<?php

require "vars.php";

class DB
{
  protected $dbh; //connection
  protected $query; // query result
  
  public function connect()
  {
    $this->dbh = mysql_connect(HOST,USERNAME,PASSWORD) or die(mysql_error());
    mysql_select_db(DATABASE) or die(mysql_error());
    
    
  
  }
  
  public function close()
  {
     mysql_close($this->dbh);
  }
  
  public function query($sql)
  {
  	try
  	{
  
     $this->query = mysql_query($sql);
    
  	}
  	catch (Exception $e) 	
  	{
    	print "Caught exception:" .   $e->getMessage();
	}
  	
	
  }
  
  public function fetch()
  {
  	if ($row = mysql_fetch_row($this->query)) {  		
           return $row;
        } else {
           print (mysql_error());
        }
  	
    //return mysql_fetch_row($this->query);	
  }
  
  public function CountRows($result)
  {
  	return mysql_num_row($result);
  }
  
  public function fetchArray()
  {
    return mysql_fetch_array($this->query);	
  }
  
}

?>