<?php

class JKDirStuff {
	public static function realpath($path){
	  $parts = explode('/', $path);

	  $nwparts = array();
	  foreach($parts as $i => $p){
	  	if ($p == '..'){
	  		if ( ($i == 0) || ($i == 1 && $parts[0] == '') ){
	  			return false; //cannot go up a directory from nothing
	  		}


	  		//print_r($nwparts);
	  		//delete previous segment

	  		if (count($nwparts) == 0){
	  			return false;
	  		}

	  		unset($nwparts[count($nwparts)-1]);
	  		//$nwparts = array_values($nwparts);
	  	}else if ($p == '.'){
	  		continue; //just skip this segment
	  	}else{
	  		//just add the segment
	  		$nwparts[] = $p;
	  	}
	  }

	  
	  return implode('/', $nwparts);
	}

	public static function updir($f){
	   //old method: return dirname($f).'/../'.basename($f);
	   $e = explode('/', $f);

	   if (count($e) === 1){
	   	 return false; //no where up to go 
	   }

	   unset($e[count($e)-2]);

	   $e = array_values($e);

	   if (count($e) === 1){
	   	  return $e[0];
	   }

	   return implode('/', $e);
	}
}
