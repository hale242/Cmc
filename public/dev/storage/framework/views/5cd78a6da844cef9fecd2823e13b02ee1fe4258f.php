<div class="row">
    <div class="col-sm-12">

        <form class="form-horizontal" action="<?php echo e(url('admin/profile/'.$data['page'].'/action')); ?>" method="post" enctype="multipart/form-data">
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


            <?php if($data['page']=='ChangeProfile'): ?>

                <?php if(file_exists(public_path().'/upload/profile/'.$data['detail']['image']) && $data['detail']['image'] != null): ?>

                    <input type="hidden" name="img_hidden" value="<?php echo e($data['detail']['image']); ?>">
                    <?php $img = asset('upload/profile/'.$data['detail']['image']);?>

                <?php else: ?>

                    <?php $img = asset('upload/profile/no-image.png');?>

                <?php endif; ?>

                <?php
                    (isset($data['detail']['first_name'])) ? $first_name = $data['detail']['first_name'] : $first_name = null;
                    (isset($data['detail']['last_name'])) ? $last_name = $data['detail']['last_name'] : $last_name = null;
                    (isset($data['detail']['email'])) ? $email = $data['detail']['email'] : $email = null;
                    (isset($data['detail']['sex'])) ? $sex = $data['detail']['sex'] : $sex = null;
                    (isset($data['detail']['birthday'])) ? $birthday = $data['detail']['birthday'] : $birthday = null;
                    (isset($data['detail']['phone_number'])) ? $phone = $data['detail']['phone_number'] : $phone = null;
                    (isset($data['detail']['address'])) ? $address = $data['detail']['address'] : $address = null;
                    (isset($data['detail']['id_card'])) ? $id_card = $data['detail']['id_card'] : $id_card = null;
                    (isset($data['detail']['occupation'])) ? $occupation = $data['detail']['occupation'] : $occupation = null;
                    (isset($data['detail']['company'])) ? $company = $data['detail']['company'] : $company = null;
                    (isset($data['detail']['user_status'])) ? $status = $data['detail']['user_status'] : $status = null;
                    (isset($data['detail']['user_type'])) ? $type = $data['detail']['user_type'] : $type = null;
                ?>

                <section class="panel-default">
                    <header class="panel-heading">
                        <span class="h4"><?php echo e($data['action']); ?> <?php echo e($data['page']); ?></span>
                    </header>
                    <div class="panel-body">

                        <div class="col-sm-6">

                            <div class="col-md-12 m-t">
                                <div class="form-group text-center">
                                    <a href="<?php echo e($img); ?>" target="_blank" data-fancybox="profile">
                                        <img src="<?php echo e($img); ?>" width="200" class="img-thumbnail">
                                    </a>
                                </div>
                                <div class="">
                                    <label>Upload image</label>
                                    <input type="file" name="img" class="form-control" id="img">
                                    <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb.</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="col-sm-6 m-t">
                                <label>First Name</label>
                                <input name="first_name" type="text" class="form-control" placeholder="First Name" value="<?php echo e($first_name); ?>" required>
                            </div>

                            <div class="col-sm-6 m-t">
                                <label>Last Name</label>
                                <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?php echo e($last_name); ?>" required>
                            </div>

                            <div class="col-sm-6 m-t">
                                <label>Email</label>
                                <input name="E-mail" type="email" class="form-control" placeholder="Email" value="<?php echo e($email); ?>" disabled>
                            </div>

                            <div class="col-sm-6 m-t">
                                <label>Phone</label>
                                <input name="phone" type="text" class="form-control" placeholder="Phone 10 digits" maxlength="10" value="<?php echo e($phone); ?>">
                            </div>

                            <div class="col-sm-12 m-t">
                                <label>Address</label>
                                <textarea name="address" class="form-control" placeholder="Address"><?php echo e($address); ?></textarea>
                            </div>

                            <div class="col-sm-4 m-t">
                                <label>Sex</label>
                                <select name="sex" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1" <?php if($sex==1): ?><?php echo e('selected'); ?><?php endif; ?>>Male</option>
                                    <option value="2" <?php if($sex==2): ?><?php echo e('selected'); ?><?php endif; ?>>Famale</option>
                                </select>
                            </div>

                            <div class="col-sm-4 m-t">
                                <label>Birthday</label>
                                <input name="birthday" type="text" class="form-control datepicker-input" placeholder="Birthday" value="<?php echo e($birthday); ?>">
                            </div>

                            <div class="col-sm-4 m-t">
                                <label>ID Card No.</label>
                                <input name="id_card" type="text" class="form-control" placeholder="ID Card No." maxlength="13" value="<?php echo e($id_card); ?>" required>
                            </div>

                            <div class="col-sm-4 m-t">
                                <label>Occupation</label>
                                <input name="occupation" type="text" class="form-control" placeholder="Occupation" value="<?php echo e($occupation); ?>" >
                            </div>

                            <div class="col-sm-4 m-t">
                                <label>Company</label>
                                <input name="company" type="text" class="form-control" placeholder="Company" value="<?php echo e($company); ?>">
                            </div>

                            <div class="col-sm-12 text-center m-t">
                                <button type="submit" class="btn btn-success btn-s-xs m-r">Save</button>
                                <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                            </div>
                        </div>
                </section>

            <?php endif; ?>



            <?php if($data['page']=='ChangePassword'): ?>

                <section class="panel panel-default">
                    <header class="panel-heading">
                        <span class="h4"><?php echo e($data['page']); ?></span>
                    </header>
                    <div class="panel-body">

                        <div class="col-sm-6">

                            <div class="col-sm-12">
                                <br>
                                <label>Current Password</label>
                                <input name="current_password" type="password" class="form-control" maxlength="8" placeholder="Current Password 8 digits" required>
                            </div>

                            <div class="col-sm-12">
                                <br>
                                <label>New Password</label>
                                <input name="password_change" type="password" class="form-control" maxlength="8" placeholder="New Password 8 digits" required>
                            </div>

                            <div class="col-sm-12">
                                <br>
                                <label>Confirm New Password</label>
                                <input name="password_change_confirmation" type="password" class="form-control" maxlength="8" placeholder="Confirm New Password 8 digits" required>
                            </div>

                        </div>

                        <div class="clearfix"></div>

                        <br><br><br>

                        <div class="col-sm-12">

                            <footer class="panel-footer text-right bg-light lter">
                                <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                            </footer>

                        </div>

                </section>

            <?php endif; ?>

        </form>

    </div>
</div>
<?php /**PATH /home/cmcbiote/public_html/resources/views/page/admin/include/profile/form.blade.php ENDPATH**/ ?>