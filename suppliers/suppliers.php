<?php 
require_once "../util/database.php";

$req=mysqli_query($mysql,"SELECT * FROM suppliers");
$req1=mysqli_query($mysql,"SELECT * FROM suppliers");
$vals = mysqli_fetch_assoc($req1);
$req1 = mysqli_fetch_all($req);
$fields[] = [];
$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <?php 
                    foreach($vals as $key => $value){
                        echo('<th scope="col">'.$key.'</th>');
                        array_push($fields,$key);
                        }
                    ?>
                    <th>Buttons</th>
                </tr> 
            </thead>
            <tbody>
                <?php 
                    foreach($req1 as $key => $val){
                    $j = 0;
                    echo('<tr>');
                    echo('<th scope="row">'.$i.'</th>');
                    ?>
                    <form action="CRUD/update.php" method="POST">
                    <?php
                    foreach($val as $data){
                        if($j == 0)
                        {
                            echo('<td> <input type="text" disabled name="'."item".$j.'" placeholder="'.$data.'" value="'.$data.'"></td>');
                            echo('<input type="hidden" name="'."item".$j.'"value="'.$data.'">');
                        }
                        else{
                            echo('<td> <input type="text" name="'."item".$j.'" placeholder="'.$data.'" value="'.$data.'"></td>');
                        }
                        $j++;

                    }
                    echo('<td><button type="submit" class="btn btn-success">Update</button></td>');
                    ?>
                    </form>
                    <?php
                    echo('<td> <a href="CRUD/delete.php?id='.$val[0].'"><button class="btn btn-danger">Delete</button></a></td>');
                    echo('</tr>');
                    $i++;
                    }?>
            </tbody>
        </table>
        <div class="container">
        <form action="./CRUD/create.php" method="POST"> 
            <div style="display:flex;" class="form-row align-items-center">
                <?php
                    for($i = 2; $i <= sizeof($vals); $i++){       
                ?>  
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput"><?=$fields[$i]?></label>
                        <input type="text" class="form-control mb-2" name="name_<?=$i?>" placeholder="<?=$fields[$i]?>">       
                    </div> 
                <?php }?>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </div>  
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>