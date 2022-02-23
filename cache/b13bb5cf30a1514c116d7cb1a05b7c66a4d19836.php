<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-2">
        <span>Since <?php echo e($project->getDate()->format('F, Y')); ?></span>
        <?php if($project->end_date): ?>
            <span>to <?php echo e(date('F, Y', $project->end_date)); ?></span>
        <?php endif; ?>
    </p>

    <h2 class="text-3xl mt-0">
        <a
            href="<?php echo e($project->getUrl()); ?>"
            title="Read more - <?php echo e($project->name); ?>"
            class="text-gray-900 font-extrabold"
        ><?php echo e($project->name); ?></a>
    </h2>

    <p class="mb-4 mt-0"><?php echo $project->getExcerpt(200); ?></p>

    <a
        href="<?php echo e($project->getUrl()); ?>"
        title="Read more - <?php echo e($project->name); ?>"
        class="uppercase font-semibold tracking-wide mb-2"
    >Read</a>
</div>
<?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/_components/project-preview-inline.blade.php ENDPATH**/ ?>