<?php
// Connect to the database
    $db = mysqli_connect("localhost", "root", "", "userdb", 3307);

    if (!$db) {
        die("Unable to connect database");
    }


    $name = $_GET["name"];
    // Prepare and execute the DELETE query
    $deleteQuery = "DELETE FROM my_data WHERE name='$name'";
    echo $deleteQuery;
    $stmt = $db->query($deleteQuery);
    
    if ($stmt) {
        // Redirect back to index.php after successful deletion
        header("Location: index.php");
        exit;
    } else {
        echo "Error: Unable to delete the record.";
    }
?>;
