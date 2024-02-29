<?php 
    $db = mysqli_connect("localhost", "root", "", "userdb", 3307);
    $name = $_GET["name"];

    if($name){
        $getQuery = "SELECT * FROM my_data WHERE name='$name'";
        $result = $db->query($getQuery);

         $row=$result->fetch_assoc();
            $name = $row["name"];
            $email = $row["email"];
            $phone = $row["phone"];

            // if (!empty($name) || !empty($email) || !empty($phone)){
                // $updateQuery = "UPDATE my_data 
                //                 SET email='$email', phone='$phone'
                //                 WHERE name='$name'";
            //     $stmt = $db->query($updateQuery);
            
            // } 
            if(isset($_POST["name"], $_POST["email"], $_POST["phone"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $phone = $_POST["phone"];
            
                $updateQuery = "UPDATE my_data 
                                SET name='$name', email='$email', phone='$phone'
                                WHERE name='$name'";
                $stmt = $db->query($updateQuery);
            
                if($stmt) {
                        header("Location: index.php"); // Redirect after successful submission
                        exit;
                } else {
                    echo "Error: Unable to prepare the statement.";
                }
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
        <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>" required><br>
        <label for="phone">Phone:</label><br>
        <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required><br>
        <div class="btn-con">
            <button class="button submit-btn-bg" type="submit">Submit</button>
            <button class="button cancel-btn-bg"><a class="anchor-element" href="index.php">Cancel</a></button>
        </div>
    </form>
</body>
</html>