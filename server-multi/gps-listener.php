<?php

// THIS IS ONLY A SAMPLE SCRIPT. PLEASE TWEAK IT TO YOUR NEEDS.
// IT COMES WITH NO WARRANTY WHATSOEVER. 

$file = "gps-lastcall.log"; // you might save in a database instead...
$timefile = "gps-history.log";

//$timefile1 = "gps-log-multi-001.txt";
//$timefile2 = "gps-log-multi-002.txt";
//$timefile3 = "gps-log-multi-003.txt";

//$userid = "000";

if (isset($_GET["lat"]) && preg_match("/^-?\d+\.\d+$/", $_GET["lat"])
    && isset($_GET["lon"]) && preg_match("/^-?\d+\.\d+$/", $_GET["lon"]) 
     ) {
     
     $fh = fopen($file, "w");
    if (!$fh) {
        header("HTTP/1.0 500 Internal Server Error");
        exit(print_r(error_get_last(), true));
    }
    fwrite($fh, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
     if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
        fwrite($fh, $_GET["t"]."_");
    }
     if (isset($_GET["id"]) && preg_match("/^\d+$/", $_GET["id"])) {
        fwrite($fh, $_GET["id"]);
    }    
   
    fclose($fh);
    // you should obviously do your own checks before this...
    echo "OK";
    
    ////////////////////////
    
    //create logfile - history of gps coordinates 
    
   $f2 = fopen($timefile, "a+");
	    if (!$f2) {
		header("HTTP/1.0 500 Internal Server Error");
		exit(print_r(error_get_last(), true));
	    }
	    fwrite($f2, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
	     if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
	        fwrite($f2, $_GET["t"]."_");
	    }
	    if (isset($_GET["id"]) && preg_match("/^\d+$/", $_GET["id"])) {
	        fwrite($f2, $_GET["id"].PHP_EOL);
	    }
	   
	    fclose($f2);
	    // you should obviously do your own checks before this...
	    
	    echo "\n: timefile1 OK"; 
    
    
    
    ///////////////////////
    
  //$userid = $_GET["id"];
    
    /////////////////////////////////
    
//~     if ($userid == "0")
//~     {
//~ 	    $f2 = fopen($timefile1, "a+");
//~ 	    if (!$f2) {
//~ 		header("HTTP/1.0 500 Internal Server Error");
//~ 		exit(print_r(error_get_last(), true));
//~ 	    }
//~ 	    fwrite($f2, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
//~ 	     if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
//~ 	        fwrite($f2, $_GET["t"]."_");
//~ 	    }
//~ 	    if (isset($_GET["id"]) && preg_match("/^\d+$/", $_GET["id"])) {
//~ 	        fwrite($f2, $_GET["id"].PHP_EOL);
//~ 	    }
//~ 	   
//~ 	    fclose($f2);
//~ 	    // you should obviously do your own checks before this...
//~ 	    
//~ 	    echo "\ntimefile1 OK";
//~     }
//~     
//~     if ($userid == "1")
//~     {
//~ 	    $f2 = fopen($timefile2, "a+");
//~ 	    if (!$f2) {
//~ 		header("HTTP/1.0 500 Internal Server Error");
//~ 		exit(print_r(error_get_last(), true));
//~ 	    }
//~ 	    fwrite($f2, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
//~ 	     if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
//~ 	        fwrite($f2, $_GET["t"]."_");
//~ 	    }
//~ 	    if (isset($_GET["id"]) && preg_match("/^\d+$/", $_GET["id"])) {
//~ 	        fwrite($f2, $_GET["id"].PHP_EOL);
//~ 	    }
//~ 	   
//~ 	    fclose($f2);
//~ 	    // you should obviously do your own checks before this...
//~ 	    
//~ 	    echo "\ntimefile2 OK";
//~     }
//~     
//~      if ($userid == "2")
//~     {
//~ 	    $f2 = fopen($timefile3, "a+");
//~ 	    if (!$f2) {
//~ 		header("HTTP/1.0 500 Internal Server Error");
//~ 		exit(print_r(error_get_last(), true));
//~ 	    }
//~ 	    fwrite($f2, date("Y-m-d H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]."_");
//~ 	     if (isset($_GET["t"]) && preg_match("/^\d+$/", $_GET["t"])) {
//~ 	        fwrite($f2, $_GET["t"]."_");
//~ 	    }
//~ 	    if (isset($_GET["id"]) && preg_match("/^\d+$/", $_GET["id"])) {
//~ 	        fwrite($f2, $_GET["id"].PHP_EOL);
//~ 	    }
//~ 	   
//~ 	    fclose($f2);
//~ 	    // you should obviously do your own checks before this...
//~ 	    
//~ 	    echo "\ntimefile3 OK";
//~     }
    
    
} elseif (isset($_GET["tracker"])) {
    // do whatever you want here...
    echo "OK";
} else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Please type this URL in the <a href="https://play.google.com/store/apps/details?id=fr.herverenault.selfhostedgpstracker">Self-Hosted GPS Tracker</a> Android app on your phone.';
}
