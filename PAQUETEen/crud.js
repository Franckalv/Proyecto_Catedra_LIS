$(document).ready(function() {
    // Global Settings
    let edit = false;

    fetchTasks();
    $('#task-result').hide();
  
  
    // search key type event
    $('#search').keyup(function() {
      if($('#search').val()) {
        let search = $('#search').val();
        $.ajax({
          url: 'task-search.php',
          data: {search},
          type: 'POST',
          success: function (response) {
            
            if(!response.error) {
              let tasks = JSON.parse(response);
              let template = '';
              tasks.forEach(task => {
                template += `
                       <li><a href="#" class="task-items">${task.name}</a></li>
                      ` 
              });
              $('#task-result').show();
              $('#container').html(template);
            }
          } 
        })
      }
    });
  
    $('#task-form').submit(e => {
      e.preventDefault();
        let name = $('#name').val();
        let description = $('#description').val();
        let id = $('#taskId').val();
        let image =$('#image').prop('files')[0];
        let price = $('#price').val();
        let date = $('#date').val();
        let place = $('#place').val();

        var formData = new FormData();
        formData.append('name', name);
        formData.append('description', description);
        formData.append('id', id);
        formData.append('imagen', image);
        formData.append('price', price);
        formData.append('date', date);
        formData.append('place', place);

      if(!isNaN(price)){
        const url = edit === false ? 'task-add.php' : 'task-edit.php';
      $.ajax({
            url         :   url,
            dataType    :   'text',
            cache       :   false,
            contentType :   false,
            processData :   false,
            data        :   formData,
            type        :   'post',
            success     :   function(response){
            alert(response);
  
            $('#task-form').trigger('reset');
            fetchTasks();
            edit=false;
            }
      });
    }else{alert('Please, insert a number as price')}
    });
  
    // Fetching Tasks
    function fetchTasks() {
      $.ajax({
        url: 'tasks-list.php',
        type: 'GET',
        success: function(response) {
          const tasks = JSON.parse(response);
          let template = '';
          tasks.forEach(task => {
            template += `
                    <tr taskId="${task.id}">
                    <td>${task.id}</td>
                    <td>
                    <a href="#" class="task-item">
                      ${task.name} 
                    </a>
                    </td>
                    <td><p class="clamp line-clamp">${task.description}</p></td>
                    <td>
                      <button class="task-delete btn btn-danger">
                       Delete 
                      </button>
                    </td>
                    </tr>
                  `
          });
          $('#task-form').trigger('reset');
          $('#tasks').html(template);
        }
      });
    }
  
    // Get a Single Task by Id 
    $(document).on('click', '.task-item', (e) => {
      const element = $(this)[0].activeElement.parentElement.parentElement;
      const id = $(element).attr('taskId');
      $.post('task-single.php', {id}, (response) => {
        console.log(response);
        const task = JSON.parse(response);
        $('#name').val(task.name);
        $('#description').val(task.description);
        $('#taskId').val(task.id);
        $('#price').val(task.price);
        $('#date').val(task.date);
        $('#place').val(task.place)
        let img = "";
        img = `
        <img src="data:image/jpg;base64,${task.image}" style="max-width: 100%; max-height: 100%;" alt="Foto de ${task.name}">
        `;
        $('#foto').html(img);
        edit = true;
      });
      e.preventDefault();
    });
  
    // Delete a Single Task
    $(document).on('click', '.task-delete', (e) => {
      if(confirm('Are you sure?')) {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('taskId');
        $.post('task-delete.php', {id}, (response) => {
          alert(response);
          fetchTasks();
        });
      }
    });
  });