<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="<?php echo e(url('admin/language/'.$data['page'].'/action')); ?>" method="post"
            enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <input type="hidden" name="type_action" value="<?php echo e($data['action']); ?>">

            <input type="hidden" name="id" value="<?php if(isset($data['id'])): ?><?php echo e($data['id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

            <?php echo $__env->make('layouts.admin.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <?php if(count($errors)): ?>
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <div style="padding: 10px;">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>



            <?php if($data['page']=='Main'): ?>

            <?php if(isset($data['detail']['language_name'])): ?>
            <?php $language_name = $data['detail']['language_name'];?>
            <?php else: ?>
            <?php $language_name = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['language_code'])): ?>
            <?php $language_code = $data['detail']['language_code'];?>
            <?php else: ?>
            <?php $language_code = null;?>
            <?php endif; ?>
            
            <?php if(isset($data['detail']['language_details'])): ?>
            <?php $language_details = $data['detail']['language_details'];?>
            <?php else: ?>
            <?php $language_details = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['language_main'])): ?>
            <?php $language_main = $data['detail']['language_main'];?>
            <?php else: ?>
            <?php $language_main = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['language_status'])): ?>
            <?php $status = $data['detail']['language_status'];?>
            <?php else: ?>
            <?php $status = null;?>
            <?php endif; ?>

            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4"><?php echo e($data['action']); ?> Language</span>
                </header>
                <div class="panel-body">
                    <div class="form-group pull-in clearfix">
                        
                        <div class="clearfix"></div>
                        <div class="col-sm-7">
                            <label>Language Name</label>
                            <input name="language_name" type="text" class="form-control" placeholder="Language Name"
                                value="<?php echo e($language_name); ?>" required>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-7 m-t">
                            <label>Language Code</label>
                            <input name="language_code" type="text" class="form-control" placeholder="Language Code"
                                value="<?php echo e($language_code); ?>" required>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <label>Description</label>
                            <textarea name="language_details" id="full_content" class="form-control "
                                placeholder="Description"><?php echo e($language_details); ?></textarea>
                        </div>
                        <div class="col-sm-5">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Language Main</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="language_main" type="checkbox" <?php if($language_main==1): ?><?php echo e('checked'); ?><?php endif; ?>
                                            value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="language_status" type="checkbox" <?php if($status==1): ?><?php echo e('checked'); ?><?php endif; ?>
                                            value="1">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="panel-footer text-right bg-light lter">
                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                    </footer>
            </section>
            <?php endif; ?>

        </form>

    </div>
</div>

<?php $__env->startSection('javascript'); ?>

<!-- ckeditor -->
<script>

    $(document).ready(function() {

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');

        var editor = CKEDITOR.replace( 'full_content', {
            filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
            filebrowserUploadMethod: 'form'
        } );
        editor.on( 'change', function( evt ) {
            $('#full_content').val(evt.editor.getData());
        });

    });

</script>
<?php $__env->stopSection(); ?><?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/language/form.blade.php ENDPATH**/ ?>