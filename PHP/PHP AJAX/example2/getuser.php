<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>

<body>

    <?php
        $q = intval($_GET['q']);

        $con = mysqli_connect('localhost','root','root','mydb');
        if (!$con) {
            die('Could not connect: ' . mysqli_error($con));
        }

        mysqli_select_db($con,"ajax_demo");
        $sql="SELECT * FROM user WHERE id = '".$q."'";
        $result = mysqli_query($con,$sql) or die( "bad query".mysqli_error( $con ) );
        echo "****";
        print_r($result);
        echo "****";
       
        echo "<table>
        <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th>Hometown</th>
        <th>Job</th>
        </tr>";
        while($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['firstname'] . "</td>";
            echo "<td>" . $row['lastname'] . "</td>";
            echo "<td>" . $row['age'] . "</td>";
            echo "<td>" . $row['hometown'] . "</td>";
            echo "<td>" . $row['job'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        mysqli_free_result( $result );
        mysqli_close($con);
    ?>
</body>

</html>