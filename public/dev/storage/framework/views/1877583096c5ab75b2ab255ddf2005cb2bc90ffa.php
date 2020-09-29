<style type="text/css">
    .text_color{
        color:#bbbbbb;
    }
    .member-menudash{
        padding-right: 0px;
        margin-top: 6px;
        padding-top: 10px;
        height: 47px;
    }
    .member-menudash a{
        margin-right:10px;
        color: #FFFFFF;
    }
    .member-menudash .active{
        color: #353535;
    }
    .profile-small{
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-left: 10px;
        margin-top: -1px;
    }
    .text-profile-small{
        color: #FFF;
        padding-top: 7px;
        font-size: 12px;
        margin-left: 14px;
    }
</style>

    <div class="col-md-6 member-menudash">
        <a href="<?php echo e(url('dashboard')); ?>" class="<?php if(Request::segment('1')=='dashboard'||Request::segment('1')=='profile'): ?> active <?php endif; ?>">Dashboard</a>
        <a href="<?php echo e(url('mycourse')); ?>" class="<?php if(Request::segment('1')=='mycourse'): ?> active <?php endif; ?>">My Course</a>
        <a href="<?php echo e(url('mywishlist')); ?>" class="<?php if(Request::segment('1')=='mywishlist'): ?> active <?php endif; ?>">My Wishlist</a>
        <a href="<?php echo e(url('myorder')); ?>" class="<?php if(Request::segment('1')=='myorder'): ?> active <?php endif; ?>">My Order</a>
        
        <?php if(session('session_user_type')==3): ?>
            <a href="<?php echo e(url('managecourse')); ?>" class="<?php if(Request::segment('1')=='managecourse'): ?> active <?php endif; ?>" style="background-color: #0027ff;padding: 17px;">Manage Course</a>
        <?php endif; ?>
    </div>

    <div class="col-md-6 text-right">
        <div class="text-profile-small">
            <?php
                $data = DB::table('user')->where('user_id',session('session_id'))->first();
                // dd($data);
                if($data==null){
                    header('Location: /login');
                    exit;
                }
            ?>
            <?php echo e($data->first_name.' '.$data->last_name); ?>

            <?php
                if(isset($data->image)){
                    $img = $data->image;
                }else{
                    $img = 'no-image.png';
                }
            ?>

            <img src="<?php echo e(asset('upload/profile/'.$img)); ?>" class="profile-small">
            
        </div>
    </div>



<?php /**PATH /home/cmcbiote/public_html/resources/views/layouts/member/menu_dashboard.blade.php ENDPATH**/ ?>