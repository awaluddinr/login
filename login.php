<?php


$conn = mysqli_connect("localhost", "root", "", "phpdasar");

if (isset($_POST['kirim'])) {
    $nama = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM login WHERE nama = '$nama' and pass = '$pass'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $role = $row['role'];

        if ($nama == 'awal') {
            header('Location : admin.php');
        } elseif ($nama == 'rajab') {
            header('Location : index.php');
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div class="container col-lg-6 d-flex" style="min-height: 100vh;">

        <div class="col-12 my-auto">

            <form method="POST" class="col-12">

                <h2 class="text-center">Login</h2>

                <div class="mb-3">
                    <label for="exampleInputEmail1 " class="form-label">Email address</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
            </form>
        </div>


    </div>
</body>

</html>