<?php

function sortStartTime($a, $b)
{ 
	if($a['starttime'] == $b['starttime'])
	  return 0;
	 
	return ($a['starttime'] > $b['starttime']) ? +1 : -1;
}
?>