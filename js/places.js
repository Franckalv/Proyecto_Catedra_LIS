$(document).ready(function () {
    $(window).on('load', function(){
        CKEDITOR.replace('informacion')
    })


    fetchCategories()
    function fetchCategories(){
        $.ajax({
            url: 'Backend/fetchCategories.php',
            type: 'GET',
            success: function(response){
                console.log(response)
                let categories = JSON.parse(response);
                
                let template = "";
                categories.forEach(category => {
                    template += `
                        <option value="${category.category}"> ${category.category}</option>
                    `;
                });
                
                $('#category').append(template);
            }
        })
    }
    //Guardar la info del lugar en la base de datos
    $('#addPlaces').submit(function(e){
        e.preventDefault();
        let nombre = $('#nombre').val();
        let categoria = $('#category').val();
        let location = $('#location').val();
        let desc = $('#description').val();
        let info = encodeURIComponent(CKEDITOR.instances.informacion.getData());
        let imageData = $('#image').prop('files')[0];
        var formData = new FormData();
        formData.append('image',imageData);
        formData.append('info', info);
        formData.append('desc', desc);
        formData.append('location', location);
        formData.append('category', categoria);
        formData.append('name', nombre);
        
        $.ajax({
            url         :   'Backend/uploadSite.php',
            dataType    :   'text',
            cache       :   false,
            contentType :   false,
            processData :   false,
            data        :   formData,
            type        :   'post',
            success     :   function(response){
                let res = response;
                console.log(res);
                alert(res);
                $('#nombre').val("");
                $('#category').val("");
                $('#location').val("");
                $('#description').val("");
                $('#informacion').val();
                $('#image').val("");
            }
        })
    })

})
