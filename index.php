<?php
include("grafo.php");

session_start();

if (isset($_SESSION["grafo"]) == false) {
    $_SESSION["grafo"] = new Grafo();
}
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

?>

<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Graphs</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="resources/css/general.css">


    <link rel="shortcut icon" type="image/jpg" href="https://www.cuc.edu.co/templates/it_university3/favicon.ico" />
    <script href="text/javascript" src="node_modules/vis/dist/vis.js"></script>
    <link rel="stylesheet" href="node_modules/vis/dist/vis.css" type="text/css">


</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <h1>Proyecto grafos</h1>
                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="btn-add-vert" value="" class="button-add">
                                    <h5 style="display: inline;">Agregar vertice </h5>
                                    <p style="display: inline;">Id Vertice:</p>
                                    <input type="text" name="id_vertice" style="width: 20%;">

                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <div>
                                        <input type="submit" name="btn-add-aris" value="" class="button-add">
                                        <h5 style="display: inline;">Agregar Arista </h5>
                                        <p style="display: inline;">Vertice origen:</p>
                                        <input type="text" name="vertice_origen" style="width: 10%;">
                                        <p style="display: inline;">Vertice destino:</p>
                                        <input type="text" name="vertice_destino" style="width: 10%;">
                                        <p style="display: inline;">Peso:</p>
                                        <input type="text" name="vertice_peso" style="width: 10%;">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="ver-grafo" value="" style="display: inline;" class="button-graph">
                                    <h5 style="display: inline;">Ver Grafo</h5>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="ver-verti" value="" class="button-view">
                                    <h5 style="display: inline;">Ver vertice</h5>
                                    <p style="display: inline;">Id del vertice:</p>
                                    <input type="text" name="txt-ver-vert" id="txt-ver-vert" style="width: 10%;">

                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="ver-adya" class="button-adya" value="">
                                    <h5 style="display: inline;">Ver adyacentes</h5>
                                    <p style="display: inline;">Id del vertice:</p>
                                    <input type="text" name="txt-ver-ady" id="txt-ver-ady" style="width: 10%;">

                                </form>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="ver-grdos" value="" class="button-view">
                                    <h5 style="display: inline;">Ver grado</h5>
                                    <p style="display: inline;">Id del vertice:</p>
                                    <input type="text" name="txt-ver-grd" id="txt-ver-grd" style="width: 10%;">

                                </form>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="delete-vert" class="button-delete" value="">
                                    <h5 style="display: inline;">Eliminar vertice</h5>
                                    <p style="display: inline;">Id del vertice:</p>
                                    <input type="text" name="txt-delete-vert" id="txt-delete-vert" style="width: 10%;">

                                </form>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <form method="post">
                                    <input type="submit" name="delete-aris" class="button-delete" value="">
                                    <h5 style="display: inline;">Eliminar arista</h5>
                                    <p style="display: inline;">Vertice origen</p>
                                    <input type="text" name="txt-delete-origen" id="txt-delete-origen" style="width: 10%;">
                                    <p style="display: inline;">Vertice destino</p>
                                    <input type="text" name="txt-delete-destino" id="txt-delete-destino" style="width: 10%;">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">

                <?php
                if (isset($_POST["btn-add-vert"])) {
                    $txt_vertice = $_POST["id_vertice"];
                    if ($txt_vertice != null || $txt_vertice != "") {
                        $_SESSION["grafo"]->agregarVertice(new Vertice($txt_vertice));
                    } else {
                        phpAlert("Valor de vertice no puede ser nulo");
                    }
                } elseif (isset($_POST["btn-add-aris"])) {
                    $txt_ari_o = $_POST["vertice_origen"];
                    $txt_ari_d = $_POST["vertice_destino"];
                    $txt_ari_peso = $_POST["vertice_peso"];

                    if ($txt_ari_o != "" && $txt_ari_d != "") {
                        $ret = $_SESSION["grafo"]->agregarArista($txt_ari_o, $txt_ari_d, $txt_ari_peso);
                        if ($ret) {
                            echo '<p>Se agrego arista entre vertice ' . $txt_ari_o . ' y vertice ' . $txt_ari_d . '</p>';
                        }
                    } else {
                        phpAlert("Debe digitar vertice de origen y destino no pueden ser nulo");
                    }
                } elseif (isset($_POST["ver-verti"])) {
                    $txt_id_vert = $_POST["txt-ver-vert"];
                    if ($txt_id_vert != "") {
                        $d = $_SESSION["grafo"]->getVertice($txt_id_vert);
                        if ($d === null || $d === "") {
                            echo '<p>No se encontro vertice</p>';
                        } else {
                            print_r($d);
                        }
                    } else {
                        phpAlert("El id del vertice a ver no puede ser nulo");
                    }
                } elseif (isset($_POST["ver-adya"])) {
                    $txt_id_ady = $_POST["txt-ver-ady"];
                    if ($txt_id_ady != "") {
                        $d = $_SESSION["grafo"]->getAdyacentes($txt_id_ady);
                        if ($d === null || $d === "") {
                            echo '<p>No se encontro adyacencia</p>';
                        } else {
                            print_r($d);
                        }
                    } else {
                        phpAlert("El id del vertice adyacente a buscar no puede ser nulo");
                    }
                } elseif (isset($_POST["ver-grdos"])) {
                    $txt_grds = $_POST["txt-ver-grd"];
                    if ($txt_grds != "") {
                        $d = $_SESSION["grafo"]->grado($txt_grds);
                        if ($d === null || $d === "") {
                            echo '<p>No tiene grados</p>';
                        } else {
                            echo "Grados: " . $d;
                        }
                    } else {
                        phpAlert("Debe indicar el id de un vertice");
                    }
                } elseif (isset($_POST["delete-vert"])) {
                    $txt_delver = $_POST["txt-delete-vert"];
                    if ($txt_delver != "") {
                        $_SESSION["grafo"]->eliminarVertice($txt_delver);
                    } else {
                        phpAlert("Debe indicar el id de un vertice");
                    }
                } elseif (isset($_POST["delete-aris"])) {
                    $txt_del_o = $_POST["txt-delete-origen"];
                    $txt_del_d = $_POST["txt-delete-destino"];
                    if ($txt_del_o != "" && $txt_del_d != "") {
                        $_SESSION["grafo"]->eliminarArista($txt_del_o, $txt_del_d);
                    } else {
                        phpAlert("Debe digitar vertice origen y destino");
                    }
                } elseif (isset($_POST["ver-grafo"])) {
                    $string_generate_aristas = null;
                    $mA = $_SESSION["grafo"]->getMatrizA();
                    foreach ($mA as $a => $adya) {
                        if ($adya != null) {
                           foreach ($adya as $de => $val) {                   
                            $string_generate_aristas = $string_generate_aristas.'{from:"'.$a.'",to:"'.$de.'",label:"'.$val.'"},'; 
                           }
                        }
                    }
                    
                    echo "<br>";
                    $mV = $_SESSION["grafo"]->getVectorV();
                    $string_generate_nodes = null;
                    $numc = 0;
                    $arr_color = ["red","yellow","green","blue","purple","orange","brown","grey","cyan","pink"];                    
                    foreach ($mV as $v => $valuev) {
                        $str = $valuev->getId();
                        $numc=$numc+1;
                        $add_color = $arr_color[rand(0,9)];
                        if ($numc==count($mV)) {
                            $string_generate_nodes = $string_generate_nodes."{id: '$str', label: '$str',color:{background:'$add_color'} }";
                        } else {
                            $string_generate_nodes = $string_generate_nodes."{id: '$str', label: '$str',color:{background:'$add_color'} },";
                        }
                    }

                    echo "<h5>Nodos: </h5>".$string_generate_nodes."<br>";
                    $split_string_generate_arista = substr($string_generate_aristas, 0, -1);
                    echo "<h5>Aristas: </h5>".$split_string_generate_arista."<br>";
                    echo ' <div class="row">
                    <div class="col-12">
                    <div id="content-grafo" style="width:90%;height:400px;">    
                    </div></div></div>';
                   generateGrafo($string_generate_nodes,$split_string_generate_arista);

                }
                ?>
            </div>
        </div>
    </div>
<?php 
function generateGrafo($string_node_complete,$split_string_generate_arista){
    echo '<script type="text/javascript">
    var nodos = new vis.DataSet(['.$string_node_complete.']);
    var aristas = new vis.DataSet(['.$split_string_generate_arista.']);
    
    var contenedores = document.getElementById("content-grafo");
    var datos = {
        nodes: nodos,
        edges: aristas
    };
    
    var opciones = {
        edges: {
            arrows: {
                to: {
                    enabled: true
                }
            }

        }
    };
    
    var grafo = new vis.Network(contenedores, datos, opciones);
    </script>';
    
    
}

?>
</body>

</html>