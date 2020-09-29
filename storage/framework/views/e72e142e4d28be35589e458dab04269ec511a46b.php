<?php
    $number = sizeof($data['question']);
?>

<?php if($data['question']!=''): ?>
    <?php $__currentLoopData = $data['question']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="manage">
            <i class="btn btn-sm btn-warning fa fa-pencil btn_edit_question" q-count="<?php echo e($nc = sizeof($data['choice'])); ?>" question-id="<?php echo e($item['question_id']); ?>" data-q="<?php echo e($item['question']); ?>" test-id="<?php echo e($data['pre_post_test']); ?>"></i>
            <i class="btn btn-sm btn-danger fa fa-times btn_del_question" question-id="<?php echo e($item['question_id']); ?>" test-id="<?php echo e($data['pre_post_test']); ?>"></i>
        </div>
        <div class="alert alert-success">
            <b>Question # <?php echo e($number--); ?> : <?php echo e($item['question']); ?></b>
            <div class="m-t">
                <div><i class="fa fa-trash"></i></div>
                <?php $__currentLoopData = $data['choice'][$key]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyans => $ans): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="margin-bottom:0px;">Ans # <?php echo e($keyans+1); ?> : <?php echo e($ans['choice']); ?> <b>(<?php if($ans['answer']=='true'){ echo 'Yes'; }else{ echo 'N'; } ?>)</b></p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/include/course/dataquestion.blade.php ENDPATH**/ ?>