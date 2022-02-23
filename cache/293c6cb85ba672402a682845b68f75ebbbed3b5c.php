<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="<?php echo e($page->description ?? $page->siteDescription); ?>">

        <meta property="og:title" content="<?php echo e($page->title ? $page->title . ' | ' : ''); ?><?php echo e($page->siteName); ?>"/>
        <meta property="og:type" content="<?php echo e($page->type ?? 'website'); ?>" />
        <meta property="og:url" content="<?php echo e($page->getUrl()); ?>"/>
        <meta property="og:description" content="<?php echo e($page->description ?? $page->siteDescription); ?>" />

        <title><?php echo e($page->title ?  $page->title . ' | ' : ''); ?><?php echo e($page->siteName); ?></title>

        <link rel="home" href="<?php echo e($page->baseUrl); ?>">
        <link rel="icon" href="/favicon.ico">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="<?php echo e($page->siteName); ?> Atom Feed">

        <?php if($page->production): ?>
            <!-- Insert analytics code here -->
        <?php endif; ?>


        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(mix('css/main.css', 'assets/build')); ?>">

        <?php echo $__env->make('_components.cookie-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </head>

    <body class="flex flex-col justify-between min-h-screen bg-gray-100 text-gray-800 leading-normal font-sans">
        <header class="flex items-center shadow bg-white border-b h-24 py-4" role="banner">
            <div class="container flex items-center max-w-8xl mx-auto px-4 lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="<?php echo e($page->siteName); ?> home" class="inline-flex items-center">
                        <img class="h-8 md:h-10 mr-3" src="/assets/img/logo.png" alt="<?php echo e($page->siteName); ?> logo" />


                    </a>
                </div>

                <div id="vue-search" class="flex flex-1 justify-end items-center">
                    <search></search>

                    <?php echo $__env->make('_nav.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <?php echo $__env->make('_nav.menu-toggle', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </header>

        <?php echo $__env->make('_nav.menu-responsive', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('head'); ?>

        <main role="main" class="flex-auto w-full container max-w-4xl mx-auto py-16 px-6">
            <?php echo $__env->yieldContent('body'); ?>
        </main>

        <footer class="bg-white text-center text-sm mt-12 py-4" role="contentinfo">
            <ul class="flex flex-col md:flex-row justify-around list-none">
                <li>
                    &copy; <?php echo e(date('Y')); ?> - Sofia Vicedomini.
                </li>

                <li>
                    <?php echo $__env->make("_components.random-quote", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>

                <li>
                    <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <a href="<?php echo e($social->url); ?>" target="_blank" class=" <?php if(!$loop->last): ?> mr-3 <?php endif; ?> text-2xl md:text-base ">
                            <i class="<?php echo e($social->icon); ?>" aria-label="<?php echo e($social->title); ?>"></i>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </li>

                <li>
                    <?php echo $__env->make("_components.privacy-policy-button", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </li>
            </ul>
        </footer>

        <script src="<?php echo e(mix('js/main.js', 'assets/build')); ?>"></script>
        <?php echo $__env->yieldPushContent('scripts'); ?>
        <?php echo $__env->make("_components.adsense", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/_layouts/main.blade.php ENDPATH**/ ?>