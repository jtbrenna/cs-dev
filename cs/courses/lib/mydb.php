<?php
/* general database class for select, insert num rows */
class mySqlDatabase{
//############################################################################
	function mySqlDatabase($db){
		$this->_database = $db;
	}

//############################################################################
	/* returns the number of records that matched the query */
	function numRows($query) {
      $this->numrows   = 0;
			$rst = @mysql_query($query, $this->_database);
			if (!$query) {
				trigger_error("SQL", E_USER_ERROR);
	    	return NULL;
			}
			
			$this->numrows=mysql_num_rows($rst);
			
			mysql_free_result($rst);

      return $this->numrows;
  }

//############################################################################
	/* performs a select query and returns the array */
	function select($query) {
      $this->errors = array();
			$this->data_array = array();
								
			$rst = @mysql_query($query, $this->_database);
			if (!$query) {
			print "<p>ERROR: $query";
			die();
				trigger_error("SQL", E_USER_ERROR);
	    	return NULL;
			}
			
			$totalRecords=mysql_num_rows($rst);
			
			while ($row = mysql_fetch_assoc($rst)) {
         $this->data_array[] = $row;
      }
			mysql_free_result($rst);
   
      return $this->data_array;
  }

	
//############################################################################
	function insert($query){
      $this->errors = array();
			
			$result = @mysql_query($query, $this->_database);
			
      if (mysql_errno() <> 0) {
         if (mysql_errno() == 1062) {
            $this->errors[] = "A record already exists with this ID.";
         } else {
					print "<p>MYSQL ERROR Number: " . mysql_errno();
					print "<p>MYSQL Description: " . mysql_error();
				die();
         trigger_error("SQL", E_USER_ERROR);
         } // if
      } // if
			
			return true; 
   } // insertRecord
	
//############################################################################
		function update($query){
      $this->errors = array();
			
			$result = @mysql_query($query, $this->_database);
			
      if (mysql_errno() <> 0) {
         print "<p>MYSQL ERROR Number: " . mysql_errno();
				print "<p>MYSQL Description: " . mysql_error();
				die();
         trigger_error("SQL", E_USER_ERROR);
      } // if
			
			return; 
   } 
	
//############################################################################
	function delete($query){
      $this->errors = array();
			
			$result = @mysql_query($query, $this->_database);
      if (mysql_errno() <> 0) {
         print $query;
				die();
            trigger_error("SQL", E_USER_ERROR);
      }
			
			return; 
   }
//added
function myTables($databaseName){
	$sql="SHOW TABLES FROM $databaseName WHERE Tables_in_$databaseName  not like 'tbl%'";
	return $this->select($sql);
}

function numTables($databaseName){
	$allTables = mysql_list_tables ($databaseName);
	return mysql_num_rows ($allTables);
}
	
} // end class
	
?>
