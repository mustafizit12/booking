<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Tour Package')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('tourPackages.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'tourPackages.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('package_name')); ?>" class="col-form-label text-right required"><?php echo e(__('Package Name')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('package_name'),  old('package_name', null), ['class'=>form_validation($errors, 'package_name'), 'id' => fake_field('package_name'),'data-cval-name' => 'The package Name field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('package_name')); ?>"><?php echo e($errors->first('package_name')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('valid_till')); ?>" class="col-form-label text-right required"><?php echo e(__('Valid Till')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('valid_till'),  old('valid_till', null), ['class'=>[form_validation($errors, 'valid_till'),'datepicker'], 'id' => fake_field('valid_till'),'data-cval-name' => 'The contact number field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('valid_till')); ?>"><?php echo e($errors->first('valid_till')); ?></span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('package_cost')); ?>" class="col-form-label text-right required"><?php echo e(__('Package Cost')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('package_cost'),  old('package_cost', null), ['class'=>form_validation($errors, 'package_cost'),'step'=>'any', 'id' => fake_field('package_cost'),'data-cval-name' => 'The package Cost field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('package_cost')); ?>"><?php echo e($errors->first('package_cost')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('discount')); ?>" class="col-form-label text-right required"><?php echo e(__('Discount')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('discount'),  old('discount', null), ['class'=>[form_validation($errors, 'discount')],'step'=>'any', 'id' => fake_field('discount'),'data-cval-name' => 'The Discount field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('discount')); ?>"><?php echo e($errors->first('discount')); ?></span>
                      </div>
                  </div>
                </div>
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('details')); ?>" class="col-form-label text-right"><?php echo e(__('Description')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('details'), old('details', null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('details')); ?>"><?php echo e($errors->first('details')); ?></span>
                    </div>
                </div>

                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Hotel Image')); ?></label>
                      <div >
                        <!-- <input type="file" name="image[]" multiple class="form-control" >
                           <?php echo e(Form::file(fake_field('image'),  ['class'=>form_validation($errors, 'image'), 'id' => fake_field('image'),'multiple'=>"multiple",'data-cval-image' => 'The File field','data-cval-rules' => ''])); ?>-->
                           <fieldset class="form-group form-control">
                              <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                              <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple accept="image/*">
                          </fieldset>
                          <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('image')); ?>"><?php echo e($errors->first('image')); ?></span>
                          <div class="preview-images-zone" style="display:none;"></div>
                      </div>
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
    <?php echo $__env->make('layouts.includes.list-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/TourPackage/create.blade.php ENDPATH**/ ?>