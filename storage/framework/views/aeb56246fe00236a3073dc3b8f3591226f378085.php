<?php
    $attributes = '';

    $class = isset($class) ? 'card card-outline '.$class : 'card card-outline';
    $class = isset($type) ? $class. ' card-'. $type : $class;
    $attributes .= 'class="'.$class.'"';

    if(isset($id)){
        $attributes.= ' id="'.$id.'"';
    }

    if(isset($style)){
        $attributes.= ' style="'.$style.'"';
    }

?>

<div <?php echo e(view_html($attributes)); ?>>
    <?php if(isset($header)): ?>
        <div class="card-header">
            <?php echo e($header); ?>

        </div>
    <?php endif; ?>

    <div class="card-body">
        <?php echo e($slot); ?>

    </div>

    <?php if(isset($footer)): ?>
        <div class="card-footer">
            <?php echo e($footer); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/components/card.blade.php ENDPATH**/ ?>