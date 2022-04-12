$('.work-days-start[name="1_start"]').on('change', function(){
    let works_day_start_time=$(this).val()
    $('.work-days-start').not( '[name="6_start"], [name="7_start"]').val(works_day_start_time)

})
$('.work-days-end[name="1_end"]').on('change', function(){
    
    let works_day_end_time=$(this).val()
    $('.work-days-end').not( '[name="6_end"], [name="7_end"]').val(works_day_end_time)

})
