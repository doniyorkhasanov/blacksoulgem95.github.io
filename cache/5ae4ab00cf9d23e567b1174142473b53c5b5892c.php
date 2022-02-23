<div class="flex justify-center flex-col mb-6 p-6">
    <p class="text-sm">By commenting you accept the website's <?php echo $__env->make("_components.privacy-policy-button", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></p>
    <div id="valine"></div>
</div>

<?php $__env->startPush("scripts"); ?>
    <script>
        new Valine({
            el: "#valine",
            appId: 'Y6KS0fajEtMP1Lbcg5HSfhli-MdYXbMMI',
            appKey: 'AKj9dL9s6YzaIVW531YyxXhz',
            lang: 'en',
            serverURLs: 'https://y6ks0faj.api.lncldglobal.com',
            avatar: 'robohash'
        })
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /Users/blacksoulgem95/development/italianprogrammer-site/source/_components/comments.blade.php ENDPATH**/ ?>