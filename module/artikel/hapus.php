<?php
include_once '../../class/database.php'; // Include your database connection file
require('../../class/config.php');
// Check if 'id' is set in the URL parameters
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Create a new Database object
    $db = new Database("localhost", "root", "", "latihan1");

    // Use the database connection from the Database object
    $result = $db->query("DELETE FROM data_barang WHERE id_barang = '{$id}'");

    if (!$result) {
        // Handle errors if the query execution fails
        die('Error: ' . $db->getError());
    }

    // Close the database connection
    $db->closeConnection();

    // Redirect to index.php after successful deletion
    header('location: index.php');
} else {
    echo 'Invalid request. Please provide an ID.';
}
?>
