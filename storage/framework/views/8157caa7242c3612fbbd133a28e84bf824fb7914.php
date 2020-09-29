<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="<?php echo e(url('admin/news/'.$data['page'].'/action')); ?>" method="post"
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

            <?php if(isset($data['detail']['news_title'])): ?>
            <?php $title = $data['detail']['news_title'];?>
            <?php else: ?>
            <?php $title = null;?>
            <?php endif; ?>

            <?php if(file_exists(public_path().'/upload/member/news/images/'.$data['detail']['news_image']) &&
            $data['detail']['news_image'] != null): ?>
            <input type="hidden" name="img_hidden" value="<?php echo e($data['detail']['news_image']); ?>">
            <?php $img = asset('upload/member/news/images/'.$data['detail']['news_image']);?>
            <?php else: ?>
            <?php $img = asset('assets/member/images/no-image.png');?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_short_content'])): ?>
            <?php $short_content = $data['detail']['news_short_content'];?>
            <?php else: ?>
            <?php $short_content = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_full_content'])): ?>
            <?php $full_content = $data['detail']['news_full_content'];?>
            <?php else: ?>
            <?php $full_content = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_page_title'])): ?>
            <?php $page_title = $data['detail']['news_page_title'];?>
            <?php else: ?>
            <?php $page_title = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_description'])): ?>
            <?php $description = $data['detail']['news_description'];?>
            <?php else: ?>
            <?php $description = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_keyword'])): ?>
            <?php $keyword = $data['detail']['news_keyword'];?>
            <?php else: ?>
            <?php $keyword = null;?>
            <?php endif; ?>

            <?php if(isset($data['detail']['news_status'])): ?>
            <?php $status = $data['detail']['news_status'];?>
            <?php else: ?>
            <?php $status = null;?>
            <?php endif; ?>

            <section class="panel panel-default">
                <header class="panel-heading">
                    <span class="h4"><?php echo e($data['action']); ?> News</span>
                </header>
                <div class="panel-body">
                    <div class="form-group pull-in clearfix">
                        <div class="col-sm-5">
                            <div align="center">
                                <a href="<?php echo e($img); ?>" target="_blank">
                                    <img src="<?php echo e($img); ?>" width="300">
                                </a>
                            </div>
                            <br>
                            <label>Image cover</label>
                            <input type="file" name="img" class="form-control" id="img">
                            <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-7">
                            <label>Title</label>
                            <input name="title" type="text" class="form-control" placeholder="Title News"
                                value="<?php echo e($title); ?>" required>
                        </div>
                        <div class="col-sm-8">
                            <br>
                            <label>Short Content</label>
                            <textarea name="short_content" class="form-control"
                                placeholder="Short Content"><?php echo e($short_content); ?></textarea>
                        </div>
                        <div class="col-sm-12">
                            <br>
                            <label>Full Content</label>
                            <textarea name="full_content" id="full_content" class="form-control" placeholder="Full Content"><?php echo e($full_content); ?></textarea>
                        </div>
                        <div class="col-sm-7">
                            <br>
                            <label>Meta page title</label>
                            <input name="page_title" type="text" class="form-control" placeholder="Meta page title"
                                value="<?php echo e($page_title); ?>" required>
                        </div>
                        <div class="col-sm-7">
                            <br>
                            <label>Meta description</label>
                            <input name="description" type="text" class="form-control" placeholder="Meta description"
                                value="<?php echo e($description); ?>" required>
                        </div>
                        <div class="col-sm-7">
                            <br>
                            <label>Meta keyword</label>
                            <input name="keyword" type="text" class="form-control" placeholder="Meta keyword"
                                value="<?php echo e($keyword); ?>" required>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-5">
                            <div class="line line-dashed line-lg pull-in"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input name="status" type="checkbox" <?php if($status==1): ?><?php echo e('checked'); ?><?php endif; ?>
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
<?php $__env->stopSection(); ?>

<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/news/form.blade.php ENDPATH**/ ?>