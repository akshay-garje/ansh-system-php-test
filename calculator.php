<?php
/**
 * { This is to give call to perform mathematical operation and will print the value }
 */
print_r(performMathematicalOperations($argv));

/**
 * { This function will calculate addition operation }
 *
 * @param      array  $arguments  These areguments are going to pass with the help of terminal
 *
 * @return     string  ( return value will be the answer for given expression or it will also show an error )
 */
function performMathematicalOperations( $arguments )
{
  	if(isset($arguments) && count($arguments)>1) {
	  	array_shift($arguments);
	  	$arr_delimeters = array(",","\n","n");
		$operation 		= isset($arguments[0]) ? strtolower($arguments[0]) : "" ;
		$str_values 	= isset($arguments[1]) ? $arguments[1] : "";
		if($operation=='add') {
			$answer = 0; 
			if($str_values!='') {
				// function call to get values for operation
				$arr_values = multipleExplode($arr_delimeters,$str_values);
				if(isset($arr_values) && count($arr_values)>0) {
					foreach ($arr_values as $key => $value) {
						if(is_numeric($value)){
							$answer += $value;
						}
					}
				}
			}
			return $answer."\n";
		}
		else {
			return $arguments[0]." is not a mathematical operation.\n";
		}
  	}
  	else {
		return "Please type 'add' and provide values for addition.\n";
  	}
}

/**
 * { This function is to convert string to array with multiple delimeters }
 *
 * @param      array   $delimiters  Delimeters will be an array of multiple delimeters
 * @param      string  $string      String is an entered/given expression.
 */
function multipleExplode($delimiters,$string) {
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $ready = str_replace("\\", "", $ready);
    if($ready!=$delimiters[0]){
    	$arr_explode = explode($delimiters[0], $ready);
    	return  $arr_explode;
    }
	return  array();
}

exit (0);
?>