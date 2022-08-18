$(document).ready(function(){
    $('#profile-image').change(function(e){
        showSelectedImg(e, $(this).attr('id'));
    });

    $('#slider-image').change(function(e){
        showSelectedImg(e, $(this).attr('id'));
    });

    $('#about-img').change(function(e){
        showSelectedImg(e, $(this).attr('id'));
    });
});

function showSelectedImg(e, elemId){
    var reader = new FileReader();
        reader.onload = function(e){
            $('#show-'+elemId).attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
}