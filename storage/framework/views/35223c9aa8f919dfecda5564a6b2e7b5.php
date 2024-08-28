<?php if($product['video']): ?>
<div class="video-wrap">
  <?php if($product['video'] && strpos($product['video'], '<iframe') === false): ?>
  <video
    id="product-video"
    class="video-js vjs-big-play-centered vjs-fluid vjs-16-9"
    controls loop muted
  >
    <source src="<?php echo e(image_origin($product['video'])); ?>" type="video/mp4" />
  </video>
  <?php else: ?>
  <div id="product-video"></div>
  <?php endif; ?>
  <div class="close-video d-none"><i class="bi bi-x-circle"></i></div>
  <div class="open-video d-none"><i class="bi bi-play-circle"></i></div>
</div>
<?php endif; ?>

<?php $__env->startPush('add-scripts'); ?>
<?php if($product['video'] && strpos($product['video'], '<iframe') === false): ?>
  <script>
    let pVideo = null;

    $(function () {
      if ($('#product-video').length) {
        pVideo = videojs("product-video");

        pVideo.on('loadedmetadata', function(e) {
          $('.open-video').removeClass('d-none');
        });

        $(document).on('click', '.open-video', function () {
          pVideo.play();
          pVideo.currentTime(0);
          $(this).addClass('d-none');
          $('#product-video').fadeIn();
          $('.close-video').removeClass('d-none');
        });

        $(document).on('click', '.close-video', function () {
          closeVideo()
        });
      }
    })

    function closeVideo() {
      if (pVideo) {
        pVideo.pause();
        $('#product-video').fadeOut();
        $('.close-video').addClass('d-none');
        $('.open-video').removeClass('d-none');
      }
    }
  </script>
<?php else: ?>
  <script>
    const ytVideoIframe = '<?php echo $product['video']; ?>';
    $('.open-video').removeClass('d-none');
    $('#product-video').html(ytVideoIframe)

    $(document).on('click', '.open-video', function () {
      $('#product-video iframe').attr({width: '100%', height: '100%'});
      $('#product-video iframe').attr('src', $('#product-video iframe').attr('src') + '&autoplay=1&muted=1');
      $(this).addClass('d-none');
      $('#product-video').fadeIn();
      $('.close-video').removeClass('d-none');
    });

    $(document).on('click', '.close-video', function () {
      closeVideo()
    });

    function closeVideo() {
      $('#product-video').fadeOut();
      $('#product-video').html()
      $('.close-video').addClass('d-none');
      $('.open-video').removeClass('d-none');
    }
  </script>
<?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH G:\workspace\new\themes\default/product/product-video.blade.php ENDPATH**/ ?>