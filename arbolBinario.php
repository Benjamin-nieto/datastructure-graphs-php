<?php
include("nodo.php");

class arbolBinario{
    private $raiz; // root, raiz, padre del arbol.

    public function __construct($raiz)
    {
        $this->raiz = $raiz;
    }

    public function getRaiz(){
        return $this->raiz;
    }

    public function setRaiz($raiz){
        $this->raiz = $raiz;
    }
}
?>