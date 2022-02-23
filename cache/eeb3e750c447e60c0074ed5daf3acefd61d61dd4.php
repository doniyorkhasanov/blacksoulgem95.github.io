<?php
    $page->type = 'article';
?>

<?php $__env->startSection('body'); ?>
    <?php if($page->cover_image): ?>
        <img src="<?php echo e($page->cover_image); ?>" alt="<?php echo e($page->title); ?> cover image" class="mb-2">
    <?php endif; ?>

    <h1 class="leading-none mb-2"><?php echo e($page->title); ?></h1>

    <p class="text-gray-700 text-xl md:mt-0"><?php echo e($page->author); ?>  •  <?php echo e(date('F j, Y', $page->date)); ?></p>

    <?php if($page->categories): ?>
        <?php $__currentLoopData = $page->categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a
                href="<?php echo e('/categories/' . $category); ?>"
                title="View posts in <?php echo e($category); ?>"
                class="inline-block bg-gray-300 hover:bg-pink-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            ><?php echo e($category); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

    <div class="border-b border-pink-200 mb-10 pb-4" v-pre>
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="border-b border-pink-200 mb-10 flex justify-center">
        <?php echo $__env->make("_components.kofi", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <nav class="flex justify-between text-sm md:text-base mb-6">
        <div>
            <?php if($next = $page->getNext()): ?>
                <a href="<?php echo e($next->getUrl()); ?>" title="Older Post: <?php echo e($next->title); ?>">
                    &LeftArrow; <?php echo e($next->title); ?>

                </a>
            <?php endif; ?>
        </div>

        <div>
            <?php if($previous = $page->getPrevious()): ?>
                <a href="<?php echo e($previous->getUrl()); ?>" title="Newer Post: <?php echo e($previous->title); ?>">
                    <?php echo e($previous->title); ?> &RightArrow;
                </a>
            <?php endif; ?>
        </div>
    </nav>

    <?php echo $__env->make("_components.comments", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('_layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/_layouts/post.blade.php ENDPATH**/ ?>