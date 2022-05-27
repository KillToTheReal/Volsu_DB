<?php 
require_once "../util/database.php";

$req=mysqli_query($mysql,"SELECT * FROM clients");
$req1=mysqli_query($mysql,"SELECT * FROM clients");
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
    <link rel="stylesheet" href="../source/bootstrap/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../source/style.css"/>
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
                    <form action="CRUD/update.php" class="formtb" method="POST" id=<?php echo("tb".$key) ?>>
                    <?php
                    foreach($val as $data){
                        if($j == 0)
                        {

                            echo('<input type="hidden" name="'."item".$j.'"value="'.$data.'">');
                            echo('<td> <input type="text" disabled  name="'."item".$j.'" placeholder="'.$data.'" value="'.$data.'">');
                            echo('<div id='."errorstb".$key.'></div>');
                            echo('</td>');
                        }
                        else{
                            echo('<td> <input type="text" id="'."idtb".$j.$key.'" name="'."item".$j.'" placeholder="'.$data.'" value="'.$data.'"></td>');
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
            <form action="./CRUD/create.php" method="POST" id="form"> 
                <div style="display:flex;" class="form-row align-items-center">
                    <?php
                        for($i = 2; $i <= sizeof($vals); $i++){       
                    ?>  
                        <div class="col-auto">
                        
                            <label class="sr-only" for="inlineFormInput" ><?=$fields[$i]?></label>
                            <input type="text" class="form-control mb-2" name="name_<?=$i?>" required  id="id_<?=$i?>" placeholder="<?=$fields[$i]?>">       
                        </div> 
                    <?php }?>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-2" action=>Submit</button>
                    </div>  
                </div>
                <div id="errors"></div>
            </form>
        </div>


    <script type="text/javascript">
        const form = document.getElementById("form");
        const err = document.getElementById('errors');
        const reg = new RegExp(/\w+@\w+.\w+/,"gm");
        form.addEventListener('submit',(e)=>{
            const mailfield = document.getElementById("id_3");
            const namefield = document.getElementById("id_2");
            let got_err = false;
            if(!reg.test(mailfield.value)){
                mailfield.classList.add("error");
                err.innerText += " Некорректно введён email. Шаблон *@*.* \n";
                got_err = true;
            }
            if(namefield.value.length < 4){
                err.innerText += " Некорректно введёно имя пользователя. Имя должно быть >3 символов в длину. \n";
                got_err = true;
            }
            if(got_err){
                e.preventDefault();
            }
        });
    </script>

    <script type="text/javascript">
        const formtb = document.getElementsByClassName("formtb");
        for(i = 0; i < formtb.length; i++){
            let err = "errorstb"+i.toString() 
            const errtb = document.getElementById(err);
            const form = document.getElementById("tb"+i.toString())
            let name = "idtb1"+i.toString()
            let email = "idtb2"+i.toString()
            const mailfield = document.getElementById(email);
            const namefield = document.getElementById(name);
            form.addEventListener('submit',(e)=>{
                errtb.innerText = ''
                let got_err = false
                if(!reg.test(mailfield.value)){
                    mailfield.classList.add("error")
                    errtb.innerText += " Некорректно введён email. Шаблон *@*.* \n"
                    got_err = true
                }
                if(namefield.value.length < 4){
                    errtb.innerText += " Некорректно введёно имя пользователя. Имя должно быть >3 символов в длину. \n"
                    got_err = true
                }
                if(got_err){
                    e.preventDefault()
                }
            
            })}

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>