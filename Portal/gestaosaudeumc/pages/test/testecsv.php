<?php
// The data from Eternal Oblivion is an object, always
$values = (array) fetchDataFromEternalOblivion($userId, $limit = 1000);

// ----- fputcsv (slow)
// The code of @Alain Tiemblo is the best implementation
ob_start();
$csv = fopen("php://output", 'w');
fputcsv($csv, array_keys(reset($values)));
foreach ($values as $row) {
    fputcsv($csv, $row);
}
fclose($csv);
return ob_get_clean();

// ----- implode (slow, but file size is smaller)
$csv = implode(",", array_keys(reset($values))) . PHP_EOL;
foreach ($values as $row) {
    $csv .= '"' . implode('","', $row) . '"' . PHP_EOL;
}
return $csv;
// ----- concatenation (fast, file size is smaller)
// We can use one implode for the headers =D
$csv = implode(",", array_keys(reset($values))) . PHP_EOL;
$i = 1;
// This is less flexible, but we have more control over the formatting
foreach ($values as $row) {
    $csv .= '"' . $row['id'] . '",';
    $csv .= '"' . $row['name'] . '",';
    $csv .= '"' . date('d-m-Y', strtotime($row['date'])) . '",';
    $csv .= '"' . ($row['pet_name'] ?: '-' ) . '",';
    $csv .= PHP_EOL;
}
return $csv; ?>