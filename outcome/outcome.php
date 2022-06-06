<?php
require_once "../util/database.php";
session_start();
if (!$_SESSION['logged'] || ($_SESSION['logged'] && !$_SESSION['admin'])) {
    $_SESSION['tberror'] = 'You cant have access to this table';
    header("Location: ../index.php");
}
#SEARCH
if(isset($_POST['query'])){
$query  = $_POST['query'];
$query = mysqli_query($mysql, "SELECT check_id, outcome.item_id, outcome.amount, outcome.client_id, outcome.price_out, outcome.date_out, clients.clientname, storage.item_name
FROM outcome INNER JOIN clients ON outcome.client_id = clients.idclients INNER JOIN storage ON storage.item_id = outcome.item_id
WHERE storage.item_name LIKE '%$query%' OR clients.clientname LIKE '%$query%' OR outcome.item_id LIKE '%$query%' OR outcome.amount LIKE '%$query%' OR outcome.price_out LIKE '%$query%'");

$query2 = mysqli_query($mysql,"SELECT check_id, outcome.item_id, outcome.amount, outcome.client_id, outcome.price_out, outcome.date_out, clients.clientname, storage.item_name
FROM outcome INNER JOIN clients ON outcome.client_id = clients.idclients INNER JOIN storage ON storage.item_id = outcome.item_id LIMIT 1");
if(isset($query)){
    if(is_object($query)){
    $parse_search = mysqli_fetch_all($query);
    if(count($parse_search)== 0){
        unset($parse_search);
        $error = "Nothing found";
    }
    $parse_heads = mysqli_fetch_assoc($query2);
    }
}
}
unset($_POST['query']);


$req = mysqli_query($mysql, "SELECT * FROM outcome");
$req1 = mysqli_query($mysql, "SELECT * FROM outcome");
$vals = mysqli_fetch_assoc($req1);
$req1 = mysqli_fetch_all($req);
$fields[] = [];
$i = 1;

$dropdown_clients = mysqli_query($mysql, "SELECT idclients,clientname FROM clients");
$parse_clients = mysqli_fetch_all($dropdown_clients);
$dropdown_items = mysqli_query($mysql, "SELECT item_id, item_name from storage ");
$parse_items = mysqli_fetch_all($dropdown_items);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../source/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../source/style.css" />
    <title>Outcome table</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../"> Home </a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-12 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="../queryfield.php">Query </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="../clients/clients.php">Clients </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../suppliers/suppliers.php">Suppliers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../storage/storage.php">Storage</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../users/users.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../income/income.php">Income</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../outcome/outcome.php">Outcome</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../util/exit.php">Exit from: <?= $_SESSION['usermail'] ?></a>
                    </li>
                </ul>
                <form action="./outcome.php" method="POST" class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" required name="query" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php

    if (isset($error)){
        echo('<h2> Nothing found </h2>');
    }
    if (isset($parse_search)) {
            echo ('<h2>Search</h2><table class="table">');
            
        ?>
        <tr>
            <?php
            foreach ($parse_heads as $key => $val) {
                echo ('<th scope="col">' . $key . '</th>');
            }
            ?>
        </tr>
        <?php
            foreach ($parse_search as $key => $val) {
                echo ('<tr scope="row">');


                foreach ($val as $data) {
                    echo ('<td scope="col">' . $data . '</td>');
                }
                echo ('</tr>');
            }
            echo ('</table>');
        }
        ?>



    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <?php
                foreach ($vals as $key => $value) {
                    echo ('<th scope="col">' . $key . '</th>');
                    array_push($fields, $key);
                }
                ?>
                <th>Buttons</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($req1 as $key => $val) {
                $j = 0;
                echo ('<tr>');
                echo ('<th scope="row">' . $i . '</th>');
            ?>
                <form action="CRUD/update.php" class="formtb" method="POST" id=<?php echo ("tb" . $key) ?>>
                    <?php
                    foreach ($val as $data) {
                        if ($j == 0) {
                            echo ('<input type="hidden" name="' . "item" . $j . '"value="' . $data . '">');
                            echo ('<td> <input type="text" disabled name="' . "item" . $j . '" placeholder="' . $data . '" value="' . $data . '">');
                            echo ('<div id=' . "errorstb" . $key . '></div>');
                            echo ('</td>');
                        } else if ($j == 1) {
                            echo ('<td>');
                            echo ('<select name ="item' . $j . '">');
                            foreach ($parse_items as $ps) {
                                if ($data == $ps[0])
                                    echo ('<option selected value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                                else
                                    echo ('<option value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                            }
                            echo ('</select></td>');
                        } else if ($j == 3) {
                            echo ('<td>');
                            echo ('<select name ="item' . $j . '">');
                            foreach ($parse_clients as $ps) {
                                if ($data == $ps[0])
                                    echo ('<option selected value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                                else
                                    echo ('<option value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                            }
                            echo ('</select></td>');
                        } else {
                            echo ('<td> <input type="text" id="' . "idtb" . $j . $key . '" name="' . "item" . $j . '" placeholder="' . $data . '" value="' . $data . '"></td>');
                        }
                        $j++;
                    }
                    echo ('<td><button type="submit" class="btn btn-success">Update</button></td>');
                    ?>
                </form>
            <?php
                echo ('<td> <a href="CRUD/delete.php?id=' . $val[0] . '"><button class="btn btn-danger">Delete</button></a></td>');
                echo ('</tr>');
                $i++;
            } ?>
        </tbody>
    </table>
    <div class="container">
        <form action="./CRUD/create.php" method="POST" id="form">
            <div style="display:flex;" class="form-row align-items-center">
                <?php
                for ($i = 2; $i <= sizeof($vals); $i++) {
                ?>
                    <div class="col-auto">
                        <?php
                        if ($i == 2) {
                            echo ('<label class="sr-only" for="inlineFormInput" >' . $fields[$i] . '</label>');
                            echo ('<select class="form-select mb-2" name ="name_' . $i . '">');
                            foreach ($parse_items as $ps) {
                                echo ('<option value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                            }
                            echo ('</select>');
                        } else if ($i == 4) {
                            echo ('<label class="sr-only" for="inlineFormInput" >' . $fields[$i] . '</label>');
                            echo ('<select class="form-select mb-2" name ="name_' . $i . '">');
                            foreach ($parse_clients as $ps) {
                                echo ('<option value =' . $ps[0] . '>' . "ID:" . $ps[0] . " " . $ps[1] . '</option>');
                            }
                            echo ('</select>');
                        } else {
                        ?>
                            <label class="sr-only" for="inlineFormInput"><?= $fields[$i] ?></label>
                            <input type="text" class="form-control mb-2" name="name_<?= $i ?>" required id="id_<?= $i ?>" placeholder="<?= $fields[$i] ?>">

                        <?php }
                        ?>
                    </div>
                <?php } ?>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2" action=>Submit</button>
                </div>
            </div>
            <div id="errors"></div>
        </form>
    </div>


    <script src="./js/formcheck.js" type="text/javascript"></script>
    <script src="./js/updatecheck.js" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>