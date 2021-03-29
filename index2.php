<p>prueba
</p>
<?php
include("grafo.php");

$n = new Grafo();
/// vertices igual nodos
$n->agregarVertice(new Vertice("A"));
$n->agregarVertice(new Vertice("B"));
$n->agregarVertice(new Vertice("C"));
$n->agregarVertice(new Vertice("D"));
$n->agregarVertice(new Vertice("H"));

$n->agregarArista("A","B",3);
$n->agregarArista("A","C",5);
$n->agregarArista("C","D",10);
$n->agregarArista("D","A",3);
$n->agregarArista("B","H",9);

echo "<b>Matriz Adyacencia:</b><br>";
print_r($n->getMatrizA());

echo "<hr>";

echo "<b>Matriz de Vertices:</b><br>";
print_r($n->getVectorV());


echo "<hr><b>Grado</b><br>";
echo "Grado de A: ".$n->grado("A")."<br>";
echo "Grado de B: ".$n->grado("B")."<br>";
echo "Grado de C: ".$n->grado("C")."<br>";
echo "Grado de D: ".$n->grado("D")."<br>";

/*
echo "<hr><b>Eliminar vertice (nodo)</b><br>";
$n->eliminarVertice("C");
print_r($n->getVectorV());

*/
// echo "<hr><b>Eliminar adyacencia (camino)</b><br>";
// $n->eliminarArista("A","B");
// $n->eliminarArista("A","C");


/*
echo "<hr><b>Grado con aristas eliminadas A-B A-C</b><br>";
echo "Grado de A: ".$n->grado("A")."<br>";
echo "Grado de B: ".$n->grado("B")."<br>";
echo "Grado de C: ".$n->grado("C")."<br>";
echo "Grado de D: ".$n->grado("D")."<br>";
*/

?>