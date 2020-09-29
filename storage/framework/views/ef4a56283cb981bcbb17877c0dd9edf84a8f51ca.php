<?php echo $__env->make('charts::_partials.container.chartist', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    var data = {
        labels: [
            <?php $__currentLoopData = $model->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo $label; ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ],
        series: [
            <?php $__currentLoopData = $model->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($value); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ]
    };

    var options = {
        donut: true,
        labelOffset: 50,
        chartPadding: 20,
        labelDirection: 'explode',
        <?php echo $__env->make('charts::_partials.dimension.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    };

    var <?php echo e($model->id); ?> = new Chartist.Pie('#<?php echo e($model->id); ?>', data, options);
</script>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/chartist/donut.blade.php ENDPATH**/ ?>