<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <div class="container my-5">
      <div class="row">
          <div class="offset-1 col-md-10">
            <div class="bg-primary text-white clearfix py-3 px-3 mb-3">
                <h5 class="float-left"><?php echo e(__('Edit Hotel Information')); ?></h5>
                <div class="float-right">
                    <a href="<?php echo e(route('hotels.index')); ?>"
                       class="btn btn-info btn-sm back-button"><i class="fa fa-reply"></i></a>
                </div>
            </div>
            <?php echo e(Form::open(['route'=>['hotels.update',$hotel->id], 'method'=>'PUT','class'=> 'roles-form clearfix','files'=> true])); ?>

            <?php echo '<input type="hidden" value="'.base_key().'" name="base_key">'  ?>

            <div class="row">
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('name')); ?>" class="col-form-label text-right required"><?php echo e(__('Hotel Name')); ?></label>
                  <div>
                      <?php echo e(Form::text(fake_field('name'),  old('name', isset($hotel) ? $hotel->name : null), ['class'=>form_validation($errors, 'name'), 'id' => fake_field('name'),'data-cval-name' => 'The name field','data-cval-rules' => 'required'])); ?>

                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('name')); ?>"><?php echo e($errors->first('name')); ?></span>
                  </div>
              </div>
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('contact_number')); ?>" class="col-form-label text-right required"><?php echo e(__('Contact Number')); ?></label>
                  <div>
                      <?php echo e(Form::text(fake_field('contact_number'),  old('contact_number', isset($hotel) ? $hotel->contact_number : null), ['class'=>form_validation($errors, 'contact_number'), 'id' => fake_field('contact_number'),'data-cval-name' => 'The contact number field','data-cval-rules' => 'required'])); ?>

                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('contact_number')); ?>"><?php echo e($errors->first('contact_number')); ?></span>
                  </div>
              </div>
            </div>
            <div class="row">
              
              <div class="form-group mb-1 col-md-6" >
                  <label for="<?php echo e(fake_field('user_id')); ?>"
                         class="col-form-label text-right required"><?php echo e(__('Vendor')); ?></label>
                  <div>
                      <div class="lf-select">
                      <?php echo e(Form::select(fake_field('user_id'), $vendor_list, old('user_id', isset($hotel) ? $hotel->user_id : null),['class' => [form_validation($errors, 'user_id'),'select2'],'id' => fake_field('user_id'), 'placeholder' => __('Select Vendor'),'data-cval-name' => 'The Vendor field','placeholder'=>'Select Vendor','data-cval-rules' => 'required|integer'])); ?>

                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('user_id')); ?>"><?php echo e($errors->first('user_id')); ?></span>
                  </div>
              </div>


              
              <div class="form-group mb-1 col-md-6" >
                  <label for="<?php echo e(fake_field('area_id')); ?>"
                         class="col-form-label text-right required"><?php echo e(__('Area')); ?></label>
                  <div>
                      <div class="lf-select">
                      <?php echo e(Form::select(fake_field('area_id'), $areas, old('area_id', isset($hotel) ? $hotel->area_id : null),['class' => [form_validation($errors, 'area_id'),'select2'],'id' => fake_field('area_id'), 'placeholder' => __('Select Area'),'data-cval-name' => 'The Area field','placeholder'=>'Select Area','data-cval-rules' => 'required|integer'])); ?>

                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('area_id')); ?>"><?php echo e($errors->first('area_id')); ?></span>
                  </div>
              </div>
            </div>
            <div class="row">
              
              <div class="form-group mb-1 col-md-6" >
                  <label for="<?php echo e(fake_field('agent_id')); ?>"
                         class="col-form-label text-right required"><?php echo e(__('Agent')); ?></label>
                  <div>
                      <div class="lf-select">
                      <?php echo e(Form::select(fake_field('agent_id'), $agent_list, old('agent_id', isset($hotel) ? $hotel->area_id : null),['class' => [form_validation($errors, 'agent_id'),'select2','agent_id'],'id' => fake_field('agent_id'), 'placeholder' => __('Select Vendor'),'data-cval-name' => 'The Agent field','placeholder'=>'Select Agent','data-cval-rules' => 'required|integer'])); ?>

                      </div>
                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('agent_id')); ?>"><?php echo e($errors->first('agent_id')); ?></span>
                  </div>
              </div>
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('hotel_category')); ?>" class="col-form-label text-right required"><?php echo e(__('Hotel Category')); ?></label>
                  <div>
                      <?php echo e(Form::number(fake_field('hotel_category'),  old('hotel_category', isset($hotel) ? $hotel->hotel_category : null), ['class'=>form_validation($errors, 'hotel_category'), 'id' => fake_field('hotel_category'),'data-cval-name' => 'The Hotel Category field','data-cval-rules' => ''])); ?>

                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('hotel_category')); ?>"><?php echo e($errors->first('hotel_category')); ?></span>
                  </div>
              </div>
            </div>
            <div class="row">
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('vendor_commision')); ?>" class="col-form-label text-right required"><?php echo e(__('Vendor Commision:(%)')); ?></label>
                  <div>
                      <?php echo e(Form::number(fake_field('vendor_commision'),  old('vendor_commision', isset($hotel) ? $hotel->vendor_commision : null), ['class'=>form_validation($errors, 'vendor_commision'),'step'=>'any', 'id' => fake_field('vendor_commision'),'data-cval-name' => 'The Vendor Commision field','data-cval-rules' => ''])); ?>

                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('vendor_commision')); ?>"><?php echo e($errors->first('vendor_commision')); ?></span>
                  </div>
              </div>
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('agent_commision')); ?>" class="col-form-label text-right required"><?php echo e(__('Agent Commision:(%)')); ?></label>
                  <div>
                      <?php echo e(Form::number(fake_field('agent_commision'),  old('agent_commision', isset($hotel) ? $hotel->agent_commision : null), ['class'=>form_validation($errors, 'agent_commision'),'step'=>'any', 'id' => fake_field('agent_commision'),'data-cval-name' => 'The Agent Commision field','data-cval-rules' => ''])); ?>

                      <span class="invalid-feedback cval-error"
                            data-cval-error="<?php echo e(fake_field('agent_commision')); ?>"><?php echo e($errors->first('agent_commision')); ?></span>
                  </div>
              </div>
            </div>
            
            <div class="form-group mb-1">
                <label for="<?php echo e(fake_field('description')); ?>" class="col-form-label text-right"><?php echo e(__('Description')); ?></label>
                <div>
                    <?php echo e(Form::textarea(fake_field('description'), old('description', isset($hotel) ? $hotel->description : null), ['class'=>[form_validation($errors, 'description'),'textarea'], 'id' => fake_field('description'), 'rows'=>2,'data-cval-name' => 'The description field','data-cval-rules' => 'escapeInput'])); ?>

                    <span class="invalid-feedback cval-error"
                          data-cval-error="<?php echo e(fake_field('description')); ?>"><?php echo e($errors->first('description')); ?></span>
                </div>
            </div>
            
            <div class="form-group mb-1">
                <label for="<?php echo e(fake_field('address')); ?>" class="col-form-label text-right"><?php echo e(__('Address')); ?></label>
                <div>
                    <?php echo e(Form::textarea(fake_field('address'), old('address', isset($hotel) ? $hotel->address : null), ['class'=>[form_validation($errors, 'address'),'textarea'], 'id' => fake_field('address'), 'rows'=>2,'data-cval-name' => 'The address field','data-cval-rules' => 'escapeInput'])); ?>

                    <span class="invalid-feedback cval-error"
                          data-cval-error="<?php echo e(fake_field('address')); ?>"><?php echo e($errors->first('address')); ?></span>
                </div>
            </div>
            
            <div class="form-group mb-1">
                <label for="<?php echo e(fake_field('features')); ?>" class="col-form-label text-right"><?php echo e(__('Features')); ?></label>
                <div>
                    <?php echo e(Form::textarea(fake_field('features'), old('features', isset($hotel) ? $hotel->features : null), ['class'=>[form_validation($errors, 'features'),'textarea'], 'id' => fake_field('features'), 'rows'=>2,'data-cval-name' => 'The features field','data-cval-rules' => 'escapeInput'])); ?>

                    <span class="invalid-feedback cval-error"
                          data-cval-error="<?php echo e(fake_field('features')); ?>"><?php echo e($errors->first('features')); ?></span>
                </div>
            </div>
            <?php
            $keywords = [];
            if(sizeof($hotel->keywords)>0){
              $keywords = $hotel->keywords->pluck('keyword')->toArray();
              //dd($keywords);
            }
            ?>
            <div class="row">
              <div class="form-group mb-1 col-md-12">
                <label class="col-form-label text-right required">Hotel facilites</label>
                <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords1" name="hotel_keywords[]" type="checkbox" value="Wi-Fi" <?php if(in_array('Wi-Fi',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords1">Wi-Fi</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords2" name="hotel_keywords[]" type="checkbox" value="Parking" <?php if(in_array('Parking',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords2">Parking</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords3" name="hotel_keywords[]" type="checkbox" value="Airport Shuttle" <?php if(in_array('Airport Shuttle',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords3">Airport Shuttle</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords4" name="hotel_keywords[]" type="checkbox" value="Meeting / Banquet Facilities" <?php if(in_array('Meeting / Banquet Facilities',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords4">Meeting / Banquet Facilities</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords5" name="hotel_keywords[]" type="checkbox" value="Swimming pool" <?php if(in_array('Swimming pool',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords5">Swimming pool</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords6" name="hotel_keywords[]" type="checkbox" value="Restaurant" <?php if(in_array('Restaurant',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords6">Restaurant</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords7" name="hotel_keywords[]" type="checkbox" value="Fitness Centre" <?php if(in_array('Fitness Centre',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords7">Fitness Centre</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords8" name="hotel_keywords[]" type="checkbox" value="SPA & Wellness Centre" <?php if(in_array('SPA & Wellness Centre',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords8">SPA & Wellness Centre</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords9" name="hotel_keywords[]" type="checkbox" value="Pets allowed" <?php if(in_array('Pets allowed',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords9">Pets allowed</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords10" name="hotel_keywords[]" type="checkbox" value="Lift" <?php if(in_array('Lift',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords10">Lift</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords11" name="hotel_keywords[]" type="checkbox" value="Air condition" <?php if(in_array('Air condition',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords11">Air condition</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords12" name="hotel_keywords[]" type="checkbox" value="Family rooms" <?php if(in_array('Family rooms',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords12">Family rooms</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords13" name="hotel_keywords[]" type="checkbox" value="Non - smoking rooms" <?php if(in_array('Non - smoking rooms',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords13">Non - smoking rooms</label>
                      </div>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-6">
                      <div class="lf-checkbox">
                            <input class="route-item flat-blue" id="hotel_keywords14" name="hotel_keywords[]" type="checkbox" value="Rooms/facilities for disabled guests" <?php if(in_array('Rooms/facilities for disabled guests',$keywords)): ?> checked <?php endif; ?>>
                            <label class="" for="hotel_keywords14">Rooms/facilities for disabled guests</label>
                      </div>
                  </div>
                </div>
            </div>
            </div>
            <div class="row">
              
              <div class="form-group mb-1 col-md-6">
                  <label for="<?php echo e(fake_field('image')); ?>" class="col-form-label text-right required"><?php echo e(__('Hotel Image')); ?></label>
                  <div >
                      <!--  <input type="file" name="image[]" multiple class="form-control" >
                      <?php echo e(Form::file(fake_field('image'),  ['class'=>form_validation($errors, 'image'), 'id' => fake_field('image'),'multiple'=>"multiple",'data-cval-image' => 'The File field','data-cval-rules' => ''])); ?> -->
                      <fieldset class="form-group form-control">
                          <a href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                          <input type="file" id="pro-image" name="image[]" style="display: none;" class="form-control" multiple accept="image/*">
                      </fieldset>
                      <span class="invalid-feedback cval-error"
                          data-cval-error="<?php echo e(fake_field('image')); ?>"><?php echo e($errors->first('image')); ?></span>
                      <div style="display:none;" id="all_remove_image_ids">

                      </div>

                      <div class="preview-images-zone" <?php if(sizeof($hotel->image) == 0): ?>style="display:none;"<?php endif; ?>>
                          <?php if(sizeof($hotel->image)>0): ?>
                              <?php $__currentLoopData = $hotel->image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$img): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div class="preview-image preview-show-<?php echo e($key); ?>">
                                      <div class="image-cancel remove_image" id="<?php echo e($img->id); ?>" data-no="<?php echo e($key); ?>">x</div>
                                      <div class="image-zone"><img id="pro-img-<?php echo e($key); ?>" src="<?php echo e(get_hotel_image($img->image_path)); ?>"></div>
                                      <div class="tools-edit-image"></div>
                                  </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          <?php endif; ?>
                      </div>
                  </div>
              </div>

            </div>
            
            <div class="form-group ">

                    <?php echo e(Form::submit(__('Update Information'),['class'=>'btn btn-info btn-sm btn-left '])); ?>



            </div>
            <?php echo e(Form::close()); ?>

          </div>
      </div>
        <div class="bg-primary text-white mb-3 clearfix py-3 px-3">
            <div class="row">
                <div class="col-md-6">
                    <a href="<?php echo e(route('hotels.show', $hotel->id)); ?>"
                       class="btn btn-sm btn-info btn-sm-block"><?php echo e(__('View Information')); ?></a>
                </div>
                <div class="col-md-6 text-right">
                    <a href="<?php echo e(route('hotels.index')); ?>"
                       class="btn btn-sm btn-info btn-sm-block"><?php echo e(__('View All Hotel')); ?></a>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/cvalidator.js')); ?>"></script>
    <script src="<?php echo e(asset('js/role_manager.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.roles-form').cValidate({});
            $('.remove_image').click(function(){
              var id = $(this).attr('id');
              var data = '<input type="hidden" name="remove_image[]"  value="'+id+'">';
              $('#all_remove_image_ids').append(data);
            });
            $("#<?php echo e(fake_field('area_id')); ?>").change(function(){
                var area_id = $(this).val();
                if(area_id)
                {
                    $.ajax({
                        url : '/hotels/getAgent/' +area_id,
                        type : "GET",
                        dataType : "json",
                        success:function(data)
                        {
                        //console.log(data);
                        $("#<?php echo e(fake_field('agent_id')); ?>").empty();
                        jQuery.each(data, function(key,value){
                            $("#<?php echo e(fake_field('agent_id')); ?>").append('<option value="'+ value['user_id'] +'">'+ value['first_name'] +' '+ value['last_name'] +'</option>');
                        });
                        }
                    });
                }
                else
                {
                    $("#<?php echo e(fake_field('agent_id')); ?>").empty();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/Hotel/edit.blade.php ENDPATH**/ ?>