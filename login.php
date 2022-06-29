<?php

session_start();
if (isset($_SESSION['login'])) {
    if ($_SESSION['auth_role'] == '1' && (!$_SESSION['user'])) {
        header('Location: admin.php');
    } elseif ($_SESSION['auth_role'] == '0' && (!isset($_SESSION['admin']))) {
        header('Location: index.php');
    }
}
$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');

if (isset($_POST['kirim'])) {
    $nama = mysqli_escape_string($conn, $_POST['email']);
    $pass = mysqli_escape_string($conn, $_POST['pass']);

    $query = "SELECT * FROM login1 WHERE email = '$nama' AND pass = '$pass'";
    $result = mysqli_query($conn, $query);


    if (mysqli_num_rows($result) > 0) {

        foreach ($result as $data) {
            $id = $data['id'];
            $nama = $data['nama'];
            $email = $data['email'];
            $role = $data['role'];
        }

        $_SESSION['auth_role'] = "$role";
        $_SESSION['loginData'] = [
            'id' => $id,
            'nama' => $nama,
            'email' => $email,
        ];


        if ($_SESSION['auth_role'] == '1') {
            header('Location: admin.php');
            $_SESSION['login'] = true;
            $_SESSION['admin'] = true;
        } elseif ($_SESSION['auth_role'] == '0') {
            header('Location: index.php');
            $_SESSION['user'] = true;
            $_SESSION['login'] = true;
        }
    } else {
        $error = true;
    }
} else {
    $not = "tidak boleh masuk sini";
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
                    <?php if (isset($error)) : ?>
                        <h3 class="text-danger">Email tidak dikenali</h3>
                    <?php endif; ?>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1 " class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" autocomplete="off">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="pass" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="kirim">Submit</button>
            </form>
        </div>


    </div>
</body>

</html>