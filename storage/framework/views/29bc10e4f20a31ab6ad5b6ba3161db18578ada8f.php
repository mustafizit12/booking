<li class="individual-menu-item">
    <div class="innermenu">
        <div class="innermenuhead">
            <div class="title">
                <?php echo e($row['name'] !='' ? $row['name'] : 'Unnamed'); ?>

            </div>
            <div class="type"><span class="arrow-icon">
                <?php echo e($row['route'] !='' ? 'Route' : 'Link'); ?>

                <i class="fa fa-caret-right"></i></span>
            </div>
        </div>
        <div class="innermenubody">
            <p><label><?php echo e(__('Navigation Label')); ?><br></label><input type="text" class="name" value="<?php echo e($row['name']); ?>" name="menu_item[<?php echo e($row['order']); ?>][name]"></p>
            <?php if($row['route']==''): ?>
            <p><label><?php echo e(__('Link')); ?><br></label><input type="text" class="custom-link-field prevent-default" value="<?php echo e($row['custom_link']); ?>" name="menu_item[<?php echo e($row['order']); ?>][custom_link]"></p>
            <?php else: ?>
                <p style="padding-top:10px"><label><?php echo e(__('Route: :route', ['route'=> $row['route']])); ?></label></p>
            <?php endif; ?>
            <div class="row">
                <div class="col-sm-6">
                    <p><label><?php echo e(__('Extra Class')); ?><br></label><input type="text" name="menu_item[<?php echo e($row['order']); ?>][class]" value="<?php echo e($row['class']); ?>" class="prevent-default"></p>
                    </div>
                <div class="col-sm-6">
                    <p><label><?php echo e(__('Menu Icon')); ?><br></label><input type="text" name="menu_item[<?php echo e($row['order']); ?>][icon]" value="<?php echo e($row['icon']); ?>" class="prevent-default"></p>
                </div>
            </div>
            <p><label><?php echo e(__('Beginning Text')); ?><br></label><input type="text" name="menu_item[<?php echo e($row['order']); ?>][beginning_text]" value="<?php echo e($row['beginning_text']); ?>" class="prevent-default"></p>
            <p><label><?php echo e(__('Ending Text')); ?><br></label><input type="text" name="menu_item[<?php echo e($row['order']); ?>][ending_text]" value="<?php echo e($row['ending_text']); ?>" class="prevent-default"></p>
            <p class="mt-2"><label for=""></label><input type="checkbox" class="newwindow"<?php echo e($row['new_tab']==1 ? ' checked' : ''); ?>><em><?php echo e(__('Open link in a new window/tab')); ?></em></p>
            <p class="mymgmenu"><label for=""></label><input type="checkbox" class="megamenu"<?php echo e($row['mega_menu'] == 1 ? ' checked' : ''); ?>><em><?php echo e(__('Use As Mega Menu')); ?></em></p>
            <hr class="myhrborder">
            <button class="deletebutton"><?php echo e(__('Remove')); ?></button>
            <?php if($row['route']!=''): ?>
                <input type="hidden" value="<?php echo e($row['custom_link']); ?>" name="menu_item[<?php echo e($row['order']); ?>][custom_link]" class="custom-link-field">
            <?php endif; ?>
            
            <input type="hidden" name="menu_item[<?php echo e($row['order']); ?>][parent_id]" value="<?php echo e($row['parent_id']); ?>" class="hidden-parent-field">
            <input type="hidden" name="menu_item[<?php echo e($row['order']); ?>][route]" value="<?php echo e($row['route']); ?>" class="hidden-route-field">
            <input type="hidden" name="menu_item[<?php echo e($row['order']); ?>][new_tab]" value="<?php echo e($row['new_tab']); ?>" class="hidden-newtab-field">
            <input type="hidden" name="menu_item[<?php echo e($row['order']); ?>][mega_menu]" value="<?php echo e($row['mega_menu']); ?>" class="hidden-megamenu-field">
            <input type="hidden" name="menu_item[<?php echo e($row['order']); ?>][order]" value="<?php echo e($row['order']); ?>" class="hidden-order-field">
        </div>
    </div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/core/renderable_template/_backend_navigation.blade.php ENDPATH**/ ?>