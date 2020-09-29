<script type="text/javascript">
    google.charts.setOnLoadCallback(draw<?php echo e($model->id); ?>)
    var <?php echo e($model->id); ?>;
    function draw<?php echo e($model->id); ?>() {
        var data = google.visualization.arrayToDataTable([
            ['Element', 'Value'],
            <?php for($l = 0; $l < count($model->values); $l++): ?>
                ["<?php echo $model->labels[$l]; ?>", <?php echo e($model->values[$l]); ?>],
            <?php endfor; ?>
        ])

        var options = {
            <?php echo $__env->make('charts::_partials.dimension.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            fontSize: 12,
            pieHole: 0.4,
            <?php echo $__env->make('charts::google.titles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('charts::google.colors', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        };

        <?php echo e($model->id); ?> = new google.visualization.PieChart(document.getElementById("<?php echo e($model->id); ?>"))
        <?php echo e($model->id); ?>.draw(data, options)
    }
</script>

<?php if(!$model->customId): ?>
    <?php echo $__env->make('charts::_partials.container.div', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/google/donut.blade.php ENDPATH**/ ?>