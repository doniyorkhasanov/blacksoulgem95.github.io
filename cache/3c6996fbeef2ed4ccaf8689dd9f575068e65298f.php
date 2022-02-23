<?php $__env->startSection('head'); ?>
    <?php echo $__env->make("_components.hero", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

    <div class="block mb-6">
        <h1 class="text-center mb-0">Featured</h1>
        <?php echo $__env->make('_components.featured-carousel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <hr class="block w-full border-b mt-6 mb-6">

    


    <h2 class="text-center">Latest posts</h2>

    <?php $__currentLoopData = $posts->take(6)->chunk(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="flex flex-col md:flex-row md:-mx-6">
            <?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="w-full md:w-1/2 md:mx-6">
                    <?php echo $__env->make('_components.post-preview-inline', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>

                <?php if(! $loop->last): ?>
                    <hr class="block md:hidden w-full border-b mt-2 mb-6">
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <?php if(! $loop->last): ?>
            <hr class="w-full border-b mt-2 mb-6">
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/index.blade.php ENDPATH**/ ?>