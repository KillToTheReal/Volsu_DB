<?php
require_once "./util/database.php";
session_start();
if (isset($_POST['query'])) {
    $query = $_POST['query'];
    try {

        $res = mysqli_query($mysql, $query);
        $res2 = mysqli_query($mysql, $query);
    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    if (isset($res))
        if (is_object($res)) {
            $fetch = mysqli_fetch_all($res);
            $cols = mysqli_fetch_assoc($res2);
        } else if ($res) {
            $success = "Success";
        } else {
        }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./source/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./source/style.css" />
    <title>Document</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./"> Home </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-12 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="./queryfield.php">Query </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./clients/clients.php">Clients </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./suppliers/suppliers.php">Suppliers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./storage/storage.php">Storage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./users/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./income/income.php">Income</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./outcome/outcome.php">Outcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./util/exit.php">Exit from: <?= $_SESSION['usermail'] ?></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <div class='wrapper-main' style="align-items:left; justify-content:left;">

        <form action="./queryfield.php" method="POST">
            <div class="form-group">
                <label for="query">MySQL execute</label>
                <input required type="text" name="query" class="form-control" id="query" placeholder="Enter query">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


        <?php
        if (isset($error)) {
            echo ('<h1 class="error">' . $error . '</h1>');
        }
        if (isset($success)) {
            echo ('<h1>' . $success . '</h1>');
        }


        if (isset($fetch)) {
            echo ('<table class="table">');

        ?>
            <tr>
                <?php
                foreach ($cols as $key => $value) {
                    echo ('<th scope="col">' . $key . '</th>');
                }
                ?>
            </tr>
        <?php
            foreach ($fetch as $key => $val) {
                echo ('<tr scope="row">');


                foreach ($val as $data) {
                    echo ('<td scope="col">' . $data . '</td>');
                }
                echo ('</tr>');
            }
            echo ('</table>');
        }
        ?>
    </div>
</body>

</html>