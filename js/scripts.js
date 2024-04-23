"use strict";

// Funcion que obtiene el ID de la tarea y realiza el llamado a la eliminación de la misma
document.addEventListener("DOMContentLoaded", function(){
    let deleteBTNS = document.querySelectorAll('.btn__delete');

    deleteBTNS.forEach(function(button) {
        button.addEventListener('click', function(){
            let taskId = this.getAttribute('data-id');
            deleteTask(taskId);
        })
    })
});

function deleteTask(taskId) {
    fetch('../Controllers/TaskActions.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json',},
        body: JSON.stringify({ taskId: taskId }),
    }).then(response => {
        if (response.ok) {
            reloadTaskList();
            console.log("Tarea eliminada correctamente");
        }else{
            console.log("Error al eliminar tarea");
        }
    }).catch(err => {
        console.error("Fallo en la conexión", err);
    });
};

function reloadTaskList() {
    location.reload();
}