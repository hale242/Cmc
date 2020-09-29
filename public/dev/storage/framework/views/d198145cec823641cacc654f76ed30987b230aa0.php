<?php echo $__env->make('charts::_partials/container.div-titled', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script type="text/javascript">
    var <?php echo e($model->id); ?>;
    $(function (){
        <?php echo e($model->id); ?> = Morris.Donut({
            element: "<?php echo e($model->id); ?>",
            resize: true,
            data: [
                <?php for($i = 0; $i < count($model->values); $i++): ?>
                    {
                        label: "<?php echo $model->labels[$i]; ?>",
                        value: "<?php echo e($model->values[$i]); ?>"
                    },
                <?php endfor; ?>
            ],
            <?php if($model->colors): ?>
                colors: [
                    <?php $__currentLoopData = $model->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        "<?php echo e($c); ?>",
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            <?php endif; ?>
        })
    });
</script>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/morris/donut.blade.php ENDPATH**/ ?>