$(document).ready(function () {
    let edit = false;
    $('#task-result').hide();
    fetchTask();


    $('#search').keyup(function(e){
    
    if($('#search').val() !=""){
        let search = $('#search').val();
                $.ajax({
                    url: 'Backend/cats-search.php',
                    type: 'POST',
                    data:{search},
                    success: function(response){
                        console.log(response)
                       let tasks = JSON.parse(response);
                       let template = '';
                       tasks.forEach(task =>{
                           template += `<li> 
                           ${task.name} 
                           </li>`
                       });
           
                       $('#container').html(template);
                       $('#task-result').show();
                    }
                 })
                
         }
    })
// Editar y agregar categorías
    $('#task-form').submit(function(e){
            const postData ={
                name: $('#name').val(),
                description: $('#description').val(),
                id: $('#taskID').val()
            };
           
            let url = edit === false ? 'Backend/cats-add.php' : 'Backend/cats-edit.php';
            $.post( url, postData, function(response){
                console.log(response);
                edit=false;
                fetchTask();
                $('#task-form').trigger('reset');
            });
            
            e.preventDefault();
    })

   function fetchTask(){
    $.ajax({
        url: 'Backend/cats-list.php',
        type: 'GET',
        success: function(response){
           let tasks = JSON.parse(response);
           let template = '';
            tasks.forEach(task =>{
                template +=`
                    <tr taskID="${task.id}">
                    <td>${task.id}</td>
                    <td>
                    <a href="#" class="task-item">${task.name}</a>
                    </td>
                    <td>${task.description}</td>
                    <td>
                    <button class="btn btn-danger task-delete">Delete</button>
                    </td>
                    </tr>
                `;
            });
            $('#tasks').html(template);
        }
    });
   }

   $(document).on('click', '.task-delete', function(){
       if(confirm('Are you sure you wanna delete it?')){
        let element = $(this)[0].parentElement.parentElement; //obtiene la fila que contiene el botón que se clickea
        let id = $(element).attr('taskID');
        $.post('Backend/cats-delete.php', {id}, function(response){
            fetchTask();
        })
       }
   });

   $(document).on('click', '.task-item', function(){
       edit=true;
       let element = $(this)[0].parentElement.parentElement;
       let id = $(element).attr('taskID');
       $.post('Backend/cats-single.php', {id}, function(response){
        const task = JSON.parse(response);
        $('#name').val(task.name);
        $('#description').val(task.description);
        $('#taskID').val(task.id);
        edit=true;
       })   
   });
});