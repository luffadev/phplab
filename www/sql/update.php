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

    //  ประกาศตัวแปรขึ้นมารับค่าจาก url update.php?StuID=44013067
    $StuID = 0;

    //  ประกาศตัวแปรขึ้นมารับค่าจาก จาก form  update ข้อมูล
    $stuidErr = $firstnameErr = $lastnameErr = $mobileErr = "";
    $stuid = $firstname = $lastname = $mobile = "";

    //เชื่อมต่อฐานข้อมูล
    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = "";
        $lastname = "";
        $mobile = "";
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
        $stuid = $_POST["stuid"];
        if (empty($firstnameErr) || empty($lastnameErr) || empty($mobileErr)) {
            $sql = "UPDATE student SET 
        	firstname = '" . $firstname . "' ,
        	lastname = '" . $lastname . "' ,
        	mobile = '" . $mobile . "' 
        	WHERE stuid = " . $stuid;

            $sqlResult = $mysqli->query($sql);
            if ($sqlResult) {
                echo "Update success  ". "<a href='select.php'>รายชื่อนักศึกษา</a>";
            } else {
                echo "Update fail" . $sqlResult;
            }
            $sqlResult->close();
        }
    } else {
        if (isset($_GET["StuID"])) {
            $StuID = $_GET["StuID"];
        }
        $firstname = "";
        $lastname = "";
        $mobile = "";
        $statement = "select * from student where stuid = " . $StuID;
        // // OOP mysqli
        $mysqli_statement = $mysqli->query($statement);
        $result = $mysqli_statement->fetch_array();
        $stuid = $result["stuid"];
        $firstname = $result["firstname"];
        $lastname = $result["lastname"];
        $mobile = $result["mobile"];
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
                    <input type="hidden" name="stuid" value="<?php echo $stuid; ?>"><?php echo $stuid; ?>

                </td>
            </tr>
            <tr>
                <th width="120">Firtname</th>
                <td>
                    <input type="text" name="firstname" size="20" value="<?php echo $firstname; ?>">
                    <span class="error">* <?php echo $firstnameErr; ?></span>
                </td>
            </tr>
            <tr>
                <th width="120">Lastname</th>
                <td>
                    <input type="text" name="lastname" size="20" value="<?php echo $lastname; ?>">
                    <span class="error">* <?php echo $lastnameErr; ?></span>
                </td>
            </tr>
            <tr>
                <th width="120">Mobile</th>
                <td>
                    <input type="text" name="mobile" size="20" value="<?php echo $mobile; ?>">
                    <span class="error">* <?php echo $mobileErr; ?></span>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="submit"> <a href="select.php">รายชื่อนักศึกษา</a>

    </form>
    <?php
    $mysqli_statement->close();
    $mysqli->close();
    ?>
</body>

</html>