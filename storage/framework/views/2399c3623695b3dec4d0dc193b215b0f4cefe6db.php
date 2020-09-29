<?php echo $__env->make('charts::_partials.container.div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
var <?php echo e($model->id); ?> = c3.generate({
    bindto: '#<?php echo e($model->id); ?>',
    data: {
        columns: [
            <?php for($i = 0; $i < count($model->labels); $i++): ?>
                ["<?php echo $model->labels[$i]; ?>", <?php echo e($model->values[$i]); ?>],
            <?php endfor; ?>
        ],
        type: 'donut',
    },
    axis: {
        x: {
            type: 'category',
            categories: [<?php $__currentLoopData = $model->labels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>"<?php echo $label; ?>",<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>]
        },
        y: {
            label: {
                text: "<?php echo $model->element_label; ?>",
                position: 'outer-middle',
            }
        },
    },
    <?php if($model->title): ?>
    title: {
        text:  "<?php echo $model->title; ?>",
        x: -20 //center
    },
    <?php endif; ?>
});
</script>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/c3/donut.blade.php ENDPATH**/ ?>