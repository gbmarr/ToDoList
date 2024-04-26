<?php

class TareasView{

    private $Titulo;
    
    function __construct(){
        $this->Titulo = "Listado de tareas";
    }

    function Mostrar($Tareas){
        ?>
        <!DOCTYPE html>
                <html lang="en">
                <head>
                <meta charset="UTF-8">
                <!-- fonts -->
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
            <!-- styles -->
            <link rel="stylesheet" href="view/styles/styles.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> <?php echo $this->Titulo ?> </title>
        </head>
        <body>
            <header class="header">
                <h1>To Do List</h1>
            </header>
            <main class="main__container">
                <section class="tasks__container">
                    <h2>Tareas Pendientes</h2>
                    <div class="tasks__container__list">
                        <!-- se insertan las tareas aquí -->
                        <?php
                        if($Tareas != null){
                            $card = "";
                            foreach ($Tareas as $tarea) {
                                $card .= "<div class='task__card'>
                                        <h3 class='task__card__title'>$tarea->Titulo</h3>
                                        <article class='task__card__desc'>$tarea->Descripcion</article>
                                        <p class='task__card__priority'>Prioridad: $tarea->Prioridad</p>
                                    <div class='task__card__btn__container'>
                                    <div>
                                        <a href='complete' class='btn__complete'>Completar</a>
                                        <a href='edit' class='btn__edit'>Editar</a>
                                        <a href='delete' class='btn__delete'>Eliminar</a>
                                    </div>
                                        <a href='detail' class='btn__verdetalle'>Detalle</a>
                                    </div>
                                    </div>";
                                }  
                            }else{
                                $card = "<div class='task__card'>
                                            <h3 class='task__card__title'>No existen tareas actualmente.</h3>
                                        </div>";
                            } 
                            echo $card;
                            ?>
                    </div>
                </section>
                <aside class="aside__container">
                    <h2>Nombre de Usuario</h2>
                    <form action="insert" method="POST">
                        <label for="name">Tarea:</label><input name="titulo" type="text">
                        <label for="desc">Descripción:</label><textarea name="desc" cols="30" rows="10"></textarea>
                        <label for="prioridad">Prioridad:</label><select name="prioridad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <button type="submit" name="submit">Agregar</button>
                    </form>
                </aside>
            </main>
            <footer>
                <p class="footer__text">[Diseñado por ...]</p>
            </footer>
        </body>
        </html>
        <?php
    }

    function Formulario($Tarea){
        
    }

    function VerDetalle(){
        
    }

}