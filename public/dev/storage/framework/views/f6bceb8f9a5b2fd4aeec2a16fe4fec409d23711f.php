<?php if(!$model->responsive): ?>
    <?php if($model->height): ?>
        height: <?php echo e($model->height); ?>,
    <?php endif; ?>

    <?php if($model->width): ?>
        width: <?php echo e($model->width); ?>,
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/_partials/dimension/js2.blade.php ENDPATH**/ ?>