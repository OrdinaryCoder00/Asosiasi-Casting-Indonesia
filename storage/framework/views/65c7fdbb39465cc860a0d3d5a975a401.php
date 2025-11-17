<?php if (isset($component)) { $__componentOriginale22f0df36dcc7fbeae13936940d29552 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale22f0df36dcc7fbeae13936940d29552 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout.layout-home','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('layout.layout-home'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginaldb13849e583e54092285257e44118968 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginaldb13849e583e54092285257e44118968 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.banner','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.banner'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginaldb13849e583e54092285257e44118968)): ?>
<?php $attributes = $__attributesOriginaldb13849e583e54092285257e44118968; ?>
<?php unset($__attributesOriginaldb13849e583e54092285257e44118968); ?>
<?php endif; ?>
<?php if (isset($__componentOriginaldb13849e583e54092285257e44118968)): ?>
<?php $component = $__componentOriginaldb13849e583e54092285257e44118968; ?>
<?php unset($__componentOriginaldb13849e583e54092285257e44118968); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala0ea4e16a04f51850bead0acb0e4d3dc = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala0ea4e16a04f51850bead0acb0e4d3dc = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.ourteam','data' => ['team' => $team]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.ourteam'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['team' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($team)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala0ea4e16a04f51850bead0acb0e4d3dc)): ?>
<?php $attributes = $__attributesOriginala0ea4e16a04f51850bead0acb0e4d3dc; ?>
<?php unset($__attributesOriginala0ea4e16a04f51850bead0acb0e4d3dc); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala0ea4e16a04f51850bead0acb0e4d3dc)): ?>
<?php $component = $__componentOriginala0ea4e16a04f51850bead0acb0e4d3dc; ?>
<?php unset($__componentOriginala0ea4e16a04f51850bead0acb0e4d3dc); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal8d673b1dc7224966d02fe5c661d4fa80 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8d673b1dc7224966d02fe5c661d4fa80 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.film','data' => ['film' => $film]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.film'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['film' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($film)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8d673b1dc7224966d02fe5c661d4fa80)): ?>
<?php $attributes = $__attributesOriginal8d673b1dc7224966d02fe5c661d4fa80; ?>
<?php unset($__attributesOriginal8d673b1dc7224966d02fe5c661d4fa80); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8d673b1dc7224966d02fe5c661d4fa80)): ?>
<?php $component = $__componentOriginal8d673b1dc7224966d02fe5c661d4fa80; ?>
<?php unset($__componentOriginal8d673b1dc7224966d02fe5c661d4fa80); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalf4c0f5c1d8a42fca2761abaf3335da25 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf4c0f5c1d8a42fca2761abaf3335da25 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.news','data' => ['news' => $news]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.news'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['news' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($news)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf4c0f5c1d8a42fca2761abaf3335da25)): ?>
<?php $attributes = $__attributesOriginalf4c0f5c1d8a42fca2761abaf3335da25; ?>
<?php unset($__attributesOriginalf4c0f5c1d8a42fca2761abaf3335da25); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf4c0f5c1d8a42fca2761abaf3335da25)): ?>
<?php $component = $__componentOriginalf4c0f5c1d8a42fca2761abaf3335da25; ?>
<?php unset($__componentOriginalf4c0f5c1d8a42fca2761abaf3335da25); ?>
<?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale22f0df36dcc7fbeae13936940d29552)): ?>
<?php $attributes = $__attributesOriginale22f0df36dcc7fbeae13936940d29552; ?>
<?php unset($__attributesOriginale22f0df36dcc7fbeae13936940d29552); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale22f0df36dcc7fbeae13936940d29552)): ?>
<?php $component = $__componentOriginale22f0df36dcc7fbeae13936940d29552; ?>
<?php unset($__componentOriginale22f0df36dcc7fbeae13936940d29552); ?>
<?php endif; ?>
<?php /**PATH C:\Users\namor\ACI\resources\views/welcome.blade.php ENDPATH**/ ?>