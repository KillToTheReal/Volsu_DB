<?php
session_start();
if(!isset($_SESSION['error_log']))
{
    $_SESSION['error_log'] = '';
}
if(!isset($_SESSION['logged']))
{
    $_SESSION['logged'] = false;
}
if(!isset($_SESSION['admin']))
{
    $_SESSION['admin'] = false;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./source/bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="./source/style.css"/>
    <title>Main page</title>
</head>
<body>
    <div class='wrapper-main'>
        <div class="btncol">
            <h1>Tables labs</h1>
            <?php
                if(isset($_SESSION['tberror']))
                {
                    echo("<div class=\"error\">".$_SESSION['tberror']."</div>");
                    unset($_SESSION['tberror']);
                }
            ?>
           <a href="./users/users.php" role="button" class="btn btn-outline-dark">Users table</a>
           <a href="./clients/clients.php" role="button" class="btn btn-outline-dark">Clients table</a>
           <a href="./suppliers/suppliers.php" role="button" class="btn btn-outline-dark">Suppliers table</a>
           <a href="./storage/storage.php" role="button" class="btn btn-outline-dark">Storage table</a>
           <a href="./income/income.php" role="button" class="btn btn-outline-dark">Income table</a>
           <a href="./outcome/outcome.php" role="button" class="btn btn-outline-dark">Outcome table</a>
           <?php
           if($_SESSION['logged']){
           ?>
           <a href="./util/exit.php" role="button" class="btn btn-outline-dark"><?=$_SESSION['usermail']?> : Exit acc</a>
           <?php } ?>
        </div>

        <?php
        if(!$_SESSION['logged']){ ?>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Login
                        </button>
                    </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <form action="util/login.php" method="POST">
                                <label style="font-size:24px;">Login form</label>
                                <?php
                                    if(isset($_SESSION['errors_log'])){
                                    echo("<div class=\"error\">".$_SESSION['errors_log']."</div>"); 
                                    $_SESSION['errors_log'] = '';
                                    }
                                ?>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="mail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" aria-describedby="passHelp" name="pass" placeholder="Password">
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Register
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">      
                            <form action="util/register.php" method="POST">
                                <label style="font-size:24px;">Register form</label>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" name="mail" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" aria-describedby="passHelp" name="pass" placeholder="Password">
                                    <small id="passHelp" class="form-text text-muted">Your pass contains as a hash</small>
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script type='text/javascript' src="./source/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>