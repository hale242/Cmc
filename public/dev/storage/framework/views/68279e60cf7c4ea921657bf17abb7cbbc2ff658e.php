<?php if($model->responsive): ?>
    height="100%" width="100%"
<?php else: ?>
    <?php if($model->height): ?>
        height="<?php echo e($model->height); ?>"
    <?php endif; ?>

    <?php if($model->width): ?>
        width="<?php echo e($model->width); ?>"
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/_partials/dimension/html.blade.php ENDPATH**/ ?>