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
                <tr>
                    <th>1</th>
                    <th>Rashed</th>
                    <th>coderraseed@gmail.com</th>
                    <th>My Picture</th>
                </tr>

                <!-- //!Create a new HTML page that displays the contents of the "users.csv" file in a table. -->
                <?php
					if (($handle = fopen("users.csv", "r")) !== false) {
					    $row = 1;
					    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
					        if ($row == 1) {
					            $row++;
					            continue;
					        }
					        echo "<tr>";
					        for ($i=0; $i < count($data); $i++) {
					            echo "<td>" . $data[$i] . "</td>";
					        }
					        echo "</tr>";
					    }
					    fclose($handle);
					}
				?>




                
            </tbody>
        </table>

    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>

</html>