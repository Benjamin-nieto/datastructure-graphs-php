<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script href="text/javascript" src="../node_modules/vis/dist/vis.js"></script>
    <link rel="stylesheet" href="../node_modules/vis/dist/vis.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Document</title>

    <style>
        @media (max-width: 768px) {
            [id=flex-box] {
                display: block !important;
            }
        }

        p {
            display: inline-block;
        }
    </style>
</head>

<body>

    <div class="container">
        <div style="display: flex;" id="flex-box">
            <div id="grafo2" style="display: block;width: 400px;height: 400px;border: 1px solid;"></div>

            <script type="text/javascript">
                document.getElementById("grafo2").innerHTML = "<p>hello<p>";

                var nodos = new vis.DataSet([ //gen nodes
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                        if ($i == 50) {
                            echo "{id: $i, label: '$i' }";
                        } else {
                            echo "{id: $i, label: '$i' },";
                        }
                    };
                    ?>
                ]); // gen aristar 

                var aristas = new vis.DataSet([
                    <?php
                    for ($i = 1; $i <= 50; $i++) {
                        $num1 = rand(1, 50);
                        $num2 = rand(1, 50);
                        if ($i == 50) {
                            echo "{from: $num1, to: $num2}";
                        } else {
                            echo "{from: $num1, to: $num2},";
                        }
                    };

                    ?>
                ]);


                var contenedores = document.getElementById("grafo2");
                var datos = {
                    nodes: nodos,
                    edges: aristas
                };
                var opciones = {};
                var grafo = new vis.Network(contenedores, datos, opciones);
            </script>

            <div id="test1" style="display: block;width: 400px;height: 400px;border: 1px solid;">

                <?php
                ############## ARRAYS INDEXADOS
                ## array estatico 
                $array1 = ["red", "blue", "yellow", "grey", "green", "purple", "orange", "cyan", "pink"];

                foreach ($array1 as $i) {
                    echo '<p style="color:' . $i . ';">' . $i . '</p>';
                }
                echo "<br>";
                ## array por metodo
                $array2 = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);

                foreach ($array2 as $j) {
                    echo '' . $j;
                }
                echo " <br>";
                ############## ARRAYS ASOCIATIVOS

                $array3 = array('num1' => 'primera posicion', 'num2' => 'segunda posicion', 'num3' => 'tercera posicion');

                foreach ($array3 as $x) {
                    echo '<p>' . $x . '</p>';
                }

                $array3["num3"] = "se cambio el valor de la posicion 3";

                echo $array3["num3"];
                print_r($array3);
                ?>
            </div>


            <div id="test2" style="display: block;width: 400px;height: 400px;border: 1px solid;">
                <?php

                ##################### ARRAY DENTRO DE OTRO

                $n1 = array(
                    'A' => 0,
                    'B' => 5, 'C' => 10, 'D' => 15, 'E' => 20
                );
                $n2 = array(
                    'A' => 3,
                    'B' => 6, 'C' => 9
                );


                $v1 = array('A' => $n1, 'B' => $n2, 'C' => null);



                foreach ($v1 as $x) {
                    if ($x != null) {
                        foreach ($x as $j) {

                            echo 'valor de =' . $j . '<br>';
                        }
                    }
                }
                ?>

            </div>

            <div id="test3" style="display: block;width: 400px;height: 400px;border: 1px solid;">
                <?php

                ##################### ARRAY DE 2 POSICIONES
                $array2p[0]["a"] = "cero-a";
                $array2p[0]["b"] = "cero-b";
                $array2p[0]["c"] = "cero-c";
                $array2p[0]["d"] = "cero-d";


                $array2p[1]["a"] = "uno-a";
                $array2p[1]["b"] = "uno-b";
                $array2p[1]["c"] = "uno-c";
                $array2p[1]["d"] = "uno-d";

                $array2p[2]["a"] = "dos-a";
                $array2p[2]["b"] = "dos-b";
                $array2p[2]["c"] = "dos-c";



                print_r($array2p);


                echo "<hr><br>";

                // ejemplo de como crear un nodo nuevo en un array
                $array2p[2]["d"] = null;

                print_r($array2p[2]);
                ?>

            </div>







        </div>
    </div>

</body>

</html>