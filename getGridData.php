<?php 
define('DB_HOST', 'localhost');
define('DB_NAME', 'testing_db');
define('DB_USER','root');
define('DB_PASSWORD','root');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) $sidx =1; // connect to the database
$result = mysql_query("SELECT COUNT(*) AS count FROM employees");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) { 
$total_pages = ceil($count/$limit);
//$total_pages = ceil($count/1);
} else {
$total_pages = 0; 
} if ($page > $total_pages) 
$page=$total_pages; 
$start = $limit*$page - $limit; // do not put $limit*($page - 1) 
$SQL = "SELECT * from employees ORDER BY $sidx $sord LIMIT $start , $limit"; 
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());

$responce = new stdClass();
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count; 
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) { 
$responce->rows[$i]['id']=$row['EmployeeID'];
$responce->rows[$i]['cell']=array($row['EmployeeID'], $row['LastName'], $row['FirstName'], $row['BirthDate'], utf8_encode($row['Address']), $row['City'], $row['Region'], $row['Country'],""); $i++;
} 
echo json_encode($responce);

exit;
?>