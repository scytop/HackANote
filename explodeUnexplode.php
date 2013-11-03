<?
php

function explodeString($rawGroupString, &$groups)
{
//figure out how to pull so that you get the string in the format "000000000,000000001,000000002," etc
$groups = explode(",", $rawGroupString);
}
function dickbutt($v1, $v2)
{
	return $v1 . "," . $v2;
}
function unexplodeString($groupArray)
{
	if(strlen($toBecomeString) > 0){
		//Creates the string in the format "000000000,000000001,000000002,"
		$toBecomeString = array_reduce($groupArray, "dickbutt");
		$toBecomeString = $toBecomeString . ".";
		$toBecomeString = substr($toBecomeString, 1);
		}
	return $toBecomeString;
}



?>