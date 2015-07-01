<?php
error_reporting(0);
	
	$conexion = new mysqli('localhost','root','','agimpacts',3306);
    if (mysqli_connect_errno()) {
        printf("The conexion to the server failed: %s\n", mysqli_connect_error());
    exit();
    }
    
    function validateMail(){
        // should bring the first and last name, the instute name, the region of the institute and leave open the region of research interest
    }
    
    function regions(){
        // bring the regions for institute, and for research interest
    }
    
    function saveForm(){
        // This function saves or updates the form with the fields email, first and last name, institute name, regions institute, regions research and intended use of data
        
    }
    
    
?>