<!-- js -->

<script src="<?php echo e(asset('assets/member/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/member/js/slick.js')); ?>"></script>
<script src="<?php echo e(asset('assets/member/js/waypoints.js')); ?>"></script>
<script src="<?php echo e(asset('assets/member/js/jquery.counterup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/member/js/jquery.mixitup.js')); ?>"></script>
<script src="<?php echo e(asset('assets/member/js/jquery.fancybox.pack.js')); ?>"></script>

<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script src="<?php echo e(asset('assets/member/js/custom.js?t'.date('YmdHis'))); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/datepicker/bootstrap-datepicker.js')); ?>"></script>



<script type="text/javascript">
    //loader page
$(window).load(function() {
    $(".loader").fadeOut("slow");

    $('.DataTable').DataTable({
        "pageLength": 50
    });
})

$('#subscribe_frm').on('submit', function(event){
    event.preventDefault();
    var html_error = '<div class="alert alert-danger alert-block"><div class="text-left">Email has already</div></div>';
    var html_success = '<div class="alert alert-success alert-block"><div class="text-left">Thank you for subscribe !!</div></div>';
    var email = $('#email_sub').val();

    $.post('<?php echo e(url('subscribe')); ?>', $( "#subscribe_frm" ).serialize(), function(data) {
        if(data==1){
            $('.alert_sub').slideDown();
            $('.alert_sub').html(html_error);
        }else{
            $('.alert_sub').slideDown();
            $('.alert_sub').html(html_success);
        }
    });
    setTimeout(function() { $('.alert_sub').slideUp(); },3000);
});


$('#subscribe_frm_mobile').on('submit', function(event){
    event.preventDefault();
    var html_error = '<div class="alert alert-danger alert-block"><div class="text-left">Email has already</div></div>';
    var html_success = '<div class="alert alert-success alert-block"><div class="text-left">Thank you for subscribe !!</div></div>';
    var email = $('#email_sub_mobile').val();

    $.post('<?php echo e(url('subscribe')); ?>', $( "#subscribe_frm_mobile" ).serialize(), function(data) {
        if(data==1){
            $('.alert_sub_mobile').slideDown();
            $('.alert_sub_mobile').html(html_error);
        }else{
            $('.alert_sub_mobile').slideDown();
            $('.alert_sub_mobile').html(html_success);
        }
    });
    setTimeout(function() { $('.alert_sub_mobile').slideUp(); },3000);
});


//checked payment
$("#payment1").click(function()
{
    $('#order_price').val($(this).attr('data-price'));
    $('#amount').val($(this).attr('data-amount'));
    $("#checked_payment1").show();
    $("#checked_payment2").hide();
    $("#checked_payment3").hide();
});
$("#payment2").click(function()
{
    $("#checked_payment1").hide();
    $("#checked_payment2").show();
    $("#checked_payment3").hide();
});
// $("#payment3").click(function()
// {
//     $("#checked_payment1").hide();
//     $("#checked_payment2").hide();
//     $("#checked_payment3").show();
// });

$(document).ready(function(){
    $('#p1').click(function(){
        $('.p1').addClass('border-payment-active');
        $('.p2').removeClass('border-payment-active');
    });
    $('#p2').click(function(){
        $('.p2').addClass('border-payment-active');
        $('.p1').removeClass('border-payment-active');
    });
});
</script>


<!-- confirm delete -->
<script type="text/javascript" charset="utf-8">
    function confirm_delete(url,id){
Swal.fire({
  title: 'Comfirm delete data!',
  text: "You are sure to delete this data!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Confirm',
  cancel: 'Cancel'
}).then((result) => {
  if (result.value) {
    window.location = url+'/'+id;
  }
})
}
</script>


<!-- favorite course-->
<script type="text/javascript">
    function save_favorite_course(id){

var url_favorite = "<?php echo e(url('course/favorite/save/')); ?>/"+id;

 $.ajax({
        type:"get",
        url:url_favorite,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function (data) {

    if(data.result==true){

      swal.fire({
          type: 'success',
          title: 'Success',
          text: data.message,
          showConfirmButton: false,
          timer: 3000
            })

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 3000
            })

          }


        }


            });

}
</script>


<!-- review course -->
<script type="text/javascript">
    //btn show rating
$("#btn_rating").click(function() {
var session_id = "<?php echo e(session('session_id')); ?>";
var register = "<?php echo e(url('register')); ?>";
if(session_id==''){
Swal.fire({
  title: 'Please login!',
  html: "<font color=red>Please login to use this section!</font><br><br>หรือ<br><br><a href="+register+"><U>New register</U></a>",
  type: 'warning',
  showConfirmButton: false,
})
}
else{
$('#show_rating').slideDown("slow");
}
});

// select rating
$(".rateButton").click(function() {
  if($(this).hasClass('btn-grey')) {
    $(this).removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
    $(this).prevAll('.rateButton').removeClass('btn-grey btn-default').addClass('btn-warning star-selected');
    $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
  } else {
    $(this).nextAll('.rateButton').removeClass('btn-warning star-selected').addClass('btn-grey btn-default');
  }
  $("#rating").val($('.star-selected').length);
});

//cancel rating
$("#cancelReview").click(function() {
    $("#show_rating").slideUp('slow');
  });

//insert rating
$('#ratingForm').on('submit', function(event){
event.preventDefault();
var formData = $(this).serialize();
$.ajax({
type : 'POST',
url : "<?php echo e(url('api/course/review')); ?>",
data : formData,
dataType: "json",
success:function(data){
$("#ratingForm")[0].reset();

if(data.result==true){

      Swal.fire({
      title: data.message,
      type: 'success',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ตกลง',
    }).then((result) => {
      if (result.value) {
        window.setTimeout(function(){window.location.reload()},1000)
      }
    })

     }

     else {

        swal.fire({
          type: 'error',
          title: 'Error',
          text: data.message,
          showConfirmButton: false,
          timer: 2500
            })

          }
// window.setTimeout(function(){window.location.reload()},1000)
}

});
});




//payment
function payment_order(type,price){

    $("#price").val(price);

    if(type==1){
        $("#payment_credit_card").modal('show');
    }else{
        if(price==0){
            $("#payment_transfer_free").modal('show');
            $("#price_free").val(price);
        }else{
            $("#payment_transfer").modal('show');
        }
    }

}


// show lesson
function show_lesson(name,vdo_url,content){

    $("#show_lesson_modal").modal('show');

    $("#lesson_name").html(name);

    $("#lesson_vdo_url").html('<div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="'+vdo_url+'"></iframe></div>');

    $("#lesson_content").html(content);

}


</script>


<script type="text/javascript">
    //testing course
$('#testing_course_save').on('submit', function(e){

    e.preventDefault();

    var formData = new FormData($(this)[0]);

    var url_api = "<?php echo e(url('api/mycourse/testing/save')); ?>";

    $.ajax({

        type : 'post',
        url : url_api,
        data : formData,
        dataType: "json",
        async: false,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){

            $("#testing_course_save")[0].reset();

            if(data.result==true){

                if(data.step!=4){

                    var url_after = "<?php echo e(url('mycourse/testing')); ?>"+'/'+data.id+'/'+data.title+'/'+data.step;

                }else{

                    var url_after = "<?php echo e(url('mycourse/testing/score')); ?>"+'/'+data.score_pretest+'/'+data.score_posttest+'/'+data.title+'/'+data.question_amount+'/'+data.status;

                }

                swal.fire({
                type: 'success',
                html: data.message,
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'OK',
                }).then((result) => {
                    if (result.value) {
                        window.location=url_after;
                    }
                });

            }else{

                swal.fire({
                    type: 'error',
                    title: 'Error',
                    text: data.message,
                    showConfirmButton: false,
                    timer: 2500
                });
            }

        }

    });
});
</script>


<?php echo $__env->make('page.member.ajax.course.javascript', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/layouts/member/javascripts.blade.php ENDPATH**/ ?>