<?php 
$db = mysqli_connect("localhost", "root", "", "userdb", 3307);

if (!$db){
    die("Unable to connect database");
}

if(isset($_POST["name"], $_POST["email"], $_POST["phone"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    $addDetailsQuery = "INSERT INTO my_data(name, email, phone) VALUES(?, ?, ?)";
    $stmt = $db->prepare($addDetailsQuery);

    if($stmt) {
        $stmt->bind_param("sss", $name, $email, $phone);
        if($stmt->execute()) {
            header("Location: index.php"); // Redirect after successful submission
            exit;
        } else {
            echo "Error: Unable to execute the query.";
        }
    } else {
        echo "Error: Unable to prepare the statement.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="create.css">
</head>
<body>
    <h1>Add Details</h1>
    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" required><br>
        <div class="btn-con">
            <button class="button submit-btn-bg" type="submit">Submit</button>
            <button class="button cancel-btn-bg"><a class="anchor-element" href="index.php">Cancel</a></button>
        </div>
    </form>
</body>
</html>
