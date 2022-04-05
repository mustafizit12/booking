<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Visa')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('visas.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'visas.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('title')); ?>" class="col-form-label text-right required"><?php echo e(__('Title')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('title'),  old('title', null), ['class'=>form_validation($errors, 'title'), 'id' => fake_field('title'),'data-cval-name' => 'The title field','data-cval-rules' => 'required|escapeInput|alphaSpace'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('title')); ?>"><?php echo e($errors->first('title')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('visa_country')); ?>" class="col-form-label text-right required"><?php echo e(__('Visa Country')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('visa_country'),  old('visa_country', null), ['class'=>form_validation($errors, 'visa_country'), 'id' => fake_field('visa_country'),'data-cval-name' => 'The visa country field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('visa_country')); ?>"><?php echo e($errors->first('visa_country')); ?></span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('cost')); ?>" class="col-form-label text-right required"><?php echo e(__('Cost')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('cost'),  old('cost', null), ['class'=>form_validation($errors, 'cost'),'step'=>'any', 'id' => fake_field('cost'),'data-cval-name' => 'The Visa cost field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('cost')); ?>"><?php echo e($errors->first('cost')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('visa_duration')); ?>" class="col-form-label text-right required"><?php echo e(__('Visa Duration')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('visa_duration'),  old('visa_duration',null), ['class'=>form_validation($errors, 'visa_duration'), 'id' => fake_field('visa_duration'),'data-cval-name' => 'The visa duration field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('visa_duration')); ?>"><?php echo e($errors->first('visa_duration')); ?></span>
                      </div>
                  </div>
                </div>
                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('details')); ?>" class="col-form-label text-right"><?php echo e(__('Details')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('details'), old('details', null), ['class'=>[form_validation($errors, 'details'),'textarea'], 'id' => fake_field('details'), 'rows'=>2,'data-cval-name' => 'The details field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('details')); ?>"><?php echo e($errors->first('details')); ?></span>
                    </div>
                </div>

                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Visa Image')); ?></label>
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
    <script>
        $(document).ready(function () {
            $('.user-form').cValidate({});
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Visa/create.blade.php ENDPATH**/ ?>