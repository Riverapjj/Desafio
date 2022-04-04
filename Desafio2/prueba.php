<?php

    include_once 'Model/EditorialesModel.php';

    $model = new EditorialesModel();
    var_dump($model->get());

    $editorial = [
        'codigo_editorial' =>  'EDI001',
        'nombre_editorial' =>  'Clasicos Roxsil',
        'contacto' =>  'Francisco Merino',
        'telefono' =>  '2333-3333'];

    echo "Modificado: ".$model->update($editorial);
    echo "Eliminado: ".$model->delete($editorial);