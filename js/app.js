$(document).ready( function () {
    console.log($('#category').val());
    fetchPlaces();


    function fetchPlaces() {
        $.ajax({
            url: 'Backend/fetch-places.php',
            type: 'GET',
            success: function (response) {
                let places = JSON.parse(response);
                let template = "";

                places.forEach(place => {
                    template += `
                    <div class="col-l-6 py-3 px-2 image">

                    
                                    <div class="card card-image" style="background-image: url(${place.image}); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
                    
                    
                                        <div class="text-white text-center d-flex align-items-center card-bg py-5 px-4">
                                            <div>
                                                <h5 class="text-white" ><i class="fas fa-chart-pie"></i>${place.location} </h5>
                                                <h3 class="card-title pt-2"><strong>${place.name}</strong></h3>
                                                <p>
                                                    ${place.description}
                                                </p>
                                                <a href ="#" class="btn btn-danger text-white"><i class="far fa-clone left"></i> View project</a>
                                            </div>
                                        </div>
                   
                                    </div>
                    
                                </div>
                    
                    
                    `;
                   
                });
                $('#places').html(template);
            }

        })
    }

})