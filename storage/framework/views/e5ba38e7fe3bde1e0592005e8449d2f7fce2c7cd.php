<div class="row">
    <div class="col-sm-12">

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


        <?php if($data['page']=='Home'): ?>

            <?php if($data['logo_web']!=null): ?>

            <section class="col-sm-12 panel panel-default">
                <form class="form-horizontal" action="<?php echo e(url('admin/content/home/action')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <?php if(file_exists(public_path().'/upload/admin/logo_web/images/'.$data['logo_web']->logo_image) &&
                    $data['logo_web']->logo_image!=null): ?>
                    <input type="hidden" name="img_hidden" value="<?php echo e($data['logo_web']->logo_image); ?>">
                    <?php $img = asset('upload/admin/logo_web/images/'.$data['logo_web']->logo_image); ?>
                    <?php else: ?>
                    <?php $img = asset('assets/member/images/no-image.png'); ?>
                    <?php endif; ?>

                    <?php else: ?>
                    <?php $img = asset('assets/member/images/no-image.png'); ?>
                    <?php endif; ?>

                    <header class="panel-heading">
                        <span class="h4">Logo Home Page</span>
                    </header>

                    <div class="col-lg-12">

                        <div class="form-group col-sm-12">
                            <div class="text-center">
                                <a href="<?php echo e($img); ?>" target="_blank">
                                    <img src="<?php echo e($img); ?>" width="160" height="40" class="img-thumbnail">
                                </a>
                            </div>
                            <br>
                            <input type="file" name="img" class="form-control" id="img">
                            <p class="text-danger">Only support jpeg, jpg, png files. || Upload file a maximum of 2 mb &
                                size 200*40.</p>
                        </div>

                    </div>

                    <div class="col-lg-12">
                        <div class="form-group col-sm-12">
                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                        </div>
                    </div>

                </form>
            </section>

            <div class="clearfix"></div>

            <section class="panel panel-default">

                <div class="panel-body">

                    <span class="h4 m-t">Banner Slide</span>

                    <div class="text-left m-t">
                        <button type="button" id="btn_banner_slide" onclick="btn_banner_slide('Create','','','');"
                            class="btn btn-info"><i class="fa fa-arrows"></i> Add</button>
                    </div>

                    <div class="form-group pull-in clearfix">

                        <div id="sortable" class="m-t">
                                <?php $__currentLoopData = $data['banner']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(file_exists(public_path().'/upload/admin/banner/images/'.$value->banner_image) &&
                                $value->banner_image !=null): ?>
                                <?Php $img = asset('upload/admin/banner/images/'.$value->banner_image);?>
                                <?php else: ?>
                                <?Php $img = asset('assets/member/images/no-image.png');?>
                                <?php endif; ?>

                                <div id="<?php echo e($value->banner_id); ?>" class="inline col-md-3" style="padding:20px;">
                                    <div style="border:1px solid #ccc;padding: 5px;background-color:#fff;">
                                        <a href="<?php echo e($img); ?>" target="_blank" data-fancybox="group">
                                            <img src="<?php echo e($img); ?>" class="img-responsive">
                                        </a>
                                    </div>
                                    <div style="border-left:1px solid #ccc;border-right:1px solid #ccc;border-bottom:1px solid #ccc;padding: 5px;background-color:#fff;">
                                        <?php if($value->banner_url!=''): ?>
                                            <a href="<?php echo e($value->banner_url); ?>" target="_blank" title="<?php echo e($value->banner_url); ?>" style="color: #0027ff;border-bottom: 1px dotted #0027ff;">
                                                
                                                Link
                                            </a>
                                        <?php else: ?>
                                            -
                                        <?php endif; ?>
                                    </div>
                                    <div style="padding: 5px;background-color:#fff;">
                                        <button type="button" id="btn_add_img" class="btn btn-sm btn-primary" onclick="btn_banner_slide('Edit','<?php echo e($value->banner_id); ?>','<?php echo e($value->banner_image); ?>','<?php echo e($value->banner_title); ?>','<?php echo e($value->banner_url); ?>');">Edit</button>
                                        <button type="button" id="btn_delete_img" class="btn btn-sm btn-danger" onclick="confirm_delete('<?php echo e(url('admin/content/delete/Banner/')); ?>','<?php echo e($value->banner_id); ?>');">Delete</button>
                                    </div>
                                </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        <div class="clearfix">
                            <?php echo e($data['banner']->links()); ?>

                        </div>


                    </div>

            </section>

        <?php endif; ?>


        <?php if($data['page']=='Content'): ?>

            <section class="panel panel-default">
                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#about" role="tab"
                                aria-controls="home" aria-selected="true">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#terms" role="tab"
                                aria-controls="profile" aria-selected="false">Terms & Condition</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#policy" role="tab"
                                aria-controls="contact" aria-selected="false">Pravacy Policy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Contact Us</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade active in" id="about" role="tabpanel" aria-labelledby="home-tab">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/about/action')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="id" value="<?php if(isset($data['id']['about_id'])): ?><?php echo e($data['id']['about_id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <?php if(isset($data['about_us']->name_page)): ?>
                                <?php $name_page = $data['about_us']->name_page;?>
                                <?php else: ?>
                                <?php $name_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['about_us']->content)): ?>
                                <?php $content_page = $data['about_us']->content;?>
                                <?php else: ?>
                                <?php $content_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['about_us']->meta_page_title)): ?>
                                <?php $meta_page_title = $data['about_us']->meta_page_title;?>
                                <?php else: ?>
                                <?php $meta_page_title = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['about_us']->meta_description)): ?>
                                <?php $meta_description = $data['about_us']->meta_description;?>
                                <?php else: ?>
                                <?php $meta_description = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['about_us']->meta_keyword)): ?>
                                <?php $meta_keyword = $data['about_us']->meta_keyword;?>
                                <?php else: ?>
                                <?php $meta_keyword = null;?>
                                <?php endif; ?>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Name Page</label>
                                        <input name="name_page" type="text" class="form-control" placeholder="Name Page" value="<?php echo e($name_page); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group col-sm-12">
                                        <label>Content Page</label>
                                        <textarea name="detail" id="detail1" class="form-control" placeholder="Content Page" required><?php echo e($content_page); ?></textarea>
                                    </div>

                                </div>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Meta Page Title</label>
                                        <input name="meta_page_title" type="text" class="form-control"
                                            placeholder="Meta Page Title" value="<?php echo e($meta_page_title); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Description</label>
                                        <input name="meta_description" type="text" class="form-control"
                                            placeholder="Meta Description" value="<?php echo e($meta_description); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Keyword</label>
                                        <input name="meta_keyword" type="text" class="form-control"
                                            placeholder="Meta Keyword" value="<?php echo e($meta_keyword); ?>">
                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>

                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="terms" role="tabpanel" aria-labelledby="profile-tab">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/terms/action')); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="id"
                                    value="<?php if(isset($data['id']['terms_id'])): ?><?php echo e($data['id']['terms_id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <?php if(isset($data['terms']->name_page)): ?>
                                <?php $name_page = $data['terms']->name_page;?>
                                <?php else: ?>
                                <?php $name_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['terms']->content)): ?>
                                <?php $content_page = $data['terms']->content;?>
                                <?php else: ?>
                                <?php $content_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['terms']->meta_page_title)): ?>
                                <?php $meta_page_title = $data['terms']->meta_page_title;?>
                                <?php else: ?>
                                <?php $meta_page_title = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['terms']->meta_description)): ?>
                                <?php $meta_description = $data['terms']->meta_description;?>
                                <?php else: ?>
                                <?php $meta_description = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['terms']->meta_keyword)): ?>
                                <?php $meta_keyword = $data['terms']->meta_keyword;?>
                                <?php else: ?>
                                <?php $meta_keyword = null;?>
                                <?php endif; ?>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Name Page</label>
                                        <input name="name_page" type="text" class="form-control" placeholder="Name Page"
                                            value="<?php echo e($name_page); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group col-sm-12">
                                        <label>Content Page</label>
                                        <textarea name="detail" id="detail2" class="form-control" placeholder="Content Page" required><?php echo e($content_page); ?></textarea>
                                    </div>

                                </div>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Meta Page Title</label>
                                        <input name="meta_page_title" type="text" class="form-control"
                                            placeholder="Meta Page Title" value="<?php echo e($meta_page_title); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Description</label>
                                        <input name="meta_description" type="text" class="form-control" placeholder="Meta Description" value="<?php echo e($meta_description); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Keyword</label>
                                        <input name="meta_keyword" type="text" class="form-control"
                                            placeholder="Meta Keyword" value="<?php echo e($meta_keyword); ?>">
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>
                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="policy" role="tabpanel" aria-labelledby="contact-tab">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/pravacy_policy/action')); ?>"
                                method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="id"
                                    value="<?php if(isset($data['id']['pravacy_policy_id'])): ?><?php echo e($data['id']['pravacy_policy_id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <?php if(isset($data['pravacy_policy']->name_page)): ?>
                                <?php $name_page = $data['pravacy_policy']->name_page;?>
                                <?php else: ?>
                                <?php $name_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['pravacy_policy']->content)): ?>
                                <?php $content_page = $data['pravacy_policy']->content;?>
                                <?php else: ?>
                                <?php $content_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['pravacy_policy']->meta_page_title)): ?>
                                <?php $meta_page_title = $data['pravacy_policy']->meta_page_title;?>
                                <?php else: ?>
                                <?php $meta_page_title = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['pravacy_policy']->meta_description)): ?>
                                <?php $meta_description = $data['pravacy_policy']->meta_description;?>
                                <?php else: ?>
                                <?php $meta_description = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['pravacy_policy']->meta_keyword)): ?>
                                <?php $meta_keyword = $data['pravacy_policy']->meta_keyword;?>
                                <?php else: ?>
                                <?php $meta_keyword = null;?>
                                <?php endif; ?>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Name Page</label>
                                        <input name="name_page" type="text" class="form-control" placeholder="Name Page"
                                            value="<?php echo e($name_page); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group col-sm-12">
                                        <label>Content Page</label>
                                        <textarea name="detail" id="detail3" class="form-control" placeholder="Content Page" required><?php echo e($content_page); ?></textarea>
                                    </div>

                                </div>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Meta Page Title</label>
                                        <input name="meta_page_title" type="text" class="form-control"
                                            placeholder="Meta Page Title" value="<?php echo e($meta_page_title); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Description</label>
                                        <input name="meta_description" type="text" class="form-control"
                                            placeholder="Meta Description" value="<?php echo e($meta_description); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Keyword</label>
                                        <input name="meta_keyword" type="text" class="form-control"
                                            placeholder="Meta Keyword" value="<?php echo e($meta_keyword); ?>">
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>
                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/contact/action')); ?>" method="post"
                                enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <input type="hidden" name="id"
                                    value="<?php if(isset($data['id']['contact_id'])): ?><?php echo e($data['id']['contact_id']); ?><?php else: ?><?php echo e(''); ?><?php endif; ?>">

                                <?php if(isset($data['contact_us']->name_page)): ?>
                                <?php $name_page = $data['contact_us']->name_page;?>
                                <?php else: ?>
                                <?php $name_page = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['contact_us']->address)): ?>
                                <?php $address = $data['contact_us']->address;?>
                                <?php else: ?>
                                <?php $address = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['contact_us']->map_google)): ?>
                                <?php $map_google = $data['contact_us']->map_google;?>
                                <?php else: ?>
                                <?php $map_google = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['contact_us']->meta_page_title)): ?>
                                <?php $meta_page_title = $data['contact_us']->meta_page_title;?>
                                <?php else: ?>
                                <?php $meta_page_title = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['contact_us']->meta_description)): ?>
                                <?php $meta_description = $data['contact_us']->meta_description;?>
                                <?php else: ?>
                                <?php $meta_description = null;?>
                                <?php endif; ?>

                                <?php if(isset($data['contact_us']->meta_keyword)): ?>
                                <?php $meta_keyword = $data['contact_us']->meta_keyword;?>
                                <?php else: ?>
                                <?php $meta_keyword = null;?>
                                <?php endif; ?>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Name Page</label>
                                        <input name="name_page" type="text" class="form-control" placeholder="Name Page"
                                            value="<?php echo e($name_page); ?>" required>
                                    </div>

                                </div>

                                <div class="col-lg-12">

                                    <div class="form-group col-sm-12">
                                        <label>Address</label>
                                        <textarea name="address" id="detail4" class="form-control"><?php echo e($address); ?></textarea>
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label>Map Google</label>
                                        <textarea name="map_google" id="detail5" class="form-control" placeholder="Content Page" required><?php echo e($map_google); ?></textarea>
                                    </div>

                                </div>

                                <div class="col-lg-7">

                                    <br>

                                    <div class="form-group col-sm-12">
                                        <label>Meta Page Title</label>
                                        <input name="meta_page_title" type="text" class="form-control"
                                            placeholder="Meta Page Title" value="<?php echo e($meta_page_title); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Description</label>
                                        <input name="meta_description" type="text" class="form-control"
                                            placeholder="Meta Description" value="<?php echo e($meta_description); ?>">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label>Meta Keyword</label>
                                        <input name="meta_keyword" type="text" class="form-control"
                                            placeholder="Meta Keyword" value="<?php echo e($meta_keyword); ?>">
                                    </div>

                                </div>

                                <div class="col-lg-12">
                                    <footer class="panel-footer text-right bg-light lter">
                                        <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                        <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                    </footer>
                                </div>

                            </form>

                        </div>


                    </div>

                </div>

            </section>

        <?php endif; ?>


        <?php if($data['page']=='Email'): ?>

            <section class="panel panel-default">
                <div class="panel-body">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#order" role="tab" aria-controls="home" aria-selected="true">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#subscription" role="tab" aria-controls="profile" aria-selected="false">Subscription</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#registration" role="tab" aria-controls="contact" aria-selected="false">Registration</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        

                        <div class="tab-pane fade active in" id="order" role="tabpanel">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/email_order/action')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo isset($data['order']->email_id) ? $data['order']->email_id : null ?>">

                                <?php
                                    $subject            = isset($data['order']->subject) ? $data['order']->subject : null;
                                    $content            = isset($data['order']->content) ? $data['order']->content : null;
                                    $send_to_admin      = isset($data['order']->send_to_admin) ? $data['order']->send_to_admin : null;
                                    $send_to_teacher    = isset($data['order']->send_to_teacher) ? $data['order']->send_to_teacher : null;
                                    $send_to_user       = isset($data['order']->send_to_user) ? $data['order']->send_to_user : null;

                                    $admin_checked = ($send_to_admin==1) ? "checked" : "";
                                    $teacher_checked = ($send_to_teacher==1) ? "checked" : "";
                                    $user_checked = ($send_to_user==1) ? "checked" : "";
                                ?>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to admin</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_admin" type="checkbox" <?php echo e($admin_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_teacher" type="checkbox" <?php echo e($teacher_checked); ?> value="1" disabled>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to user</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_user" type="checkbox" <?php echo e($user_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <br>
                                    <div class="form-group col-sm-12">
                                        <label>Subject</label>
                                        <input name="subject" type="text" class="form-control" placeholder="Subject" value="<?php echo e($subject); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group col-sm-12">
                                        <label>Email content</label>
                                        <textarea name="content" id="emailorder" class="form-control" placeholder="Email content" required><?php echo e($content); ?></textarea>
                                    </div>

                                    <div class="col-lg-12">

                                        <footer class="panel-footer text-right bg-light lter">
                                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                        </footer>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="subscription" role="tabpanel">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/email_subscription/action')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo isset($data['subscription']->email_id) ? $data['subscription']->email_id : null ?>">

                                <?php
                                    $subject            = isset($data['subscription']->subject) ? $data['subscription']->subject : null;
                                    $content            = isset($data['subscription']->content) ? $data['subscription']->content : null;
                                    $send_to_admin      = isset($data['subscription']->send_to_admin) ? $data['subscription']->send_to_admin : null;
                                    $send_to_teacher    = isset($data['subscription']->send_to_teacher) ? $data['subscription']->send_to_teacher : null;
                                    $send_to_user       = isset($data['subscription']->send_to_user) ? $data['subscription']->send_to_user : null;

                                    $admin_checked = ($send_to_admin==1) ? "checked" : "";
                                    $teacher_checked = ($send_to_teacher==1) ? "checked" : "";
                                    $user_checked = ($send_to_user==1) ? "checked" : "";
                                ?>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to admin</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_admin" type="checkbox" <?php echo e($admin_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_teacher" type="checkbox" <?php echo e($teacher_checked); ?> value="1" disabled>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to user</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_user" type="checkbox" <?php echo e($user_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <br>
                                    <div class="form-group col-sm-12">
                                        <label>Subject</label>
                                        <input name="subject" type="text" class="form-control" placeholder="Subject" value="<?php echo e($subject); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group col-sm-12">
                                        <label>Email content</label>
                                        <textarea name="content" id="emailsubscribe" class="form-control" placeholder="Email content" required><?php echo e($content); ?></textarea>
                                    </div>

                                    <div class="col-lg-12">

                                        <footer class="panel-footer text-right bg-light lter">
                                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                        </footer>

                                    </div>

                                </div>

                            </form>

                        </div>

                        <div class="tab-pane fade" id="registration" role="tabpanel">

                            <form class="form-horizontal" action="<?php echo e(url('admin/content/email_registration/action')); ?>" method="post" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo isset($data['registration']->email_id) ? $data['registration']->email_id : null ?>">

                                <?php
                                    $subject            = isset($data['registration']->subject) ? $data['registration']->subject : null;
                                    $content            = isset($data['registration']->content) ? $data['registration']->content : null;
                                    $send_to_admin      = isset($data['registration']->send_to_admin) ? $data['registration']->send_to_admin : null;
                                    $send_to_teacher    = isset($data['registration']->send_to_teacher) ? $data['registration']->send_to_teacher : null;
                                    $send_to_user       = isset($data['registration']->send_to_user) ? $data['registration']->send_to_user : null;

                                    $admin_checked = ($send_to_admin==1) ? "checked" : "";
                                    $teacher_checked = ($send_to_teacher==1) ? "checked" : "";
                                    $user_checked = ($send_to_user==1) ? "checked" : "";
                                ?>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to admin</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_admin" type="checkbox" <?php echo e($admin_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to teacher</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_teacher" type="checkbox" <?php echo e($teacher_checked); ?> value="1" disabled>
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="line line-dashed line-lg pull-in"></div>
                                    <div class="form-group">
                                        <label class="col-sm-6 control-label"><b>Send to user</b></label>
                                        <div class="col-sm-6">
                                            <label class="switch">
                                                <input name="send_to_user" type="checkbox" <?php echo e($user_checked); ?> value="1">
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8">
                                    <br>
                                    <div class="form-group col-sm-12">
                                        <label>Subject</label>
                                        <input name="subject" type="text" class="form-control" placeholder="Subject" value="<?php echo e($subject); ?>" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group col-sm-12">
                                        <label>Email content</label>
                                        <textarea name="content" id="emailregister" class="form-control" placeholder="Email content" required><?php echo e($content); ?></textarea>
                                    </div>

                                    <div class="col-lg-12">

                                        <footer class="panel-footer text-right bg-light lter">
                                            <button type="submit" class="btn btn-success btn-s-xs">Save</button>
                                            <button type="reset" class="btn btn-danger btn-s-xs">Cancel</button>
                                        </footer>

                                    </div>

                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </section>

        <?php endif; ?>

    </div>
</div>

<?php $__env->startSection('javascript'); ?>


<script src="<?php echo e(url('assets/admin/js/jquery-ui.js')); ?>"></script>

<!-- ckeditor -->
<script>
    $(document).ready(function() {

        $( "#sortable" ).sortable({

            update: function(event, ui) {

                var sort_list = new Array();

                $("#sortable .inline").each(function(){
                    sort_list.push($(this).attr('id'));
                });

                $.ajax({
                    url: "<?php echo e(url('admin/content/updatesort')); ?>",
                    method: "POST",
                    data: {sort_list_arr:sort_list},
                    success:function(data){
                        console.log(data);
                    }
                });
            }
        });

        $( "#sortable" ).disableSelection();

        var url = '<?php echo url()->current(); ?>';
        var res = url.split('/');
        // var check = res[5]+'\/'+res[6];

        // console.log(check);

        if(res[5]=='email'){

            var editor = CKEDITOR.replace( 'emailorder', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#emailorder').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'emailsubscribe', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#emailsubscribe').val(evt.editor.getData());
            });

            var editor = CKEDITOR.replace( 'emailregister', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor.on( 'change', function( evt ) {
                $('#emailregister').val(evt.editor.getData());
            });

        }else if(res[5]=='content'){

            var editor1 = CKEDITOR.replace( 'detail1', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor1.on( 'change', function( evt ) {
                $('#detail1').val(evt.editor1.getData());
            });

            var editor2 = CKEDITOR.replace( 'detail2', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor2.on( 'change', function( evt ) {
                $('#detail2').val(evt.editor2.getData());
            });

            var editor3 = CKEDITOR.replace( 'detail3', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor3.on( 'change', function( evt ) {
                $('#detail3').val(evt.editor3.getData());
            });

            var editor4 = CKEDITOR.replace( 'detail4', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor4.on( 'change', function( evt ) {
                $('#detail4').val(evt.editor4.getData());
            });

            var editor5 = CKEDITOR.replace( 'detail5', {
                filebrowserUploadUrl: "<?php echo e(route('upload', ['_token' => csrf_token() ])); ?>",
                filebrowserUploadMethod: 'form'
            } );
            editor5.on( 'change', function( evt ) {
                $('#detail5').val(evt.editor5.getData());
            });

        }




    });

</script>

<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\cmc\resources\views/page/admin/include/content/form.blade.php ENDPATH**/ ?>