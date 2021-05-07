<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factorial</title>
</head>
<body>

<h1>Ejercicio recursividad - Factorial</h1>
<h5>Integrantes: Benjamin Nieto, Juan Jimenez</h5>
    <form action="" method="post">
    <input type="number" name="txt-num-fac" id="txt-num-fac">
    <input type="submit" value="calcular factorial">
    </form>

    <?php
     
    if (isset($_POST["txt-num-fac"])) {

        $val = $_POST["txt-num-fac"];
        if ($val != "") {
            echo 'Calcular factorial de '.$val;
            echo '</br>';
            //echo factorial($val);
            echo 'R: '.factorial($val);
        }
        
    }

    function factorial($num){

        if ($num==1) {
            return 1;
        } else {
            return ($num*factorial($num-1));
        }
        
    }

?>


</body>
</html>