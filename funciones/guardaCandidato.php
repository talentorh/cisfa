<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","serverlocal","postulate");
    $result = mysqli_query($connection,$query);

    return $result;
}

function insertar($tblname,$form_data){
	$fields = $form_data;
	$sql="INSERT INTO ".$tblname."(".implode(',', $fields).")  VALUES(".implode("','", $form_data)."')";
	
	return db_query($sql);
}
		
	





?>