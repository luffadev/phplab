 <?php
    $host = "db";
    $username = "root";
    $password = "me12345678";

    $database = 'phpproject';

    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    $statement = "SELECT * FROM student";
    // // // OOP mysqli
    $mysqli_statement = $mysqli->query($statement);
    ?>
 <tbody>
     <?php
        $count = 0;
        while ($result = $mysqli_statement->fetch_array()) {
            $count += 1;
        ?>
         <tr>
             <td>
                 <?php echo $result["stuid"]; ?>
             </td>
             <td><?php echo $result["firstname"] . ' ' . $result["lastname"]; ?></td>
             <td>
                 <?php echo $result["mobile"]; ?>
             </td>
             <td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="<?php echo $count ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
             <td><a href="delete.php?StuID=<?php echo $result["stuid"]; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
         </tr>
     <?php
        }
        ?>
 </tbody>