<?php $__env->startSection('body'); ?>
    <h1>Projects</h1>

    <hr class="border-b my-6">

    <?php $__currentLoopData = $pagination->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo $__env->make('_components.project-preview-inline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if($project != $pagination->items->last()): ?>
            <hr class="border-b my-6">
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($pagination->pages->count() > 1): ?>
        <nav class="flex text-base my-8">
            <?php if($previous = $pagination->previous): ?>
                <a
                    href="<?php echo e($previous); ?>"
                    title="Previous Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            <?php endif; ?>

            <?php $__currentLoopData = $pagination->pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pageNumber => $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a
                    href="<?php echo e($path); ?>"
                    title="Go to Page <?php echo e($pageNumber); ?>"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3 <?php echo e($pagination->currentPage == $pageNumber ? 'text-pink-600' : 'text-pink-700'); ?>"
                ><?php echo e($pageNumber); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($next = $pagination->next): ?>
                <a
                    href="<?php echo e($next); ?>"
                    title="Next Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            <?php endif; ?>
        </nav>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/cache/ab9d2accb1e3b7d3aecd6a46afc19895fc6293ef.blade.php ENDPATH**/ ?>