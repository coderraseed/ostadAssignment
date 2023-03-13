<?php require_once "functions.php";?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Assignment </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
    body {
        background: #273c75;
    }

    .container-width {
        width: 61%;
        margin: 0 auto;
    }
    </style>

</head>

<body class="text-light">
    <div class="container container-width">
        <h2 class="text-center pt-5">Assignment of Module 6</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Ser No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Profile Picture</th>
                </tr>
            </thead>
            <tbody>
                <!-- //!Create a new HTML page that displays the contents of the "users.csv" file in a table. -->
                <?php
                    // read users data from CSV file
                    $file = fopen('users.csv', 'r');

                    while (($data = fgetcsv($file)) !== false) {
                        echo '<tr>';
                        echo '<td>' . $data[0] . '</td>';
                        echo '<td>' . $data[1] . '</td>';
                        echo '<td>' . $data[2] . '</td>';
                        echo '<td><img src="uploads/' . $data[3] . '"></td>';
                        echo '</tr>';
                        
                    }

                    fclose($file);
                ?>






            </tbody>
        </table>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>