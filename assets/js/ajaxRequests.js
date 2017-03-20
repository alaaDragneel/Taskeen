$(document).ready(function() {
    $(document).on('change', '#city_id', function() {
        console.log($(this).val());
        $.ajax({
            method: 'post',
            url: 'includes/ajaxFiles/getarea.php',
            data:{
                cityID: $(this).val(),
            },
            success: function (response) {
                $('#area_id_cont').removeClass('hidden').html("").append(response);
            }
        });
    });
    $(document).on('change', '#area_id', function() {
        $.ajax({
            method: 'post',
            url: 'includes/ajaxFiles/getsubarea.php',
            data:{
                cityID: $('#city_id').val(),
                areaID: $(this).val(),
            },
            success: function (response) {
                $('#sub_area_id_cont').removeClass('hidden').html("").append(response);
            }
        });
    });
});
