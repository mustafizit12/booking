<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Venue')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('venues.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'venues.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6" >
                      <label for="<?php echo e(fake_field('area_id')); ?>"
                             class="col-form-label text-right required"><?php echo e(__('Area')); ?></label>
                      <div>
                          <div class="lf-select">
                          <?php echo e(Form::select(fake_field('area_id'), $areas, old('area_id', null),['class' => [form_validation($errors, 'area_id'),'select2'],'id' => fake_field('area_id'), 'placeholder' => __('Select Area'),'data-cval-name' => 'The Area field','placeholder'=>'Select Area','data-cval-rules' => 'required|integer'])); ?>

                          </div>
                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('area_id')); ?>"><?php echo e($errors->first('area_id')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('venue_name')); ?>" class="col-form-label text-right required"><?php echo e(__('Venue Name')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('venue_name'),  old('venue_name', null), ['class'=>form_validation($errors, 'venue_name'), 'id' => fake_field('venue_name'),'data-cval-name' => 'The venue name field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('venue_name')); ?>"><?php echo e($errors->first('venue_name')); ?></span>
                      </div>
                  </div>

                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('rent')); ?>" class="col-form-label text-right required"><?php echo e(__('Rent')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('rent'),  old('rent', null), ['class'=>form_validation($errors, 'rent'),'step'=>'any', 'id' => fake_field('rent'),'data-cval-name' => 'The Rent field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('rent')); ?>"><?php echo e($errors->first('rent')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('discount')); ?>" class="col-form-label text-right required"><?php echo e(__('Discount')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('discount'),  old('discount', null), ['class'=>form_validation($errors, 'discount'),'step'=>'any', 'id' => fake_field('discount'),'data-cval-name' => 'The Discount field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('discount')); ?>"><?php echo e($errors->first('discount')); ?></span>
                      </div>
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
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('address')); ?>" class="col-form-label text-right"><?php echo e(__('Address')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('address'), old('address', null), ['class'=>[form_validation($errors, 'address'),'textarea'], 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('address')); ?>"><?php echo e($errors->first('address')); ?></span>
                    </div>
                </div>
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('features')); ?>" class="col-form-label text-right"><?php echo e(__('Features')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('features'), old('features', null), ['class'=>[form_validation($errors, 'features'),'textarea'], 'id' => fake_field('features'), 'rows'=>2,'data-cval-name' => 'The features field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('features')); ?>"><?php echo e($errors->first('features')); ?></span>
                    </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Venue Image')); ?></label>
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
                      <label for="<?php echo e(fake_field('contact_info')); ?>" class="col-form-label text-right required"><?php echo e(__('Contact Info')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('contact_info'),  old('contact_info', null), ['class'=>form_validation($errors, 'contact_info'), 'id' => fake_field('contact_info'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('contact_info')); ?>"><?php echo e($errors->first('contact_info')); ?></span>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Venue/create.blade.php ENDPATH**/ ?>