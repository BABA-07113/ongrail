

<?php $__env->startSection('title', $gallery->title . ' - RAIL Bénin'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-images"></i>
            Galerie
        </div>
        <h1><?php echo e($gallery->title); ?></h1>
        <?php if($gallery->description): ?>
        <p><?php echo e($gallery->description); ?></p>
        <?php endif; ?>
    </div>
</div>

<section class="py-14 lg:py-20">
    <div class="container">
        <?php if($gallery->images->count() > 0): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 animate-fade-up">
            <?php $__currentLoopData = $gallery->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="rounded-xl overflow-hidden relative group cursor-pointer aspect-square">
                <img src="<?php echo e(asset($image->image)); ?>" alt="<?php echo e($gallery->title); ?>" loading="lazy" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <i class="fas fa-search-plus text-white text-xl"></i>
                </div>
                <?php if($image->caption): ?>
                <div class="absolute bottom-0 left-0 right-0 pt-8 pb-2.5 px-3 bg-gradient-to-t from-black/50 to-transparent text-white text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <?php echo e($image->caption); ?>

                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <div class="text-center py-16">
            <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-image text-2xl text-surface-300"></i>
            </div>
            <p class="text-surface-400">Aucune image dans cette galerie.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ongRail\resources\views/pages/galleries/show.blade.php ENDPATH**/ ?>