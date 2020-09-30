<html>

<head>
    <title>รายชื่อนักศึกษา</title>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/360e5c13ee.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {
            $().ready(function() {
                $.ajax({
                    type: "POST",
                    url: "db/query.php",
                    success: function(html) { // this happens after we get results
                        $("#results").show();
                        $("#results").append(html);
                    }
                });
            });
        });
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

    <input type="button" value="Add" />

    
    <table width="650" border="1" id="results">
        <tr>
            <th width="91">
                <div align="center">Studen ID </div>
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

    </table>

    <?php
    $mysqli_statement->close();
    $mysqli->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>