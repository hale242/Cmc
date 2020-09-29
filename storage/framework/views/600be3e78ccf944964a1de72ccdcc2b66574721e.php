<!-- js -->
<script src="<?php echo e(asset('assets/admin/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/bootstrap.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/app.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/app.plugin.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/easypiechart/jquery.easy-pie-chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/flot/jquery.flot.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/flot/jquery.flot.tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/flot/jquery.flot.resize.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/flot/jquery.flot.grow.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/charts/flot/demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/calendar/bootstrap_calendar.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/calendar/demo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/admin/js/sortable/jquery.sortable.js')); ?>"></script>

<script src="<?php echo e(asset('assets/admin/js/datatables/jquery.dataTables.js')); ?>"></script>


<script src="<?php echo e(asset('assets/admin/js/datepicker/bootstrap-datepicker.js')); ?>"></script>


<script src="<?php echo e(asset('assets/admin/js/fancybox/jquery.fancybox.js')); ?>"></script>


<script type="text/javascript">
    //loader page
$(window).load(function() {
    $(".loader").fadeOut("slow");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})


$(document).on('click', '.payment_id', function(){
    var id = $(this).attr('data-id');
    var ordernote = $('#ordernote_'+id).val();
    var token = $('input[name=_token]').val();
    var url = '<?php echo url('admin/orders/Status/action'); ?>';
    // console.log(url);
    $.post(url,{'id':id,'status':3,ordernote:ordernote,'_token':token},function(data){
        location.reload();
        $('.modal').modal('hide');
    });
});




//add row pretest posttest
$("#question_type").change(function() {
    if($("#question_type").val()==1){
        $("#show_question2").hide();
        $("#show_question1").slideDown();
    }else if($("#question_type").val()==2){
        $("#show_question1").slideUp();
        $("#show_question2").show();
    }else{
        $("#show_question1").slideUp();
        $("#show_question2").hide();
    }
});

//add row auto
$(function(){

    // $('#form_pre_post')[0].reset();
    // console.log(check);

    $("#addRow").click(function(obj){
        $('#mytbl tbody tr').last().clone().appendTo('#mytbl tbody');
        $('#mytbl tbody tr').last().find('input:text').val('');

    });

    $("#addRow2").click(function(obj){

      var text = '<div class="form-group col-sm-10"><label><b>Choice</b></label><input name="choices[]" type="text" class="form-control" placeholder="Choice" required></div> <div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="radio" value="true"></div></div>';

      // var text = '<div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="checkbox" value="true"></div></div>';

      // var text .= '<div class="form-group col-sm-2">&nbsp;&nbsp;<label><b>Answer</b></label><div style="padding: 5px;">&nbsp;&nbsp;&nbsp;&nbsp;<input name="answers[]" type="checkbox" value="true"></div></div>';

      // $('#add_row').append(text);
        $('#add_row').last().append(text);
        $('#add_row').last().find('input:text').val('');
    });

    $("#addRow3").click(function(obj){
        $('.mytbl3 tbody tr').last().clone().appendTo('.mytbl3 tbody');
        $('.mytbl3 tbody tr').last().find('input:text').val('');
    });



    });

   function doRemoveItem(obj){
        // if($('#mytbl').size() >= 1){
        //     if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
        // }else{
        //     alert('ไม่อนุญาตให้ลบแถวที่เหลือนี้ได้');
        //     return false;
        // }
        if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
    }

    function doRemoveItem2(obj){
        // if($('.mytbl2 tbody tr').size() > 1){
        //     if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
        // }else{
        //     alert('ไม่อนุญาตให้ลบแถวที่เหลือนี้ได้');
        //     return false;
        // }

        if(confirm('คุณต้องการลบแถวนี้?')) $(obj).parent().parent().remove();
    }

 //end
</script>


<script type="text/javascript">
    function gen_pass(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }

   $("#show_gen_pass").val(result);
}
</script>


<!--welcome admin-->
<?php if(Session::has('login_success')): ?>
<script type="text/javascript" charset="utf-8">
    Swal.fire({
  type: 'success',
  title: 'ยินดีต้อนรับผู้ดูแลระบบ',
  showConfirmButton: false,
  timer: 3000
})
</script>
<?php endif; ?>

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

<!-- show video -->
<script type="text/javascript" charset="utf-8">
    function show_video(name,url) {

if(url==''){
var url = "<hr><span class=text-danger>ไม่พบวิดีโอ!</span>";
}
else{
var url = "<hr><iframe width=400 src="+url+"></iframe>";
}

Swal.fire({
  title: name,
  html: url,
  showConfirmButton: false
})
}
</script>


<!-- select2 category data -->
<script type="text/javascript">
    $(document).ready(function() {
    /*กำหนดให้ class js-data-example-ajax  เรียกใช้งาน Function Select 2*/
    $(".select2_category_data").select2({
      ajax: {
        url: "<?php echo e(url('api/admin/category/getdata')); ?>",/* Url ที่ต้องการส่งค่าไปประมวลผลการค้นข้อมูล*/
        dataType: 'json',
        delay: 250,
        data: function (params) {

          return {
            q: params.term, // ค่าที่ส่งไป
            page: params.page
          };

        },
        processResults: function (data, params) {
          // parse the results into the format expected by Select2
          // since we are using custom formatting functions we do not need to
          // alter the remote JSON data, except to indicate that infinite
          // scrolling can be used
          params.page = params.page || 1;

          return {
            results: data.items,
            pagination: {
              more: (params.page * 30) < data.total_count
            }
          };
        },
        cache: true
      },
      escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
      minimumInputLength: 1,
      templateResult: formatRepo, // omitted for brevity, see the source of this page
      templateSelection: formatRepoSelection // omitted for brevity, see the source of this page
    });

});


function formatRepo (repo) {

  if (repo.loading) return repo.text;

  var markup = "<div class='select2-result-repository clearfix'>" +
    "<div class='select2-result-repository__meta'>" +
      "<div class='select2-result-repository__title'>" + repo.value + "</div></div></div>";

  return markup;
}


function formatRepoSelection (repo) {
  return repo.value || repo.text;
}

</script>


<!-- form course -->
<script type="text/javascript">

    // function setInputFilter(textbox, inputFilter) {
    //     ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
    //         textbox.addEventListener(event, function() {
    //         if (inputFilter(this.value)) {
    //             this.oldValue = this.value;
    //             this.oldSelectionStart = this.selectionStart;
    //             this.oldSelectionEnd = this.selectionEnd;
    //         } else if (this.hasOwnProperty("oldValue")) {
    //             this.value = this.oldValue;
    //             this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
    //         } else {
    //             this.value = "";
    //         }
    //         });
    //     });
    // }

    // setInputFilter(document.getElementById("price"), function(value) {
    //     return /^-?\d*$/.test(value);
    // });
    // setInputFilter(document.getElementById("score"), function(value) {
    //     return /^-?\d*$/.test(value);
    // });


    $("#form_course").on("submit",function(e){
        e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

        /*==Form Validate==*/
            if($('#course_name').val()==''){
                $('#course_name').focus().addClass('has-error');
                $('#course_name_help').removeClass('hide');
                return false;
            }else{
                $('#course_name').removeClass('has-error');
                $('#course_name_help').addClass('hide');
            }

            if($('#category').val()==''){
                $('#category').focus().addClass('has-error');
                $('#category_help').removeClass('hide');
                return false;
            }else{
                $('#category').removeClass('has-error');
                $('#course_name_help').addClass('hide');
            }

            if($('#teacher').val()==''){
                $('#teacher').focus().addClass('has-error');
                $('#teacher_help').removeClass('hide');
                return false;
            }else{
                $('#teacher').removeClass('has-error');
                $('#teacher_help').addClass('hide');
            }

            if($('#price').val()==''){
                $('#price').focus().addClass('has-error');
                $('#price_help').removeClass('hide');
                return false;
            }else{
                $('#price').removeClass('has-error');
                $('#price_help').addClass('hide');
            }

            if($('#short_description').val()==''){
                $('#short_description').focus().addClass('has-error');
                $('#short_description_help').removeClass('hide');
                return false;
            }else{
                $('#short_description').removeClass('has-error');
                $('#short_description_help').addClass('hide');
            }

            if($('#full_description').val()==''){
                $('#cke_full_description').focus().addClass('has-error');
                $('#full_description_help').removeClass('hide');
                return false;
            }else{
                $('#cke_full_description').removeClass('has-error');
                $('#full_description_help').addClass('hide');
            }

            if($('#course_curriculum').val()==''){
                $('#cke_course_curriculum').focus().addClass('has-error');
                $('#course_curriculum_help').removeClass('hide');
                return false;
            }else{
                $('#cke_course_curriculum').removeClass('has-error');
                $('#course_curriculum_help').addClass('hide');
            }

            if($('#course_instructor').val()==''){
                $('#cke_course_instructor').focus().addClass('has-error');
                $('#course_instructor_help').removeClass('hide');
                return false;
            }else{
                $('#cke_course_instructor').removeClass('has-error');
                $('#course_instructor_help').addClass('hide');
            }

            if($('#type_action').val()=='Create'){
                if($('#img').val()==''){
                    $('#img').focus().addClass('has-error');
                    $('#img_help').removeClass('hide');
                    return false;
                }else{
                    $('#img').removeClass('has-error');
                    $('#img_help').addClass('hide');
                }
            }
        /*==Form Validate==*/


        var formData = new FormData($(this)[0]);
        var url_api = "<?php echo e(url('api/admin/course/Main/action')); ?>";

        $.ajax({

            type:"post",
            url:url_api,
            data:formData,
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
                        text: data.message
                    }).then(function() {
                        if(data.type=='add'){
                            location.href = "<?php echo e(url('admin/course/main')); ?>";
                        }else{
                            location.reload();
                        }
                    });

                }else {
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

    // End From Course

    function chk_validate(inputname){
        if($(inputname).val()==''){
            $(inputname).focus().css('border','1px solid #ff0000');
            return false;
        }else{
            $(inputname).css('border','1px solid #d9d9d9');
        }
    }

</script>



<script type="text/javascript">
    $(function(){

        var i=0;
        var x=0;
        // Add Answer input
        $(document).on('click', '.btn-add-ans', function(){
            i++;
            x++;
            html = '<div id="ans'+i+'" class="inputclone input-group" style="margin-top:5px;">'+
                    '<span class="input-group-addon bg-answer">Answer</span>'+
                    '<input type="text" name="answer[]" id="answer'+i+'" class="ansinput form-control">'+
                    '<span class="input-group-addon">'+
                        '<input type="file" name="choice_img[]" id="choice_img_'+x+'" dataimg="img-'+i+'" class="choice_img">'+
                    '</span>'+
                    '<span class="input-group-addon">'+
                        '<input type="checkbox" name="chkanswer_t[]" class="chkanswer_t" style="width: 16px;height: 16px;cursor: pointer;">'+
                    '</span>'+
                    '<span class="input-group-addon">'+
                        '<i class="fa fa-minus btn btn-danger btn-sm btn-remove-ans" id='+i+'></i>'+
                    '</span></div>';

            $('#cou_ans_file').val(x);
            $('.show_ans').append(html);
        });

        // Remove Answer input
        $(document).on('click', '.btn-remove-ans', function(){
            var button_id = $(this).attr("id");
            var coux = $('#cou_ans_file').val();
            var cc = parseInt(coux-1);
            x = cc;
            $('#cou_ans_file').val(cc);
            $('#ans'+button_id).remove();
        });

        $(document).on('click', '#question', function(){
            var question = $('#question').val();
            if(question!=''){
                $('#question').removeClass('has-error');
                $('#question_help').addClass('hide');
            }
        });

        $(document).on('change', '#choice_img', function(){
            var tester = $(this).attr('dataimg');
            var filesques = $(this)[0].files[0];
        });

        // Add Question Button #Save
        $(document).on('click', '#add-question', function(){
            SaveQuestion();
        });

        // Edit Question Button #Save
        $(document).on('click', '#edit-question', function(){
            SaveQuestion();
        });

        // Delete Question Button
        $(document).on('click', '.btn_del_question', function(){

            var question_id = $(this).attr('question-id');
            var test_id = $(this).attr('test-id');

            var url_del = "<?php echo e(url('admin/course/deletequestion/')); ?>";
            var url_div = "<?php echo e(url('admin/course/loadquestion/')); ?>"+"/"+test_id;
            var token = $('input[name=_token]').val();

            swal.fire({
                title: 'Are you sure?',
                text: "You will not be able to bring it back!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    );
                    $.post(url_del,{'id':question_id,'_token':token},function(data){
                        if(data=='Y'){
                            $('#showall_item').load(url_div);
                            cancelbtn();
                        }else{
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Can not Delete',
                                showConfirmButton: false,
                                timer: 2500
                            });
                        }
                    });
                }
            });


        });

        // Edit Question Button #Load
        $(document).on('click', '.btn_edit_question', function(){
            $('#question_old_img').val('');
            var question_id = $(this).attr('question-id');
            var question_cou = $(this).attr('q-count');
            var question_text = $(this).attr('data-q');
            var test_id = $(this).attr('test-id');
            var token = $('input[name=_token]').val();
            var anscheck = '';
            var imgchoice = '';
            var delimgchoice = '';

            $('#questionid').val(question_id);
            $('#question').val(question_text);
            $('#add-question').hide();
            $('#edit-question').removeClass('hide');
            $('#cancel-question').removeClass('hide');
            $('#question').removeClass('has-error');
            $('#question_help').addClass('hide');
            $('.inputclone').remove();

            var url_que = "<?php echo e(url('admin/course/loadquestionedit/')); ?>"+"/"+question_id;
            var url_div = "<?php echo e(url('admin/course/loadchoice/')); ?>"+"/"+question_id;
            var url_img = "<?php echo e(url('upload/member/choice/')); ?>";
            var url_queimg = "<?php echo e(url('upload/member/question/')); ?>";

            $.get(url_que,function(data){
                var que_img = data[0]['question_img'];

                if(que_img!=null){
                    $('.que_img').removeClass('hide');
                    $('.que_img').html('<a href="'+url_queimg+'/'+que_img+'" class="fancy-box" data-fancybox="question_img" title="Click To View"><img src="'+url_queimg+'/'+que_img+'" style="width:50px;height: 25px;" /></a>');
                    $('.que_img_del').removeClass('hide');
                    $('.que_img_del').html('<i class="fa fa-times btn btn-sm btn-danger delete_question_img" title="Click To Delete Image" data-id="'+question_id+'" data-img="'+que_img+'"></i>');
                    $('#question_old_img').val(que_img);

                }else{
                    $('.que_img').addClass('hide').html('');
                    $('.que_img_del').html('').addClass('hide');
                }
            });

            $.get(url_div,function(data){
                // console.log(data);
                // console.log(data[0]['answer']);
                // console.log(data.length)
                for(var x=0;x<data.length;x++){

                    if(data[x]['answer']=="true"){
                        anscheck = "checked";
                    }else{
                        anscheck = "";
                    }

                    if(data[x]['choice_img']!=null){
                        imgchoice = '<span id="imgshow'+data[x]['choice_id']+'" class="input-group-addon"><a href="'+url_img+'/'+data[x]['choice_img']+'" class="fancy-box" data-fancybox="choice_img" title="Click To View">'+
                                    '<img src="'+url_img+'/'+data[x]['choice_img']+'" style="width:50px;height: 25px;" /></a></span>'+
                                    '<input type="hidden" name="choi_img[]" value="'+data[x]['choice_img']+'" data-id='+data[x]['choice_id']+' >';
                        delimgchoice = '<span id="imgdel'+data[x]['choice_id']+'" class="input-group-addon"><i class="fa fa-times btn btn-sm btn-danger delete_choice_img" title="Click To Delete Image" data-id="'+data[x]['choice_id']+'" data-img="'+data[x]['choice_img']+'"></i></span>';
                    }else{
                        imgchoice = '<input type="hidden" name="choi_img[]" value="null" data-id="'+data[x]['choice_id']+'" >';
                        delimgchoice = '';
                    }

                    html = '<div id="ansx'+data[x]['choice_id']+'" class="inputclone input-group" style="margin-top:5px;">'+
                        '<span class="input-group-addon bg-answer">Answer</span>'+
                        '<input type="text" name="answer[]" id="answer'+x+'" class="ansinput form-control" data-id='+data[x]['choice_id']+' value="'+data[x]['choice']+'">'+imgchoice+delimgchoice+
                        '<span class="input-group-addon">'+
                            '<input type="file" name="choice_img[]" class="choice_img" data-id='+data[x]['choice_id']+' >'+
                        '</span>'+
                        '<span class="input-group-addon">'+
                            '<input type="checkbox" name="chkanswer_t[]" class="chkanswer_t" data-id='+data[x]['choice_id']+' style="width: 16px;height: 16px;cursor: pointer;"'+ anscheck +'>'+
                        '</span>'+
                        '<span class="input-group-addon">'+
                            '<i class="fa fa-minus btn btn-danger btn-sm btn-remove-ans-edit" data-id='+data[x]['choice_id']+' test-id='+test_id+'></i>'+
                        '</span><input type="hidden" name="question_id" id="question_id" value="'+question_id+'" /></div>';

                    $('.show_ans').append(html);
                }

            });

        });

        $(document).on('click', '.delete_question_img', function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-img');
            var url_del = "<?php echo e(url('admin/course/deleteimage/')); ?>";
            var token = $('input[name=_token]').val();
            deleteimage(id, 'question', name, url_del, token);
        });

        $(document).on('click', '.delete_choice_img', function(){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-img');
            var url_del = "<?php echo e(url('admin/course/deleteimage/')); ?>";
            var token = $('input[name=_token]').val();
            deleteimage(id, 'choice', name, url_del, token);
        });

        // Delete Choice Button From Edit
        $(document).on('click', '.btn-remove-ans-edit', function(){
            var choice_id = $(this).attr("data-id");
            var test_id = $(this).attr('test-id');

            // console.log(test_id);

            var url_del = "<?php echo e(url('admin/course/deletechoice/')); ?>";
            var url_div = "<?php echo e(url('admin/course/loadquestion/')); ?>"+"/"+test_id;
            var token = $('input[name=_token]').val();

            if(choice_id!=''){
                    swal.fire({
                        title: 'Are you sure?',
                        text: "You will not be able to bring it back!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                            );

                            $('#ansx'+choice_id).remove();

                            $.post(url_del,{'id':choice_id,'_token':token},function(data){
                                if(data=='Y'){
                                    $('#showall_item').load(url_div);
                                }else{
                                    swal.fire({
                                        type: 'error',
                                        title: 'Error',
                                        text: 'Can not Delete',
                                        showConfirmButton: false,
                                        timer: 2500
                                    });
                                }
                            });
                        }
                    });
                }
        });

        // Cancel Button
        $(document).on('click', '#cancel-question', function(){
            cancelbtn();
        });

        // Save Question
        function SaveQuestion(){
            var question_id = $('#questionid').val();
            var question = $('#question').val();
            var question_old_img = $('#question_old_img').val();
            var test_id = $('#test_id').val()
            // var values = $("input[name='answer[]']").map(function(){ return $(this).val().replace(/[!"#$%&'()*+,.\/:;<=>?@[\\\]^`{|}~]/g,';'); }).get();
            var values = $("input[name='answer[]']").map(function(){ return $(this).val().replace(/,/g,';'); }).get();
            var checker = $("input[name='chkanswer_t[]']").map(function(){ return $(this).prop("checked"); }).get();
            var url_api = "<?php echo e(url('api/admin/course/addquestion')); ?>";
            var url_div = "<?php echo e(url('admin/course/loadquestion/')); ?>"+"/"+test_id;
            var filesques = $('#question_img')[0].files[0];
            var totalfiles =$('#cou_ans_file').val();
            var input_choi = $('.ansinput').length;
            var img_choi = $('.choice_img').length;
            var ans_img = [];
            var img_data = '';

            var choice_id = $("input[name='answer[]']").map(function(){ return $(this).attr('data-id'); }).get();
            var choice_img = $("input[name='choi_img[]']").map(function(){ return $(this).val(); }).get();

            // Check validate Question
            if(question==''){
                $('#question').addClass('has-error');
                $('#question_help').removeClass('hide');
                return false;
            }

            // console.log(values);
            // return false;

            if(question_id==undefined || question_id==''){
                // console.log("Add New");
                var fd = new FormData();
                    fd.append('mode','new');
                    fd.append('test_id',test_id);
                    fd.append('question',question);
                    fd.append('question_img',filesques);
                    fd.append('imglen',img_choi);
                    fd.append('ans',values);
                    fd.append('chek',checker);
                    for(var x=0;x<img_choi;x++){
                        fd.append('ans_img['+x+']',$('.choice_img')[x].files[0]);
                    }

                    // var xxf = encodeURIComponent(fd);

                    $.ajax({
                    url: url_api,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#showall_item').load(url_div);
                        cancelbtn();
                    }
                });
            }else{
                // console.log("Edit");
                var fd = new FormData();
                    fd.append('mode','edit');
                    fd.append('test_id',test_id);
                    fd.append('question_id',question_id);
                    fd.append('question',question);
                    fd.append('question_old_img',question_old_img);
                    fd.append('question_img',filesques);
                    fd.append('imglen',img_choi);
                    fd.append('ans',values);
                    fd.append('oldans',choice_id);
                    fd.append('oldansimg',choice_img);
                    fd.append('chek',checker);
                    for(var x=0;x<img_choi;x++){
                        fd.append('ans_img['+x+']',$('.choice_img')[x].files[0]);
                    }

                    $.ajax({
                    url: url_api,
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(response){
                        $('#showall_item').load(url_div);
                        cancelbtn();
                    }
                });

            }

        }

        // Delete Image single
        function deleteimage(id, type, name, url_del, token){
            if(id!=''){
                swal.fire({
                    title: 'Are you sure?',
                    text: "You will not be able to bring it back!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {

                    $.post(url_del,{'type':type,'id':id,'img':name,'_token':token},function(data){

                        if(data=='Y'){
                            $('#imgshow'+id).addClass('hide');
                            $('#imgdel'+id).addClass('hide');

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );

                        }else if(data=='Q'){
                            $('.que_img').addClass('hide');
                            $('.que_img_del').addClass('hide');

                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );

                        }
                    });

                });
            }
        }

        // Cancle to blank
        function cancelbtn(){
            $('.ansinput').val('');
            $('#question').val('');
            $('#questionid').val('');
            $('#question_img').val('');
            $('.inputclone').remove();
            $('.que_img').addClass('hide');
            $('.que_img').html('');

            $('#add-question').show();
            $('#edit-question').addClass('hide');
            $('#cancel-question').addClass('hide');
        }

    });

</script>



<!-- form pre post -->
<script type="text/javascript">
    $("#form_pre_post").on("submit",function(e){
        e.preventDefault(); // ปิดการใช้งาน submit ปกติ เพื่อใช้งานผ่าน ajax

        var formData = new FormData($(this)[0]);

        var url_api = "<?php echo e(url('api/admin/course/Pretest/action')); ?>";

            $.ajax({
                type:"post",
                url:url_api,
                data:formData,
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
                            text: data.message
                        }).then(function() {
                            location.reload()
                        });

                    }else{

                        swal.fire({
                            type: 'error',
                            title: 'Error',
                            text: data.message,
                            showConfirmButton: false,
                            timer: 2500
                        })
                    }

                }


            });
    });

</script>


<!-- modal create lesson -->
<script type="text/javascript">

    $(document).ready(function(){
        var editor = CKEDITOR.replace( 'detail', {
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        } );
        editor.on( 'change', function( evt ) {
            $('#detail').val(evt.editor.getData());
        });
    });

    function btn_create_lesson (type_action,lesson_file,course_id,lesson_id,lesson_name,vdo_url,detail,status){

        $('#form_create_lesson')[0].reset();
        $('#lesson_file').html('');

        $("#modal_create_lesson").modal('show');

        if(type_action=='Create')
        {
            $(".type_action").val(type_action);
            $(".course_id").val(course_id);
            $("#download_file").hide();
            CKEDITOR.instances['detail'].setData('');
        }
        else
        {
            var url_div = "<?php echo e(url('admin/course/loadlession/')); ?>"+"/"+lesson_id;
            $('#lesson_file').empty();
            $.get(url_div,function(data){
                $.each(data, function(k, v) {
                    var filename = v['lesson_file'];
                    var namefile = filename.substr(14, 25)+'...';
                    $("#lesson_file").append('<div class="col-md-4">'+
                        '<a target="_blank" data-fancybox="gallery_lession'+v['lesson_id']+'" style="border: 1px solid #ccc;padding: 5px;margin-right: -8px;margin-bottom: 5px;" href="<?php echo e(asset('upload/member/lesson/file/')); ?>/'+v['lesson_file']+'">'+namefile+'</a>&nbsp;&nbsp;'+
                        '<button type="button" class="btn-delete-file btn btn-sm btn-danger" style="margin-top: 2px;margin-bottom: 5px;" lession-id="'+lesson_id+'" data-id="'+v['lesson_file']+'"><i class="fa fa-trash-o"></i></button></div>');
                });
            });

            var url_div = "<?php echo e(url('admin/course/loadcontentlession/')); ?>"+"/"+lesson_id;
            $.get(url_div,function(data){
                // console.log(data['lesson_content']);
                detail = data['lesson_content']
                CKEDITOR.instances['detail'].setData(detail);
            });

            $(".type_action").val(type_action);
            $("#lesson_id").val(lesson_id);
            $("#lesson_name").val(lesson_name);
            $("#vdo_url").val(vdo_url);
            $("#filename_hidden").val(filename_hidden);
            // $(".detail").val(detail);

            if(status==1){
                $('#status').prop('checked', true);
            }
            else{
                $('#status').prop('checked', false);
            }

        }

        // Delete Lession File
        $(document).on('click', '.btn-delete-file', function(){
            var id = $(this).attr('data-id');
            var lession_id = $(this).attr('lession-id');
            var url_del = "<?php echo e(url('admin/course/delete/LessonFileDelete/')); ?>"+"/"+id;

            swal.fire({
                title: 'Are you sure?',
                text: "You will not be able to bring it back!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    );
                    $.get(url_del,function(data){
                        if(data=='Y'){
                            var url_div = "<?php echo e(url('admin/course/loadlession/')); ?>"+"/"+lesson_id;
                            $('#lesson_file').empty();
                            $.get(url_div,function(data){
                                $.each(data, function(k, v) {
                                    var filename = v['lesson_file'];
                                    var namefile = filename.substr(14, 25)+'...';
                                    $("#lesson_file").append('<div class="col-md-4">'+
                                        '<a target="_blank" data-fancybox="gallery_lession'+v['lesson_id']+'" style="border: 1px solid #ccc;padding: 5px;margin-right: -8px;margin-bottom: 5px;" href="<?php echo e(asset('upload/member/lesson/file/')); ?>/'+v['lesson_file']+'">'+namefile+'</a>&nbsp;&nbsp;'+
                                        '<button type="button" class="btn-delete-file btn btn-sm btn-danger" style="margin-top: 2px;margin-bottom: 5px;" lession-id="'+lesson_id+'" data-id="'+v['lesson_file']+'"><i class="fa fa-trash-o"></i></button></div>');
                                });
                            });
                        }else{
                            swal.fire({
                                type: 'error',
                                title: 'Error',
                                text: 'Can not Delete',
                                showConfirmButton: false,
                                timer: 2500
                            });
                        }
                    });
                }
            });
        });
        // End Delete Lession File



    }
</script>



<!-- modal create banner -->
<script type="text/javascript">
    function btn_banner_slide (type_action,id,img_banner,banner_title,banner_url){

$('#form_create_banner_slide')[0].reset();

$("#modal_create_banner_slide").modal('show');
$(".type_action").val(type_action);
$(".banner_id").val(id);
if(type_action=='Edit'){
$("#show_banner").html("<img src='<?php echo e(asset('')); ?>/upload/admin/banner/images/"+img_banner+"'width=550'>");
}
else{
$("#show_banner").html('');
}
$(".img_banner").val(img_banner);
$(".banner_title").val(banner_title);
$(".banner_url").val(banner_url);
}
</script>
<?php /**PATH /home/cmcbiote/public_html/resources/views/layouts/admin/javascripts.blade.php ENDPATH**/ ?>