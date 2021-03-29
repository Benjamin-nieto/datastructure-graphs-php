<?php
include("vertice.php");

class Grafo
{

    private $matrizA; // aristar [].[].[]
    private $vectorV; // nodos A
    private $dirigido; // -> vertice

    public function __construct($dir = true)
    {

        $this->matrizA = null; // matriz de aristas || Array de 2 posiciones [A][B],[]
        $this->vectorV = null; // vector de nodos || Array de 1 posicion [B],[C],[D]
        $this->dirigido = $dir; // dirigido o no dirigido
    }

    /// vertices igual nodos
    public function agregarVertice($v)
    {
        // si el vector de nodos no tiene el nodo asociado (ejemplo ["B"=10])
        // "si no existe"
        if (!isset($this->vectorV[$v->getId()])) {
            $this->matrizA[$v->getId()] = null;
            $this->vectorV[$v->getId()] = $v; // se agrega el objeto al vector de nodos
        } else {
            return false;
        }
        // sin la validacion del if se remplazaria el nodo ya existente.
        return true;
    }
    /// vertices igual nodos
    public function getVertice($v)
    {
        return $this->vectorV[$v];
    }
    // agregar aristas a las matriz de aristas
    // - origen
    // - destino
    // - peso
    public function agregarArista($o, $d, $p = null)
    {
        // si el origen y el destino se encuentran asociados a un nodo entonces, se asocia una arista a estos nodos
        // $matrizA["A"]["D"] = 10
        if (isset($this->vectorV[$o]) && isset($this->vectorV[$d])) {
            $this->matrizA[$o][$d] = $p;
        } else {
            return false;
        }

        return true;
    }

    //recibe id de nodo y retorna en un arreglo sus adyacentes.
    public function getAdyacentes($v)
    {
        return $this->matrizA[$v];
    }

    public function getMatrizA()
    {
        return $this->matrizA;
    }

    public function getVectorV()
    {
        return $this->vectorV;
    }

    //recibe el id del vertice y retorna grado de salida del mismo
    public function gradoSalida($v)
    {
        $array = $this->matrizA[$v];
        if ($array != null) {
            $num = count($this->matrizA[$v]);
            if ($num != null) {
                return $num;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function gradoEntrada($v)
    {
        $gr = 0;
        if ($this->matrizA != null) {
            foreach ($this->matrizA as $vp => $adya) {
                if ($adya != null) {
                    foreach ($adya as $de => $pe) {
                        if ($de == $v) {
                            $gr++;
                        }
                    }
                }
            }
        }

        return $gr;
    }

    //recibe el id del vertice y retorna grado del mismo
    public function grado($v)
    {

        return $this->gradoSalida($v) + $this->gradoEntrada($v);
    }

    //recibe id de vertice origen y destino
    public function eliminarArista($o, $d)
    {
        if (isset($this->matrizA[$o][$d])) {
            unset($this->matrizA[$o][$d]);
        } else {
            return false;
        }

        return true;
    }

    //recibe id de vertice a eliminar, elimina aristas relacionadas
    //recibe id de vertice a eliminar, elimina aristas relacionadas
    public function eliminarVertice($v)
    {
        if (isset($this->vectorV[$v])) {
            foreach ($this->matrizA as $vp => $adya) {
                if ($adya != null) {
                    foreach ($adya as $de => $pe) {
                        if ($de == $v) {
                            unset($this->matrizA[$vp][$de]);
                        }
                    }
                }
            }
            unset($this->matrizA[$v]);
            unset($this->vectorV[$v]);
        } else {
            return false;
        }
        return true;
    }
}
