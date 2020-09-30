<html>

<head>
    <title>รายชื่อนักศึกษา</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <?php
    $host = "db";
    $username = "root";
    $password = "me12345678";

    $database = 'phpproject';

    $mysqli = new mysqli($host, $username, $password, $database);

    //  ประกาศตัวแปรขึ้นมารับค่าจาก จาก form  update ข้อมูล
    $stuidErr = $firstnameErr = $lastnameErr = $mobileErr = "";
    $stuid = $firstname = $lastname = $mobile = "";

    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (empty($_POST["firstname"])) {
            $firstnameErr = "Firstname is required";
        } else {
            $firstname = test_input($_POST["firstname"]);
        }
        if (empty($_POST["lastname"])) {
            $lastnameErr = "Lastname is required";
        } else {
            $lastname = test_input($_POST["lastname"]);
        }
        if (empty($_POST["mobile"])) {
            $mobileErr = "Mobile is required";
        } else {
            $mobile = test_input($_POST["mobile"]);
        }
        if (empty($_POST["stuid"])) {
            $stuidErr = "Student ID is required";
        } else {
            $stuid = test_input($_POST["stuid"]);
        }
      //  $stuid = $_POST["stuid"];
        if (empty($stuidErr) && empty($firstnameErr) && empty($lastnameErr) && empty($mobileErr)) {
            $statement = "insert into student(stuid,firstname,lastname,mobile) 
                        values('" . $stuid . "','" . $firstname . "','" . $lastname . "','" . $mobile . "' )";

            // // OOP mysqli
            echo $statement;
            $mysqli_statement = $mysqli->query($statement);
            //$sqlResult = $mysqli->query($sql);
            if ($mysqli_statement) {
                echo "Insert success  " . "<a href='select.php'>รายชื่อนักศึกษา</a>";
            } else {
                echo "insert fail" . $mysqli_statement;
            }
        }else {

        }

    //$mysqli_statement->close();
   // $mysqli->close();
    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="frmAdd" method="post">
        <table width="284" border="1">
            <tr>
                <th width="120">Studen ID</th>
                <td width="238">
                    <input type="text" name="stuid">
                    <span class="error">*<?php echo $stuidErr; ?></span>
                </td>
            </tr>
            <tr>
                <th width="120">Firtname</th>
                <td>
                    <input type="text" name="firstname" size="20">
                    <span class="error">* <?php echo $firstnameErr; ?></span>
                </td>
            </tr>
            <tr>
                <th width="120">Lastname</th>
                <td>
                    <input type="text" name="lastname" size="20">
                    <span class="error">* <?php echo $lastnameErr; ?></span>
                </td>
            </tr>
            <tr>
                <th width="120">Mobile</th>
                <td>
                    <input type="text" name="mobile" size="20">
                    <span class="error">* <?php echo $mobileErr; ?></span>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="บันทึก"> <a href="select.php">รายชื่อนักศึกษา</a>

    </form>
    <?php
    // $mysqli_statement->close();
    // $mysqli->close();
    ?>
</body>

</html>