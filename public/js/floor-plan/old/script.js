// --------uploade image and show in div background-------------
function readURL(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = function(e) {
            let data = e.target.result
            let ext_data = data.split(';')[0].split('/')[1]
            let arr_ext = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG']
            if (jQuery.inArray(ext_data, arr_ext) != -1) {
                $('.tbl-div').css({ 'background': 'url(' + data + ')', 'background-size': 'cover' });
                $('#imageUpload-error').html('')
            } else {
                $('#imageUpload-error').html('Only jpg, png or jped format')
            }
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").on('change', function() {
    readURL(this);
});

$arr_tbl = []
$('.send').on('click', function(event) {
        console.log($('#hidden-url').val())
        if ($('#hidden-url').attr('data-name') == 'create-floor-plan') {
            $validate_rules = {
                img: {
                    required: true,
                    accept: "jpg,png,jpeg",
                },
                table_x: {
                    required: true,
                },
                table_y: {
                    required: true,
                },
                hall_name: {
                    required: true,
                },
                description: {
                    required: true,
                    maxlength: 5000,
                    minlength: 30,
                }
            }
        } else {
            $validate_rules = {
                table_x: {
                    required: true,
                },
                table_y: {
                    required: true,
                },
                hall_name: {
                    required: true,
                },
                description: {
                    required: true,
                    maxlength: 5000,
                    minlength: 30,
                }
            }
        }
        // ----------validation form----------------
        $('.send').validate({
            rules: $validate_rules,
            // rules: {
            //     img: {
            //             required: true,
            //             accept: "jpg,png,jpeg",
            //     },
            //     width: {
            //             required: true,
            //     },
            //     height: {
            //             required: true,
            //     },
            //     hall_name: {
            //             required: true,
            //     },
            //     desc: {
            //         required: true,
            //         maxlength: 5000,
            //         minlength: 30,
            //     }
            // },
            messages: {
                img: {
                    required: 'Это поле обязательно к заполнению',
                    accept: 'Только формат jpg, png или jped',
                },
                table_x: {
                    required: 'Это поле обязательно к заполнению',
                },
                table_y: {
                    required: 'Это поле обязательно к заполнению',
                },
                hall_name: {
                    required: 'Это поле обязательно к заполнению',
                },
                description: {
                    required: 'Это поле обязательно к заполнению',
                    minlength: 'Пожалуйста, введите не менее 30 символов.',
                    maxlength: 'Пожалуйста, введите не более 5000 символов.'
                }
            },
            submitHandler: function(form) {
                // form.submit();
                console.log('ook')
                    //--------push (x, y and img) object in array-------
                $('td').each(function() {
                    if ($(this).find('img').length == 1) {
                        $x = $(this).attr('data-x')
                        $y = $(this).attr('data-y')
                        $img = $(this).find('img').attr('data-name')
                        $quantity_chair = $(this).find('input.quantity-chair').val()
                        $table_num = $(this).find('input.table-number').val();
                        $obj = {
                            'x': $x,
                            'y': $y,
                            'img': $img,
                            'quantity_chair': $quantity_chair,
                            'table_number': $table_num
                        }
                        $arr_tbl.push($obj)
                    } else {

                        $obj = {}
                        $arr_tbl.push($obj)

                    }
                })
                console.log($arr_tbl)
                $('#arr-tbl').val(JSON.stringify($arr_tbl))
                $url = $('#hidden-url').val()

                var formData = new FormData(form);
                console.log(formData)
                $.ajax({
                    type: "POST",
                    url: $url,
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {
                        $('.message').html('Отправка . . .')
                    },
                    success: function(result) {
                        console.log(result)
                        $('.message').html('<div class="text-success">Описание зала успешно добавлена</div>')
                        if (result) {
                            setTimeout(function() { location.reload() }, 1500)
                        }
                    }
                })
            }
        })
    })
    // -------create table in background image for floor plane----------------------
$('.create-tbl').on('click', function() {
    $('.tbl').html('')
    $width = Math.round($('.width').val())
    $height = Math.round($('.height').val())
    console.log($width + '----')
    for (let i = 1; i <= $height; i++) {
        $tr = jQuery('<tr/>', {
            id: 'id-' + i,
            "class": 'some-class',
        }).appendTo('.tbl');
        for (let j = 1; j <= $width; j++) {
            jQuery('<td/>', {
                id: 'id-' + i + '-' + j,
                'data-x': j,
                'data-y': i,
                width: 500 / $width + 'px',
                height: 500 / $height + 'px',
                "class": 'some-td ui-droppable',
            }).appendTo($tr);
        }
    }
    drag_drop()
})

// ----------remove table image in table area-------------------------
$(function() {
    $('table').on('click', '.x', function() {
            $(this).parent().remove()
        })
        // --------set class on focuse and remove class on focuseout for input and textarea -----------------
    $("input").on('focus', function() {
        $(this).parent().addClass('is-focused')
    });
    $("input").on('focusout', function() {
        if ($(this).parent().hasClass('is-focused')) {
            $(this).parent().removeClass('is-focused')
        }
        if ($(this).val() != '') {
            $(this).parent().addClass('is-filled')
        } else {
            $(this).parent().removeClass('is-filled')
        }
    })
    $("textarea").on('focus', function() {
        $(this).parent().addClass('is-focused')
    });
    $("textarea").on('focusout', function() {
        if ($(this).parent().hasClass('is-focused')) {
            $(this).parent().removeClass('is-focused')
        }
        if ($(this).val() != '') {
            $(this).parent().addClass('is-filled')
        } else {
            $(this).parent().removeClass('is-filled')
        }
    })
})