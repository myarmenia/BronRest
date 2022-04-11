$(function(){

    $('#exampleInputFile').on('change', function(){
        $('.cont-uploaded-images').html('')

        let arr_ext=['jpg', 'jpeg', 'png', 'JPG', 'JPEG']
        for (let i = 0; i < this.files.length; i++) {
            let reader = new FileReader();

            reader.onload = function (e) {
                let data=e.target.result
                let ext_data=data.split(';')[0].split('/')[1]

                if(jQuery.inArray(ext_data, arr_ext)!=-1){
                     $('.cont-uploaded-images').append('<div class="d-flex cont-img py-3 ml-3" ><div class="new-img" id=new-img-'+i+'></div><div class="delete-img" data-key="'+i+'"><i class="fa fa-close close-icon"></i></div></div>');
                     $('#new-img-'+i).css({'background': 'url('+e.target.result+')', 'background-size': 'contain',
                       'background-repeat': 'no-repeat', 'background-position': 'center'});
                }
            };
            reader.readAsDataURL(this.files[i])
        }

    })
    let arr='';
    $('body').on('click', '.delete-img', function(){

        let dt = new DataTransfer();
        let key=$(this).attr('data-key')
        arr=$('#exampleInputFile')[0].files
        for (let file of arr) {
            dt.items.add(file);
        }
        dt.items.remove(key);

        $('#exampleInputFile')[0].files = dt.files;

        $(this).parent().remove()
    })
})
