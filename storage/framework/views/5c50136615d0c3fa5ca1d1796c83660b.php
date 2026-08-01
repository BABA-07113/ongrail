

<?php $__env->startSection('title', 'Opportunités - RAIL Bénin'); ?>

<?php $__env->startSection('content'); ?>

<div class="page-header">
    <div class="container text-center">
        <div class="section-tag mb-5">
            <i class="fas fa-bullhorn"></i>
            Opportunités
        </div>
        <h1>Opportunités</h1>
        <p>Appels à candidature, formations, stages, emplois et volontariat</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="flex gap-2 flex-wrap justify-center mb-8 animate-fade-up">
            <a href="<?php echo e(route('opportunities.index')); ?>" class="btn btn-sm <?php echo e(!isset($type) ? 'btn-primary' : 'btn-outline'); ?>">Tout</a>
            <a href="<?php echo e(route('opportunities.type', 'appel_candidature')); ?>" class="btn btn-sm <?php echo e(isset($type) && $type === 'appel_candidature' ? 'btn-primary' : 'btn-outline'); ?>">Appels</a>
            <a href="<?php echo e(route('opportunities.type', 'formation')); ?>" class="btn btn-sm <?php echo e(isset($type) && $type === 'formation' ? 'btn-primary' : 'btn-outline'); ?>">Formations</a>
            <a href="<?php echo e(route('opportunities.type', 'stage')); ?>" class="btn btn-sm <?php echo e(isset($type) && $type === 'stage' ? 'btn-primary' : 'btn-outline'); ?>">Stages</a>
            <a href="<?php echo e(route('opportunities.type', 'emploi')); ?>" class="btn btn-sm <?php echo e(isset($type) && $type === 'emploi' ? 'btn-primary' : 'btn-outline'); ?>">Emplois</a>
            <a href="<?php echo e(route('opportunities.type', 'volontariat')); ?>" class="btn btn-sm <?php echo e(isset($type) && $type === 'volontariat' ? 'btn-primary' : 'btn-outline'); ?>">Volontariat</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5 stagger">
            <?php $__empty_1 = true; $__currentLoopData = $opportunities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $opp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="feature-card p-5 animate-fade-up" style="animation-delay:<?php echo e($loop->index * 60); ?>ms">
                <div class="flex items-center gap-2 flex-wrap mb-3">
                    <span class="badge <?php echo e($opp->type === 'appel_candidature' ? 'badge-brand' : ($opp->type === 'formation' ? 'badge-warn' : ($opp->type === 'stage' ? 'badge-surface' : ($opp->type === 'emploi' ? 'badge-danger' : 'badge-brand')))); ?>">
                        <?php echo e(str_replace(['_', 'appel_candidature'], [' ', 'Appel'], ucfirst($opp->type))); ?>

                    </span>
                    <span class="badge <?php echo e($opp->status === 'ouvert' ? 'badge-brand' : ($opp->status === 'cloture' ? 'badge-danger' : 'badge-warn')); ?>">
                        <?php echo e($opp->status === 'ouvert' ? 'Ouvert' : ($opp->status === 'cloture' ? 'Clôturé' : 'Résultats')); ?>

                    </span>
                </div>
                <h3 class="font-bold text-sm mb-2"><?php echo e($opp->title); ?></h3>
                <?php if($opp->deadline): ?>
                <div class="text-xs text-surface-400 mb-2 flex items-center gap-1.5">
                    <i class="far fa-clock"></i> Date limite : <?php echo e($opp->deadline->format('d/m/Y')); ?>

                </div>
                <?php endif; ?>
                <p class="text-surface-500 text-sm leading-relaxed mb-4 line-clamp-2"><?php echo e(Str::limit(strip_tags($opp->description), 120)); ?></p>
                <a href="<?php echo e(route('opportunities.show', $opp->slug)); ?>" class="rm">En savoir plus <i class="fas fa-arrow-right"></i></a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-16 col-span-full">
                <div class="w-16 h-16 rounded-xl bg-surface-100 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-bullhorn text-2xl text-surface-300"></i>
                </div>
                <p class="text-surface-400">Aucune opportunité pour le moment.</p>
            </div>
            <?php endif; ?>
        </div>

        <div class="mt-10">
            <?php echo e($opportunities->links()); ?>

        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\ongRail\resources\views/pages/opportunities/index.blade.php ENDPATH**/ ?>