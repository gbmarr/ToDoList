<?php

class ConfigApp{
    public static $ACTION = "action";
    public static $PARAMS = "params";
    public static $ACTIONS = [
        '' => "ListarTareas",
        'insert' => "InsertarTarea",
        'update' => "ActualizarTarea",
        'complete' => "CompletarTarea",
        'detail' => "VerDetalle",
        'delete' => "BorrarTarea"
    ];
}