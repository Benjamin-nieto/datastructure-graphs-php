# Arboles binarios

## UML
Nodo.

    - var Informacion  // valor del nodo.
    - nodo Derecho // apuntador nodo derecha.
    - nodo Izquierda // apuntador nodo izquierda.

    ---- construct(Informacion).
    ---- GET.
    ---- SET.

ArbolBinario.

    - NodoRaiz // nodo

    ---- construct(NodoRaiz)  // nodo padre del arbol
    ---- GET
    ---- SET
    ---- agregarNodo



## AgregarNodo

    AgregarNodo (NodoNuevo,Ubicacion,NodoPadre){ 
        
        // ubicacion "I","D","Derecha" ... Definicion de direccion a la que hace referencia el nodo padre. para saber donde ubicar el nodo hijo si derecha o izquierda.

        1. Validar que el nodo padre exista.

        2. Buscar nodo padre si existe continua
        
        3. Si ubicacion = "derecha" o "D" NodoPadre->setDerecha($nodo)

        4. Si ubicacion = "izquierda" o "I" NodoPadre->setIzquierda($nodo)

        5. Validacion: si al agregar algun lado es diferente de null entonces. se debe agregar el nodo en la misma direccion pero del hijo.
    }

"
    // nodo al iniciar deberia ser nodo Raiz.

    BuscarNodo(nodo,"Informacion"){
        if(nodo == null ){
            return null;
        }

        if(nodo->getInfo() == "Informacion"){

            return nodo;

        }

        $derecho = BuscarNodo(nodo->getDerecha(),"Informacion");

        $izquierda = BuscarNodo(nodo->getIzquierda(),"Informacion");

        if ($derecho != null){
            return $derecho;
        }else{
            return $izquierda

        }


    }

"

    contar(Nodo){

        if(Nodo != null){
            if(Nodo->tieneHijos()){
                return (1+contar(Nodo->izquierda) + contar(Nodo->derecha))
            }else{
                return 1;
            }
        }else{
            return 0;
        }
    }