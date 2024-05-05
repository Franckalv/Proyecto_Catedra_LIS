$(document).ready( function () {
    fetchCats();
        function fetchCats(){
            $.get('Backend/fetchCategories.php', function(response){
                try{
                let cats = JSON.parse(response);
                let template = "";
                    
                cats.forEach(cat => {

                    template += `
                    <div class="col-md-4 col-sm-12 col-lg-3 my-2">
                        <div class="card mb-2">
                            <div class="card-body">
                            <h4 class="card-title" align="center">${cat.category}</h4><br>
                            <p class="card-text line-clamp" align="justify">${cat.description}</p>
                            <a class="btn btn-primary" style="color: #FFF" href="mostrarSitios.php?cat=${cat.category}">View more</a>
                            </div>
                        </div>
                    </div>
                    
                    `;
                   
                });
                $('#cats').html(template);
                console.log(cats);
            }catch(e){
                console.log(e.message);
                $('#cats').html(response);
            }
            })
        };
    
    })