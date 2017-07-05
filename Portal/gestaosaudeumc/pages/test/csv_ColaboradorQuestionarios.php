<?php


// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'),';','"');

// fetch the data
$db = mysqli_connect('localhost','root','','u262445656_dbgs')
		or die ('Could not connect to the database server' . mysqli_connect_error());
	mysqli_set_charset( $db, 'utf8' );

$sql = "SELECT NOME,CPF FROM usuarios";
$rows = $db->query($sql);

// loop over the rows, outputting them
while ($row = $rows->fetch_assoc()){
	//fputcsv($output, $row);
	fputcsv($output,$row,';','"');

} 
?>