<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
        <div class="row">
            <div class="offset-1 col-md-10">
                <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                    <h5 class="float-left"><?php echo e(__('Create New Room')); ?></h5>
                    <div class="float-right">
                        <a href="<?php echo e(route('rooms.index')); ?>"
                           class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                    </div>
                </div>

                <?php echo e(Form::open(['route'=>'rooms.store', 'method' => 'post', 'class'=>'form-horizontal user-form','files'=> true])); ?>

                <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6" >
                      <label for="<?php echo e(fake_field('hotel_id')); ?>"
                             class="col-form-label text-right required"><?php echo e(__('Hotel')); ?></label>
                      <div>
                          <div class="lf-select">
                          <?php echo e(Form::select(fake_field('hotel_id'), $hotels, old('hotel_id', null),['class' => [form_validation($errors, 'hotel_id'),'select2'],'id' => fake_field('hotel_id'), 'placeholder' => __('Select Hotel'),'data-cval-name' => 'The Hotel field','placeholder'=>'Select Hotel','data-cval-rules' => 'required|integer'])); ?>

                          </div>
                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('hotel_id')); ?>"><?php echo e($errors->first('hotel_id')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('room_name')); ?>" class="col-form-label text-right required"><?php echo e(__('Room Name')); ?></label>
                      <div>
                          <?php echo e(Form::text(fake_field('room_name'),  old('room_name', null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('room_name'),'data-cval-name' => 'The room name field','data-cval-rules' => 'required'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('room_name')); ?>"><?php echo e($errors->first('room_name')); ?></span>
                      </div>
                  </div>

                </div>

                
                <div class="form-group mb-1">
                    <label for="<?php echo e(fake_field('room_details')); ?>" class="col-form-label text-right"><?php echo e(__('Room Details')); ?></label>
                    <div>
                        <?php echo e(Form::textarea(fake_field('room_details'), old('room_details', null), ['class'=>[form_validation($errors, 'room_details'),'textarea'], 'id' => fake_field('room_details'), 'rows'=>2,'data-cval-name' => 'The room_details field','data-cval-rules' => 'escapeInput'])); ?>

                        <span class="invalid-feedback cval-error"
                              data-cval-error="<?php echo e(fake_field('room_details')); ?>"><?php echo e($errors->first('room_details')); ?></span>
                    </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('floor')); ?>" class="col-form-label text-right required"><?php echo e(__('Floor')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('floor'),  old('floor', null), ['class'=>form_validation($errors, 'floor'), 'id' => fake_field('floor'),'data-cval-name' => 'The Floor field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('floor')); ?>"><?php echo e($errors->first('floor')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('quantity')); ?>" class="col-form-label text-right required"><?php echo e(__('Quantity')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('quantity'),  old('quantity', null), ['class'=>form_validation($errors, 'quantity'), 'id' => fake_field('quantity'),'data-cval-name' => 'The Hotel Category field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('quantity')); ?>"><?php echo e($errors->first('quantity')); ?></span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('room_rent_adult')); ?>" class="col-form-label text-right required"><?php echo e(__('Room Rent Adult')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('room_rent_adult'),  old('room_rent_adult', null), ['class'=>form_validation($errors, 'room_rent_adult'), 'id' => fake_field('room_rent_adult'),'step'=>'any','data-cval-name' => 'The Room Rent Adult field','data-cval-rules' => 'required|numaric'])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('room_rent_adult')); ?>"><?php echo e($errors->first('room_rent_adult')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('discount_rent_adult')); ?>" class="col-form-label text-right required"><?php echo e(__('Discount Rent Adult')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('discount_rent_adult'),  old('discount_rent_adult', null), ['class'=>form_validation($errors, 'discount_rent_adult'), 'id' => fake_field('discount_rent_adult'),'step'=>'any','data-cval-name' => 'The Discount Rent Adult field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('discount_rent_adult')); ?>"><?php echo e($errors->first('discount_rent_adult')); ?></span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('room_rent_child')); ?>" class="col-form-label text-right required"><?php echo e(__('Room Rent Child')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('room_rent_child'),  old('room_rent_child', null), ['class'=>form_validation($errors, 'room_rent_child'), 'id' => fake_field('room_rent_child'),'step'=>'any','data-cval-name' => 'The Room Rent Child field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('room_rent_child')); ?>"><?php echo e($errors->first('room_rent_child')); ?></span>
                      </div>
                  </div>
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('discount_rent_child')); ?>" class="col-form-label text-right required"><?php echo e(__('Discount Rent Child')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('discount_rent_child'),  old('discount_rent_child', null), ['class'=>form_validation($errors, 'discount_rent_child'), 'id' => fake_field('discount_rent_child'),'step'=>'any','data-cval-name' => 'The Discount Rent Child field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('discount_rent_child')); ?>"><?php echo e($errors->first('discount_rent_child')); ?></span>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group mb-1 col-md-12">
                    <label class="col-form-label text-right required">Room facilites</label>
                    <div class="row">
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities1" name="room_facilities[]" type="checkbox" value="Bathroom">
                                <label class="" for="room_facilities1">Bathroom</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities2" name="room_facilities[]" type="checkbox" value="Cable TV">
                                <label class="" for="room_facilities2">Cable TV</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities3" name="room_facilities[]" type="checkbox" value="Air conditioning">
                                <label class="" for="room_facilities3">Air conditioning</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities4" name="room_facilities[]" type="checkbox" value="Mini bar">
                                <label class="" for="room_facilities4">Mini bar</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities5" name="room_facilities[]" type="checkbox" value="WiFi">
                                <label class="" for="room_facilities5">WiFi</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities6" name="room_facilities[]" type="checkbox" value="Wheelchair - friendly room">
                                <label class="" for="room_facilities6">Wheelchair - friendly room</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities7" name="room_facilities[]" type="checkbox" value="Pay TV">
                                <label class="" for="room_facilities7">Pay TV</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities8" name="room_facilities[]" type="checkbox" value="Desk">
                                <label class="" for="room_facilities8">Desk</label>
                          </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-6">
                          <div class="lf-checkbox">
                                <input class="route-item flat-blue" id="room_facilities9" name="room_facilities[]" type="checkbox" value="Room safe">
                                <label class="" for="room_facilities9">Room safe</label>
                          </div>
                      </div>

                    </div>
                </div>
                </div>
                <div class="row">
                  
                  <div class="form-group mb-1 col-md-6">
                      <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Image')); ?></label>
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
                      <label for="<?php echo e(fake_field('person_quantity')); ?>" class="col-form-label text-right required"><?php echo e(__('Person Quantity')); ?></label>
                      <div>
                          <?php echo e(Form::number(fake_field('person_quantity'),  old('person_quantity', null), ['class'=>form_validation($errors, 'person_quantity'), 'id' => fake_field('person_quantity'),'data-cval-name' => 'The Person Quantity field','data-cval-rules' => ''])); ?>

                          <span class="invalid-feedback cval-error"
                                data-cval-error="<?php echo e(fake_field('person_quantity')); ?>"><?php echo e($errors->first('person_quantity')); ?></span>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Room/create.blade.php ENDPATH**/ ?>