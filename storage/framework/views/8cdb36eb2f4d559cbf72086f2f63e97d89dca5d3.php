<?php if(!$model->container): ?>
	<?php echo $__env->make('charts::_partials.container.title', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('charts::_partials.loader.container-top', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<center>
			<div id="<?php echo e($model->id); ?>" style="<?php echo $__env->make('charts::_partials.dimension.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>"></div>
		</center>
	<?php echo $__env->make('charts::_partials.loader.container-bottom', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/cmcbiote/public_html/resources/views/vendor/charts/_partials/container/div-titled.blade.php ENDPATH**/ ?>