<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="index.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optionally, you can include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <a class="button" href="create.php">Add New Record</a>
    <table>
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Contact-No</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $db = mysqli_connect("localhost", "root", "", "userdb", 3307);

            if (!$db){
              die("Unable to connect database");
            }

            $getDataQuery = "SELECT * FROM my_data";
            $stmt = $db->query($getDataQuery);

            while($row=$stmt->fetch_assoc()){
                echo "
                <tr>
                  <td>$row[name]</td>
                  <td>$row[email]</td>
                  <td>$row[phone]</td>
                  <td>
                    <a class='button edit-button' href='edit.php?name=$row[name]'>Edit</a>
                    <a type='button' href='delete.php?name=$row[name]' class='button delete-button'>Delete</a>
                  </td>
              </tr>";
            }
          ?>
        </tbody>
      </table>
      <!-- <script>
        function redirectToDelete(name){
          window.location.href = "delete.php?name=" + name;
        }
      </script> -->
      <!-- <a type='button' class='button delete-button' data-toggle='modal' data-target='.bd-example-modal-sm'>Delete</a>
                  <div class='modal fade bd-example-modal-sm' tabindex='-1' role='dialog' aria-labelledby='mySmallModalLabel' aria-hidden='true'>
                  <div class='modal-dialog modal-sm'>
                  <div class='modal-content modal-con'>
                    <p style='text-align:center'>Are you sure to delete this.</p>
                    <a class='button' onclick='redirectToDelete(\"$row[name]\")'>Yes</a>
                  </div>
                  </div>
                  </div> -->
</body>
</html>