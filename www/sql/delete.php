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

    if (isset($_GET["StuID"])) {
        $StuID = $_GET["StuID"];

        $sql = "delete from student WHERE stuid = " . $StuID;

        $sqlResult = $mysqli->query($sql);
        if ($sqlResult) {
            echo "Delete success  " . "<a href='select.php'>รายชื่อนักศึกษา</a>";
        } else {
            echo "Delete fail" . $sql;
        }
        $sqlResult->close();
    }

    $mysqli_statement->close();
    $mysqli->close();
    ?>
</body>

</html>