<div class="row">
    <div class="col-lg-12">
        <table class="table table-striped b-t b-light" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Create Date</th>
                    <th>Modify Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($data['detail'])>0): ?>
                <?php $item = $data['detail']->firstItem(); ?>
                <?php $__currentLoopData = $data['detail']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(file_exists(public_path().'/upload/member/news/images/'.$value->news_image) && $value->news_image !=
                null): ?>
                <?Php $img = asset('upload/member/news/images/'.$value->news_image);?>
                <?php else: ?>
                <?Php $img = asset('assets/member/images/no-image.png');?>
                <?php endif; ?>
                <tr>
                    <td class="text-center"><?php echo e($item++); ?></td>
                    <td><img src="<?php echo e($img); ?>" width="150"></td>
                    <td><a href="<?php echo e(url('news/detail/'.$value->news_id.'/'.$value->news_title)); ?>" target="_blank"
                            class="text-info"><?php echo e($value->news_title); ?></a></td>
                    <td>
                        <?php if($value->news_status==1): ?>
                        <span class="label label-success">Activate</span>
                        <?php else: ?>
                        <span class="label label-warning">Draft</span>
                        <?php endif; ?>
                    </td>
                    <td><?php echo e(date("d-m-Y",strtotime($value->created_at))); ?></td>
                    <td><?php echo e(date("d-m-Y",strtotime($value->updated_at))); ?></td>
                    <td>
                        <a href="<?php echo e(url('admin/news/main/edit/'.$value->news_id)); ?>" class="btn btn-success"
                            title="Edit"><i class="fa fa-edit"></i></a>
                        <a href="#" class="btn btn-danger"
                            onclick="confirm_delete('<?php echo e(url('admin/news/delete/news/')); ?>','<?php echo e($value->news_id); ?>');"
                            title="Delete"><i class="fa fa-trash-o"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="10" class="text-danger">
                        <div align="center"><?php echo e(trans('other.data_not_found')); ?></div>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>

        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-2 text-left">
                    <small class="text-muted inline m-t-sm m-b-sm">
                        <?php echo e('Showing '.$data['detail']->firstItem().' - '.$data['detail']->lastItem()); ?> / Total :
                        <?php echo e($data['detail']->total()); ?> items
                    </small>
                </div>
                <div class="col-sm-8 text-center">
                </div>
                <div class="col-sm-2 text-right">
                    <?php echo e($data['detail']->links()); ?>

                </div>
            </div>
        </footer>
    </div>
</div>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/include/news/view.blade.php ENDPATH**/ ?>