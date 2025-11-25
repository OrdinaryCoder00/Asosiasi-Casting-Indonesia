<?php if($record->photo): ?>
    <img src="<?php echo e(asset('storage/' . $record->photo)); ?>" style="max-width:100%; border-radius:5px;" />
<?php else: ?>
    <span>No photo uploaded</span>
<?php endif; ?><?php /**PATH C:\Users\namor\ACI\resources\views/filament/casting-submission-photo.blade.php ENDPATH**/ ?>