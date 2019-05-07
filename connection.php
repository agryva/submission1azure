<?php
$serverName = "irvandevv.database.windows.net";
$database = "dicodingirvan";
$uid = 'agryva';
$pwd = 'AzureBandung12';

$connectionInfo = array("UID" => $uid,
    "PWD" => $pwd,
    "Database" => $database);

$conn = sqlsrv_connect( $serverName, $connectionInfo);
//$tsql = "SELECT * from dbo.barang";
//
///* Execute the query. */
//
//$stmt = sqlsrv_query( $conn, $tsql);
//
//if ( $stmt )
//{
//    echo "Statement executed.<br>\n";
//}
//else
//{
//    echo "Error in statement execution.\n";
//    die( print_r( sqlsrv_errors(), true));
//}
//
//sqlsrv_free_stmt( $stmt);
//sqlsrv_close( $conn);

?>