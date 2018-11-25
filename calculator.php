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
function performMathematicalOperations($arguments) {
  	if(isset($arguments) && count($arguments)>1) {
	  	array_shift($arguments);
	  	$arr_delimeters = array(",","\n","n");
		$operation 		= isset($arguments[0]) ? strtolower($arguments[0]) : "" ;
		$str_values 	= isset($arguments[1]) ? $arguments[1] : "";
		if($operation=='add') {
			$arr_error_numbers = [];
			$answer = 0; 
			if($str_values!='') {
				$str_values = str_replace(";", ":", $str_values);
				// function call to get dynamic delimeter
				$delimiter  = generateDelimeterString($str_values);
				if($delimiter==false) {
					$delimiter = ",";	
				}else {
					array_push($arr_delimeters, $delimiter);
				}
				// function call to get values for operation
				$arr_values = multipleExplode($arr_delimeters,$str_values);
				if(isset($arr_values) && count($arr_values)>0) {
					foreach ($arr_values as $key => $value) {
						if(is_numeric($value) && $value < 0)
						{
							array_push($arr_error_numbers, $value);
						}elseif(is_numeric($value) && $value>=0) {
							$answer += $value;
						}
					}
				}
			}
			if(count($arr_error_numbers)>0) {
				return "Negative numbers (".implode(',', $arr_error_numbers).") not allowed.\n";
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

/**
 * { This function is to understand which is the dynamic delimeter for separation}
 *
 * @param      string   $string  The string
 *
 * @return     boolean/string  ( it will return the delimeter or false value )
 */
function generateDelimeterString($string)
{
	$pattern = "/^\\\\[\n\r;,.!@#$%%^&*()_+;:'|{}]\\\\/";
	if (preg_match($pattern, $string,$match)) {
		return str_replace("\\", "", $match[0]);
	}
	else {
		return 'not matched';
	}
}

exit (0);
?>