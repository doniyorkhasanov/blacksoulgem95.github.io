<div class="swiper-slide">
    <div class="w-full mb-6 p-16">
        <?php if($featuredPost->cover_image): ?>
            <img src="<?php echo e($featuredPost->cover_image); ?>" alt="<?php echo e($featuredPost->title); ?> cover image" class="mb-6">
        <?php endif; ?>

        <p class="text-gray-700 font-medium my-2">
            <?php echo e($featuredPost->getDate()->format('F j, Y')); ?>

        </p>

        <h2 class="text-3xl mt-0">
            <a href="<?php echo e($featuredPost->getUrl()); ?>" title="Read <?php echo e($featuredPost->title); ?>"
               class="text-gray-900 font-extrabold">
                <?php echo e($featuredPost->title); ?>

            </a>
        </h2>

        <p class="mt-0 mb-4"><?php echo $featuredPost->getExcerpt(); ?></p>

        <a href="<?php echo e($featuredPost->getUrl()); ?>" title="Read - <?php echo e($featuredPost->title); ?>"
           class="uppercase tracking-wide mb-4">
            Read
        </a>
    </div>
</div><?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/_components/featured-carousel-item.blade.php ENDPATH**/ ?>