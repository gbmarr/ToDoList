<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- styles -->
    <link rel="stylesheet" href="styles/styles.css">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>To Do List</title>
</head>
<body>
    <!-- header -->
    <header class="header">
        <h1>To Do List</h1>
    </header>
    <!-- main -->
    <main class="main__container">
        <section class="tasks__container">
            <h2>Tareas Pendientes</h2>
            <div class="tasks__container__list">
                <?php
                include_once '../Controllers/TaskActions.php';
                include_once '../Models/Task.php';

                $tareas = getTasks();

                $echo = "";

                echo "<ul>";
                foreach ($tareas as $tarea) {
                    $echo .= '<li>' . $tarea->Description . '</li>';
                }

                if(!empty($echo)){
                    echo $echo;
                }else {
                    echo "<li>No hay tareas disponibles</li>";
                }
                echo "</ul>";
                ?>

                <!-- <div class="task__card">
                    <h3 class="task__card__title"></h3>
                    <article class="task__card__desc"></article>
                    <p class="task__card__priority"></p>
                    <div>
                        <button>Completar</button>
                        <button>Editar</button>
                        <button>Eliminar</button>
                    </div>
                </div> -->
            </div>
        </section>
        <aside class="aside__container">
            <h2>Nombre Usuario</h2>
            <form action="" method="">
                <label for="name">Tarea:</label><input name="tarea" type="text">
                <label for="desc">Descripción:</label><textarea name="desc" cols="30" rows="10"></textarea>
                <label for="importancia">Prioridad:</label><select name="importancia" id="">
                    <option value="baja">Baja</option>
                    <option value="media">Media</option>
                    <option value="alta">Alta</option>
                </select>
                <button type="submit">Agregar</button>
            </form>
        </aside>
    </main>
    <!-- footer -->
    <footer>
        <p class="footer__text">[Diseñado por ...]</p>
    </footer>
    <!-- script de navbar -->
    <script src="js/navbar.js"></script>
</body>
</html>