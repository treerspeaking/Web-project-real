<?php
// Connect to your database (replace these credentials with your actual database credentials)
// require_once('Includes/db.inc.php');

try {
   include_once('../../Includes/db.inc.php');
    // Retrieve data from the "products" table in XML format
    $itemPerPage = 10;
    $page = ($_GET['page'] - 1) * $itemPerPage;
    $search = $_GET['search'];
    $sql = "SELECT * FROM HCMUT_BOOKSTORE.PRODUCT WHERE PRODUCTNAME LIKE '%$search%' LIMIT $itemPerPage OFFSET $page";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    // Set the content type to XML
    header('Content-Type: application/xml');

    // Start XML file and echo root node
    echo '<products>';

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Add each product as a new XML node
        echo '<product>';
        echo '<id>' . $row['PRODUCTID'] . '</id>';
        echo '<name>' . $row['PRODUCTNAME'] . '</name>';
        echo '<price>' . $row['PRICE'] . '</price>';
        echo '<productdescription>' . $row['PRODUCTDESCRIPTION'] . '</productdescription>';
        // Add other fields as needed
        echo '</product>';
    }

    // End XML file
    echo '</products>';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

// Close the database connection
$conn = null;
?>
