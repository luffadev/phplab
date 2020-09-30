<html>

<head>
    <title>รายชื่อนักศึกษา</title>
</head>

<body>
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
    // while ($row = $mysqli_statement->fetch_array()) {
    //     echo $row["stuid"] . ' ' . $row["firstname"] . ' ' . $row["lastname"] . '<br>';
    // }

    ?>
    <a href="insert.php">เพิ่มนักศึกษาใหม่</a>
    <table width="650" border="1">
        <tr>
            <th width="91">
                <div align="center">Student ID </div>
            </th>
            <th width="98">
                <div align="center">Name </div>
            </th>
            <th width="198">
                <div align="center">Mobile </div>
            </th>
            <th width="50">
                <div align="center">Edit </div>
            </th>
            <th width="80">
                <div align="center">Delete </div>
            </th>
        </tr>
        <?php
        while ($result = $mysqli_statement->fetch_array()) {
        ?>
            <tr>
                <td>
                    <div align="center"><?php echo $result["stuid"]; ?></div>
                </td>
                <td><?php echo $result["firstname"] . ' ' . $result["lastname"]; ?></td>
                <td>
                    <div align="center"><?php echo $result["mobile"]; ?></div>
                </td>
                <td align="center"><a href="update.php?StuID=<?php echo $result["stuid"]; ?>">Edit</a></td>
                <td align="center"><a href="delete.php?StuID=<?php echo $result["stuid"]; ?>">Delete</a></td>
            </tr>
        <?php
        }
        ?>
    </table>
    <?php
    $mysqli_statement->close();
    $mysqli->close();
    ?>
</body>

</html>