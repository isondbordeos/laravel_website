$(document).ready(function(){
    $('#profile-image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#show-profile-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });

    $('#slider-image').change(function(e){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#show-slider-image').attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
    });
});