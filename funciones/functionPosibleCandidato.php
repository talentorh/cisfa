<?php 
function db_query($query) {
    $connection = mysqli_connect("localhost","root","serverlocal","postulate");
    $result = mysqli_query($connection,$query);

    return $result;
}

function select_id($tblname){
	$sql = "Select * from ".$tblname."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;

}
function delete($tblname, $field_id, $id_usuario){

	$sql = "delete from ".$tblname." where ".$field_id."=".$id_usuario."";
	
	return db_query($sql);
}
?>