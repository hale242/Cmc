<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.canvas2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<script type="text/javascript">
    var ctx = document.getElementById("<?php echo e($model->id); ?>")

    var <?php echo e($model->id); ?> = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                <?php $__currentLoopData = $model->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    "<?php echo $label; ?>",
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ],
            datasets: [{
                data: [
                    <?php $__currentLoopData = $model->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($dta); ?>,
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ],
                backgroundColor: [
                    <?php if($model->colors): ?>
                        <?php $__currentLoopData = $model->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            "<?php echo e($color); ?>",
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $model->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            "<?php echo e(sprintf('#%06X', mt_rand(0, 0xFFFFFF))); ?>",
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                ],
            }]
        },
        options: {
            responsive: <?php echo e($model->responsive || !$model->width ? 'true' : 'false'); ?>,
            maintainAspectRatio: false,
            <?php if($model->title): ?>
            title: {
                display: true,
                text: "<?php echo $model->title; ?>",
                fontSize: 20,
            }
            <?php endif; ?>
        }
    });
</script>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/chartjs/donut.blade.php ENDPATH**/ ?>