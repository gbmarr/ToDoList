<?php
    require_once '/router.php';
    require_once '/Controllers/TaskActions.php';
    require_once '/Models/Task.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- url base -->
    <base href="'.BASE_URL.'"/>
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
                listTasks();
                ?>
            </div>
        </section>
        <aside class="aside__container">
            <h2>Nombre Usuario</h2>
            <form action="../add" method="POST">
                <label for="name">Tarea:</label><input name="tarea" type="text">
                <label for="desc">Descripción:</label><textarea name="desc" cols="30" rows="10"></textarea>
                <label for="importancia">Prioridad:</label><select name="importancia">
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
    <!-- footer -->
    <footer>
        <p class="footer__text">[Diseñado por ...]</p>
    </footer>
    <!-- script de navbar -->
    <script src="../js/scripts.js"></script>
</body>
</html>