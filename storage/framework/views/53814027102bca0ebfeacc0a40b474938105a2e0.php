<?php
    $attributes = '';

    $class = isset($class) ? 'table '.$class : 'table';

    if(isset($type) && !empty($type)){
       foreach (explode(' ', $type) as $type){
          $class .=  ' table-'.$type;
       }
    }

    $attributes .= 'class="'.$class.'"';

    if(isset($id)){
        $attributes.= ' id="'.$id.'"';
    }

    if(isset($style)){
        $attributes.= ' style="'.$style.'"';
    }

?>

<table <?php echo e(view_html($attributes)); ?>>
    <?php if(isset($thead)): ?>
        <thead>
        <?php echo e($thead); ?>

        </thead>
    <?php endif; ?>
    <tbody>
    <?php echo e($slot); ?>

    </tbody>

    <?php if(isset($tfoot)): ?>
        <tfoot>
        <?php echo e($tfoot); ?>

        </tfoot>
    <?php endif; ?>
</table>
<?php /**PATH /Applications/MAMP/htdocs/booking/resources/views/components/table.blade.php ENDPATH**/ ?>