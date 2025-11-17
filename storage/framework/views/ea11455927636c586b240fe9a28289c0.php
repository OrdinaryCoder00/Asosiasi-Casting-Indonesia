<?php if($record->video): ?>
<video controls style="max-width:100%; border-radius:5px;">
    <source src="<?php echo e(route('casting.video.stream', ['filename' => $record->fullname . '/videos/' . basename($record->video)])); ?>" type="video/mp4">
</video>

<?php else: ?>
    <span>No video uploaded</span>
<?php endif; ?>
<?php /**PATH C:\Users\namor\ACI\resources\views/filament/casting-submission-video.blade.php ENDPATH**/ ?>