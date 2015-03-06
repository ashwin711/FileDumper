<?php

$dir = "/home/ashwin/Dev/filedumptest";

if (is_dir($dir."/store")) {
    if ($dh = opendir($dir."/store")) {
        while (($file = readdir($dh)) !== false) {
        	if(substr($file, 0, 1) != "."){
        		echo "\nfilename: ".$file."\n";
	            $first_eight_char = substr($file, 0, 8);
	            echo $first_eight_char."\n";
	            $timestamp = hexdec($first_eight_char);
	            echo $timestamp."\n";
	            $year = date("Y", $timestamp);
	            $month = date("m", $timestamp);
	            echo $year."\n".$month."\n";
	            if(($year < 2014) || ($year == 2014 && $month < 11)){
	            	rename($dir."/store/".$file, $dir."/oldstore/".$file);
	            	echo "Moved: $file\n";
	            }
        	}
        }
        closedir($dh);
    }
}

?>