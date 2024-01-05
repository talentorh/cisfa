<?php 
function db_query($query) {
    $connection = mysqli_connect("localhost","root","","proveedor");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname, $field, $usuario){

	$sql = "delete from ".$tblname." where ".$field."=".$usuario."";
	
	return db_query($sql);
}


?>