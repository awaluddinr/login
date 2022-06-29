<?php

session_start();
$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');
if (!isset($_SESSION["login"])) {
    header('Location: login.php');
    exit;
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1>Selamat datang admin</h1>


    <div class="card">
        <div class="card-body">
            Ini Halaman admin
        </div>
    </div>

    <?php

    $conn = mysqli_connect('localhost', 'root', '', 'phpdasar');
    $query = "SELECT * FROM login1";
    $result = mysqli_query($conn, $query);

    ?>

    <table>

        <tr>
            <th>nama</th>
            <th>email</th>
            <th>password</th>
            <th>role</th>
        </tr>

        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['email']; ?></td>
                <td><?= $row['pass']; ?></td>
                <td><?= $row['role']; ?></td>
            </tr>
        <?php endwhile; ?>

    </table>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>