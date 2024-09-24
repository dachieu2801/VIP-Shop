<button type="button" class="btn border fw-bold w-100 mb-3" class="provider-btn" onclick="bk.openWin('<?php echo e(shop_route('social.redirect', $provider['provider'])); ?>')">
    <img src="<?php echo e(plugin_resize('social' , '/image/' . $provider['provider'] . '.png')); ?>" class="img-fluid wh-20 me-2">
    <?php echo e(__("Social::providers.".$provider['provider'])); ?>

</button>
<?php /**PATH D:\shop-freelance\plugins/Social/Views/shop/social_button.blade.php ENDPATH**/ ?>