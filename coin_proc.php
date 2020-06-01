<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'all_coins';

// Table's primary key
$primaryKey = 'id_0';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes



$columns = array(
    array( 'db' => 'coinid', 'dt' => 'id' ),
    array( 'db' => 'mint',  'dt' => 'mint' ),
    array( 'db' => 'typeid',   'dt' => 'type' ),
    array( 'db' => 'obvdie',     'dt' => 'obverse' ),
    array( 'db' => 'revdie',     'dt' => 'reverse' ),
    array( 'db' => 'weight',     'dt' => 'weight' ),
    array( 'db' => 'rotation',     'dt' => 'rotation' ),
    array( 'db' => 'size',     'dt' => 'size' ),
    array( 'db' => 'material',     'dt' => 'materials' ),
    array( 'db' => 'denom',     'dt' => 'denomenation' ),
    array( 'db' => 'title',     'dt' => 'title' ),
    array( 'db' => 'notes',     'dt' => 'notes' ),
    array( 'db' => 'obvdieexample',     'dt' => 'obvdieexample' ),
    array( 'db' => 'revdieexample',     'dt' => 'revdieexample' )

);

// SQL server connection information
$sql_details = array(
    'user' => 'ryan',
    'pass' => '',
    'db'   => 'ancient',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( 'ssp.class.psql.php' );

echo json_encode(
  SSP::simple( $_POST, $sql_details, $table, $primaryKey, $columns )
);
