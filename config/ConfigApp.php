<?php

class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
        '' => "ListarTareas",
        'insert' => "InsertarTarea",
        'edit' => "ActualizarTarea",
        'complete' => "CompletarTarea",
        'detail' => "VerDetalle",
        'update' => "ActualizarDatos",
        'delete' => "BorrarTarea"
    ];
}