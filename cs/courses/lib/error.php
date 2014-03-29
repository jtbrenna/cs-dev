<?php 
// Catches errors, display error if debugging, stop code for errors.
set_error_handler('errorHandler');
//############################################################################
function errorHandler ($errno, $errstr, $errfile, $errline, $errcontext){

	// If the error condition is E_USER_ERROR or above then abort
	switch ($errno){
      case E_USER_WARNING:
      case E_USER_NOTICE:
      case E_WARNING:
      case E_NOTICE:
      case E_CORE_WARNING:
      case E_COMPILE_WARNING:
				// skip all the above
         break;
      case E_USER_ERROR:
      case E_ERROR:
      case E_PARSE:
      case E_CORE_ERROR:
      case E_COMPILE_ERROR:
      	
				// handle all the above displaying message
         global $query;
				if($_SESSION["debug"]){
					if (eregi('^(sql)$', $errstr)) {
						$errstr = "SQL query: $query</p>\n MySQL error: mysql_errno() : mysql_error()";
         	} else {
            	$query = NULL;
					} // if
					echo "<p class='error'>Fatal Error: $errstr.</p>\n";
					echo "<p class='error'>Error in line $errline of file '$errfile'.</p>\n";
					echo "<p class='error'>Script: '{$_SERVER['PHP_SELF']}'.</p>\n";
				}
         
				echo "<h2>This system is temporarily unavailable</h2>\n";

				// Stop the system
				session_unset();
				session_destroy();
				die();
			default:
				break;
	} // switch
} // errorHandler
?>
