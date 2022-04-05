<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Rent Car')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('rentCars.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'rentCars.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('owner_name')); ?>" class="col-form-label text-right required"><?php echo e(__('Rent Car Name')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('owner_name'),  old('owner_name', null), ['class'=>form_validation($errors, 'owner_name'), 'id' => fake_field('owner_name'),'data-cval-name' => 'The owner name field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('owner_name')); ?>"><?php echo e($errors->first('owner_name')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('car_model')); ?>" class="col-form-label text-right required"><?php echo e(__('Car Model')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('car_model'),  old('car_model', null), ['class'=>form_validation($errors, 'car_model'), 'id' => fake_field('car_model'),'data-cval-name' => 'The Car Model field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('car_model')); ?>"><?php echo e($errors->first('car_model')); ?></span>
                      </div>
                  </div>
                </div>
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('owner_address')); ?>" class="col-form-label text-right"><?php echo e(__('Owner Address')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('owner_address'), old('owner_address', null), ['class'=>[form_validation($errors, 'owner_address'),'textarea'], 'id' => fake_field('owner_address'), 'rows'=>2,'data-cval-name' => 'The owner_address field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('owner_address')); ?>"><?php echo e($errors->first('owner_address')); ?></span>
                    </div>
                </div>
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('description')); ?>" class="col-form-label text-right"><?php echo e(__('Description')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('description'), old('description', null), ['class'=>[form_validation($errors, 'description'),'textarea'], 'id' => fake_field('description'), 'rows'=>2,'data-cval-name' => 'The description field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('description')); ?>"><?php echo e($errors->first('description')); ?></span>
                    </div>
                </div>

                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Rent Car Image')); ?></label>
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
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('owner_contact')); ?>" class="col-form-label text-right required"><?php echo e(__('Owner Contact')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('owner_contact'),  old('owner_contact', null), ['class'=>form_validation($errors, 'owner_contact'), 'id' => fake_field('owner_contact'),'data-cval-name' => 'The Owner Contact field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('owner_contact')); ?>"><?php echo e($errors->first('owner_contact')); ?></span>
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
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/RentCar/create.blade.php ENDPATH**/ ?>