<?php /* Make the actual connection to the database */

		/* creditional information for db_connect */
		include("/usr/local/uvm-inc/rerickso.inc");
		//include("rerickso.inc");
		$myDatabase = new mySqlDataBase(db_connect($databaseName));
?>
