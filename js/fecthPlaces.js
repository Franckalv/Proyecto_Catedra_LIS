$(document).ready( function () {
fetchPlaces();
    function fetchPlaces(){
        let category = $('#category').val();
        $.post('Backend/fetch-places.php', {category}, function(response){
            try{
            let places = JSON.parse(response);
            let template = "";

            places.forEach(place => {
                let customURL = place.name;
                let URL = customURL.split(' ').join('+');
                template += `
                <div class="col-lg-4 col-md-4 col-sm-12 p-3 image">
                    <div class="card card-image" style="background-image: url(data:image/jepg;base64,${place.image}); background-position: center top; background-repeat: no-repeat; background-attachment: scroll;  background-size: fit;">
                        <div class="text-white text-center align-items-center card-bg py-5 px-4">
                            <div class="col-md-12 col-lg-12 col-sm-12">
                                <h5 class="text-white > ${place.location}</h5>
                                <h3 class="card-title pt-2 title-clamp"><strong>${place.name}</strong></h3>
                                <div class="line-clamp"> 
                                <p>
                                    ${place.description}
                                </p>
                                </div>
                                <a href="comments.php?place=${URL}" class="btn btn-danger text-white"><i class="far fa-clone left"></i>View more</a>
                            </div>
                        </div>
                    </div>
                </div>
                `;
               
            });
            $('#places').html(template);
            console.log(places);
        }catch(e){
            $('#places').html(response);
        }
        })
    };

})