<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-3 col-md-6">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Area')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('areas.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'areas.store', 'method' => 'post', 'class'=>'form-horizontal user-form'])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>

                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('name')); ?>" class="col-form-label text-right required"><?php echo e(__('Area Name')); ?></label>
                    <div>
                        <?php echo e(Form::text(fake_field('name'),  old('name', null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('name'),'data-cval-name' => 'The name field','data-cval-rules' => 'required|escapeInput|alphaSpace'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('name')); ?>"><?php echo e($errors->first('name')); ?></span>
                    </div>
                </div>

                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('details')); ?>" class="col-form-label text-right"><?php echo e(__('Details')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('details'), old('details', null), ['class'=>form_validation($errors, 'details'), 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('details')); ?>"><?php echo e($errors->first('details')); ?></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <?php echo e(Form::submit(__('Create'),['class'=>'btn btn-sm btn-info form-submission-button'])); ?>

                </div>

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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Area/create.blade.php ENDPATH**/ ?>