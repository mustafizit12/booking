<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New User')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('users.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'users.store', 'method' => 'post', 'class'=>'form-horizontal user-form'])); ?>

                <?php echo $__env->make('core.users._create_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo e(Form::close()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/cvalidator.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
            $('#area-div').hide();
            $('#<?php echo e(fake_field('role_id')); ?>').change(function(){
                var id = $(this).val();
                if(id == 3){
                  $('#area-div').show();
                  $('#<?php echo e(fake_field('area_id')); ?>').attr('required',true);
                }else{
                  $('#area-div').hide();
                  $('#<?php echo e(fake_field('area_id')); ?>').attr('required',false);
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/users/create.blade.php ENDPATH**/ ?>