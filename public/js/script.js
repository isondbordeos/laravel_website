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

    $('#update-multi-img').change(function(e){
        showSelectedImg(e, $(this).attr('id'));
    });
    
});

$(function(){
    $(document).on('click','#delete-multi-img',function(e){
        e.preventDefault();
        var link = $(this).attr("href");
  
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete This Data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
        }) 


    });
});

function showSelectedImg(e, elemId){
    var reader = new FileReader();
        reader.onload = function(e){
            $('#show-'+elemId).attr('src', e.target.result);
        }
        reader.readAsDataURL(e.target.files['0']);
}