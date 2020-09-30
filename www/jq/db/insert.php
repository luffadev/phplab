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
        } else {
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