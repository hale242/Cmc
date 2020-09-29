<?php if(!$model->container): ?>
	<?php echo $__env->make('charts::_partials.loader.container-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div>
			<canvas id="<?php echo e($model->id); ?>" <?php echo $__env->make('charts::_partials.dimension.html', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>></canvas>
		</div>
	<?php echo $__env->make('charts::_partials.loader.container-bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/_partials/container/canvas2.blade.php ENDPATH**/ ?>