<html>

<head>
    <title>PHP TEST</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <h2 class='text-center'>PHP CRUD</h2>
                <div class="page-header">
                    <h2>USERS</h2>
                    <a href="create.php" class="btn btn-success">ADD NEW USER</a>
                </div>
                <?php
                require_once 'database.php';

                $data = 'SELECT * FROM students';
                if ($users = mysqli_query($con, $data)) {
                    if (mysqli_num_rows($users) > 0) {
                        echo "<table class='table table-bordered table-striped'></table>
                                <thead>
                                    <tr>
                                        <th>
                                            ID
                                        </th>
                                        <th>
                                            NAME
                                        </th>
                                    </tr>
                                </thead>
                                    <tbody>";
                        while ($user = mysqli_fetch_array($users)) {
                            echo "<tr>
                                    <td>" . $user['ID'] . "</td>
                                    <td>" . $user['Name'] . "</td>
                                    <td><a href='read.php?id=" . $user['ID'] . " 'title='View User''></a></td>
                                    <td><a href='delete.php?id=" . $user['ID'] . " 'title='Remove User''></a></td>
                                </tr>";
                        }
                            echo"</tbody>
                                </table>";
                        mysqli_free_result(($users));
                    } else {
                        echo "<p>No Records Found</p>";
                    }
                } else {
                    echo "Error could not execute" . mysqli_error($con);
                }
                mysqli_close($con);
                ?>
            </div>
        </div>
    </div>

</body>

</html>