<!-- price range -->
<script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var min_price = parseInt($("#min_price").val());
        var max_price = parseInt($("#max_price").val());
        var id = '<?php if(isset($data["idcate"][0])){ echo $data["idcate"][0]; } ?>';
        var skill = '';
        var sort = 'desc';

        load_course(min_price,max_price,id,sort,skill);

        $("#price_range").slider({
            range: true,
            min: min_price,
            max: max_price,
            step: 500,
            values: [min_price,max_price],
            slide:function(event, ui){
                $("#amount").val( "฿" + ui.values[ 0 ] + " - ฿" + ui.values[ 1 ] );
                $('#showamount').text( "฿" + ui.values[ 0 ] + " - ฿" + ui.values[ 1 ] );
                $(".loader").fadeIn("slow");

                min_price = ui.values[0];
                max_price = ui.values[1];

                $("#min_price").val(min_price);
                $("#max_price").val(max_price);

                load_course(ui.values[0], ui.values[1], id, sort, skill);
            }
        });

        $("#amount").val( "฿" + $("#price_range").slider( "values", min_price ) + " - ฿" + $("#price_range").slider( "values", 1 ));
        $('#showamount').text( "฿ " + min_price + " - ฿ " + max_price );

        $('.check_cat').click(function(){

            id = $('.check_cat:checked').map(function() { return $(this).val() }).get().join(',');
            load_course(min_price,max_price,id,sort,skill);

        });

        $('.check_skill').click(function(){

            skill = $('.check_skill:checked').map(function() { return $(this).val() }).get().join(',');
            load_course(min_price,max_price,id,sort,skill);

        });

        $(document).on('change', '#sort_order', function(){
            sort = $('#sort_order').val();
            $(".loader").fadeIn("slow");
            load_course(min_price,max_price,id,sort,skill)
        });

        function load_course(minimum_range, maximum_range, category_id, sort, skill)
        {
            $.ajax({
            url:"<?php echo e(url('api/course')); ?>",
            method:"POST",
            data:{minimum_range:minimum_range, maximum_range:maximum_range, category_id:category_id, sort:sort, skill:skill, userxx:'<?php echo session('session_id'); ?>'},
            success:function(data)
                {
                    $(".loader").fadeOut("slow");
                    $('#show_course').fadeIn('slow').html(data);
                }
            });
        }

    });


    $(window).on('hashchange', function() {

        if (window.location.hash) {

            var page = window.location.hash.replace('#', '');

            if (page == Number.NaN || page <= 0) {

                return false;

            }else{

                getData(page);

            }

        }

    });

    $('#term_chk').click(function(){
        var con = $(this).attr('data-st');
        if(con=='n'){
            $(this).attr('data-st','y');
        }else{
            $(this).attr('data-st','n');
        }
    });

    $('.form-signin').submit(function(){
        var x = $('#term_chk').attr('data-st');
        if(x=='n'){
            alert("Please check terms");
            $('#term_chk').focus();
            return false;
        }
    });


    $(document).on('click', '.wishlist', function(){
        var course_id = $(this).attr('course-id');
        var url = '<?php echo url('mywishlist/addwilish'); ?>';
        $.post(url, {'course_id':course_id}, function(data){

            if(data=='Y'){

                Swal.fire({
                title: 'Add Wishlist Success',
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Close',
                }).then((result) => {
                    if (result.value) {
                        window.setTimeout(function(){window.location.reload()},1000)
                    }
                });

            }else if(data=='X'){

                Swal.fire({
                title: 'You have already.',
                type: 'error',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Close',
                });

            }else if(data=='N'){

                window.location.href = '<?php echo url('/login'); ?>';

            }

        });
    });


    function getData(page,minimum_range,maximum_range){

        $.ajax(
        {

            url: '?page=' + page+'&minimum_range'+minimum_range+'&maximum_range'+maximum_range,

            type: "get",

            datatype: "html"

        }).done(function(data){

            $(".loader").fadeOut("slow");

            $("#tag_container").html(data);

            location.hash = page;

        }).fail(function(jqXHR, ajaxOptions, thrownError){

            alert('No response from server');

        });

    }

    $(document).ready(function(){

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e){
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
            });

        }).on('mouseout', function(){
            $(this).parent().children('li.star').each(function(e){
            $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function(){
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            var msg = "";
            if (ratingValue > 1) {
                msg = "Thanks! You rated this " + ratingValue + " stars.";
            }
            else {
                msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            }
            responseMessage(ratingValue);

        });

    });


    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
        $('#rating').val(msg);
    }


</script>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/member/ajax/course/javascript.blade.php ENDPATH**/ ?>