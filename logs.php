
<?php
$conn=mysqli_connect("localhost","root","","cdcms_db")or die("connection");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logs Table</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0; /* Set a background color */
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff; /* Set a background color for the container */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a shadow effect */
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ddd; /* Add border to the table */
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2; /* Add a background color for header cells */
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Add alternate background color for even rows */
        }

        tr:hover {
            background-color: #f0f0f0; /* Add background color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Logs Table</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Name</th>
                    <th>Action</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    // Connect to your database here
                    $conn = mysqli_connect("localhost", "root", "", "cdcms_db") or die("connection");

                    // Sample query to fetch data from the logs table
                    $query = "SELECT id, child_fullname, action, cdate FROM logs";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['child_fullname'] . "</td>";
                            echo "<td>" . $row['action'] . "</td>";
                            echo "<td>" . $row['cdate'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
