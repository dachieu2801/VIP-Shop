<footer>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

  <div class="container">
     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.services.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>

    <?php if($footer_content['services']['enable']): ?>
      <div class="services-wrap">
        <div class="row align-items-lg-center">
          <?php $__currentLoopData = $footer_content['services']['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="service-item my-1">
                <div class="icon"><img src="<?php echo e(image_resize($item['image'], 80, 80)); ?>" class="img-fluid"></div>
                <div class="text">
                  <p class="title"><?php echo e($item['title'][locale()] ?? ''); ?></p>
                  <p class="sub-title"><?php echo e($item['sub_title'][locale()] ?? ''); ?></p>
                </div>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
      </div>
    <?php endif; ?>

     <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.services.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
    <?php
      $categories = [
[
  'id'=> 100005,
  'name'=> "Mua Với Giá Đặc Biệt",
  'image'=> "http: //127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100005",
  'children'=> [],
],
[
  'id'=> 100006,
  'name'=> "Thể Thao Ngoài Trời",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100006",
  'children'=> [
    [
      'id'=> 100008,
      'name'=> "Lều",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100008",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100010,
  'name'=> "Quần Áo Nam Và Nữ",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100010",
  'children'=> [
    [
      'id'=> 100011,
      'name'=> "Của Nam Giới",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100011",
      'children'=> [],
    ],
    [
      'id'=> 100013,
      'name'=> "Ngọn",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100013",
      'children'=> [],
    ],
    [
      'id'=> 100014,
      'name'=> "Đáy",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100014",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100012,
  'name'=> "Giảm Giá Mùa Hè",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100012",
  'children'=> [],
],
[
  'id'=> 100018,
  'name'=> "Thiết Bị Gia Dụng",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100018",
  'children'=> [
    [
      'id'=> 100017,
      'name'=> "Tủ Lạnh Thông Minh",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100017",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100020,
  'name'=> "Mẹ & bé",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100020",
  'children'=> [],
],
[
  'id'=> 100032,
  'name'=> "Khác",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100032",
  'children'=> [
    [
      'id'=> 100033,
      'name'=> "Nhà sách online",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100033",
      'children'=> [],
    ],
    [
      'id'=> 100034,
      'name'=> "Bách hoá online",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100034",
      'children'=> [],
    ],
    [
      'id'=> 100035,
      'name'=> "Sức khoẻ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100035",
      'children'=> [],
    ],
    [
      'id'=> 100036,
      'name'=> "Sắc đẹp",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100036",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100037,
  'name'=> "Nhà cửa & đời sống",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100037",
  'children'=> [],
],
[
  'id'=> 100039,
  'name'=> "Trẻ em",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100039",
  'children'=> [],
],
[
  'id'=> 100040,
  'name'=> "Ô Tô & Xe Máy & Xe Đạp",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100040",
  'children'=> [],
],
[
  'id'=> 100041,
  'name'=> "Thể Thao & Du Lịch",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100041",
  'children'=> [],
],
[
  'id'=> 100003,
  'name'=> "Thời Trang",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100003",
  'children'=> [
    [
      'id'=> 100021,
      'name'=> "Thời trang nam",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100021",
      'children'=> [],
    ],
    [
      'id'=> 100022,
      'name'=> "Thời trang nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100022",
      'children'=> [],
    ],
    [
      'id'=> 100023,
      'name'=> "Giày dép nam",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100023",
      'children'=> [],
    ],
    [
      'id'=> 100024,
      'name'=> "Giày dép nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100024",
      'children'=> [],
    ],
    [
      'id'=> 100025,
      'name'=> "Túi ví nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100025",
      'children'=> [],
    ],
    [
      'id'=> 100030,
      'name'=> "Đồng hồ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100030",
      'children'=> [],
    ],
    [
      'id'=> 100031,
      'name'=> "Phụ kiện & trang sức nữ",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100031",
      'children'=> [],
    ],
    [
      'id'=> 100038,
      'name'=> "Trẻ em",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100038",
      'children'=> [],
    ],
  ],
],
[
  'id'=> 100007,
  'name'=> "Điện Tử Kỹ Thuật Số",
  'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
  'url'=> "http://127.0.0.1:8000/categories/100007",
  'children'=> [
    [
      'id'=> 100002,
      'name'=> "Tai Nghe Máy Tính Bảng",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100002",
      'children'=> [],
    ],
    [
      'id'=> 100004,
      'name'=> "Máy Ảnh",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100004",
      'children'=> [],
    ],
    [
      'id'=> 100026,
      'name'=> "Điện thoại & phụ kiện",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100026",
      'children'=> [],
    ],
    [
      'id'=> 100027,
      'name'=> "Thiết bị điện tử",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100027",
      'children'=> [],
    ],
    [
      'id'=> 100028,
      'name'=> "Máy tính & laptop",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100028",
      'children'=> [],
    ],
    [
      'id'=> 100029,
      'name'=> "Máy ảnh & máy quay phim",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100029",
      'children'=> [
[
      'id'=> 100028,
      'name'=> "Máy tính & laptop",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100028",
      'children'=> [],
    ],
    [
      'id'=> 100029,
      'name'=> "Máy ảnh & máy quay phim",
      'image'=> "http://127.0.0.1:8000/cache/catalog/placeholder-300x300.png",
      'url'=> "http://127.0.0.1:8000/categories/100029",
      'children'=> [

],
    ],
],
    ],
  ],
],
];

      function countChildren($category) {
    return count($category['children']);
}

    usort($categories, function($a, $b) {
    $countA = countChildren($a);
    $countB = countChildren($b);

    // Nếu cả hai đều không có children hoặc cả hai đều có cùng số lượng children
    // thì sắp xếp theo thứ tự tên
    if ($countA == 0 && $countB == 0 || $countA == $countB) {
        return strcmp($a['name'], $b['name']);
    }

    // Phần tử không có children sẽ được sắp xếp lên trước
    return $countA > $countB ? -1 : 1;
});


    function renderCategory($category) {
    echo '<div>';
    echo '<a href="'.$category['url'].'"><p class="mb-0"><strong class="text-uppercase">' . $category['name'] . '</strong></p></a>';
    echo '<div class="d-flex flex-wrap gap-1 text-xs">';
    foreach ($category['children'] as $child) {
        echo '<a href="'.$child['url'].'" class="category-link">' . $child['name'] . '</a>';
        if (!empty($child['children'])) {
            renderCategory($child);
        }
    }
    echo '</div>';
    echo '</div>';
}
    ?>
    <!-- <div>
      <div class="my-4 text-lg"><h5 class="fw-medium text-uppercase"><?php echo e(__('shop/common.categories')); ?></h5></div>
      <div class="">

        <div class="row">
        <?php

        if (isset($footer_content['categories']) && is_array($footer_content['categories'])){
           usort($footer_content['categories'], function($a, $b) {
                $countA = countChildren($a);
                $countB = countChildren($b);

                // Nếu cả hai đều không có children hoặc cả hai đều có cùng số lượng children
                // thì sắp xếp theo thứ tự tên
                if ($countA == 0 && $countB == 0 || $countA == $countB) {
                    return strcmp($a['name'], $b['name']);
                }

                // Phần tử không có children sẽ được sắp xếp lên trước
                return $countA > $countB ? 1 : -1;
              });
        }
        ?>
            <?php if(isset($footer_content['categories']) && is_array($footer_content['categories'])&&count($footer_content['categories'])>0): ?>
            <?php $__currentLoopData = $footer_content['categories']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="col-12 col-sm-6 col-md-4 col-xl-3 mb-2">
                <?php renderCategory($category) ?>
              </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
          </div> -->

    <div class="footer-content">
      <div class="row">
        <div class="col-12 col-md-3 me-lg-5">
          <div class="footer-content-left footer-link-wrap">
            <h6 class="text-uppercase text-dark intro-title"><?php echo e(__('shop/common.company_profile')); ?><span class="icon-open"><i class="bi bi-plus-lg"></i></span></h6>
            <div class="intro-wrap">
              <?php if($footer_content['content']['intro']['logo'] ?? false): ?>
                <div class="logo"><a href="<?php echo e(shop_route('home.index')); ?>"><img src="<?php echo e(image_origin($footer_content['content']['intro']['logo'])); ?>" class="img-fluid"></a></div>
              <?php endif; ?>
              <div class="text tinymce-format-p"><?php echo $footer_content['content']['intro']['text'][locale()] ?? ''; ?></div>
              <div class="social-network">
                <?php $__currentLoopData = $footer_content['content']['intro']['social_network'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($item['link']); ?>" target="_blank"><img src="<?php echo e(image_origin($item['image'])); ?>" class="img-fluid"></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>
        <?php $__currentLoopData = $footer_content['content']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <?php if(strpos($key, 'link') === 0 && !empty($link)): ?>
    <div class="col-12 col-md footer-content-<?php echo e($key); ?> footer-link-wrap">
      <h6 class="text-uppercase text-dark">
        <?php echo e($link['title'][locale()] ?? ''); ?>

        <span class="icon-open"><i class="bi bi-plus-lg"></i></span>
      </h6>

      <?php if(!empty($link['links'])): ?>
        <ul class="list-unstyled">
          <?php $__currentLoopData = $link['links']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($item['link'])): ?>
              <li class="lh-lg mb-2">
                <a href="<?php echo e($item['link']); ?>" 
                   <?php if(!empty($item['new_window'])): ?> target="_blank" <?php endif; ?>>
                  <?php echo e($item['text'] ?? ''); ?>

                </a>
              </li>
            <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      <?php endif; ?>
    </div>
  <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.contact.before",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
         <?php
                    $__hook_name="footer.contact";
                    ob_start();
                ?>
        <div class="col-12 col-md-3 footer-content-contact footer-link-wrap">
          <h6 class="text-uppercase text-dark"><?php echo e(__('common.contact_us')); ?><span class="icon-open"><i class="bi bi-plus-lg"></i></span> </h6>
          <ul class="list-unstyled">
            <?php if($footer_content['content']['contact']['email']): ?>
              <li class="lh-lg mb-2"><i class="bi bi-envelope-fill"></i> <?php echo e($footer_content['content']['contact']['email']); ?></li>
            <?php endif; ?>
            <?php if($footer_content['content']['contact']['telephone']): ?>
              <li class="lh-lg mb-2"><i class="bi bi-telephone-fill"></i> <?php echo e($footer_content['content']['contact']['telephone']); ?></li>
            <?php endif; ?>
            <?php if($footer_content['content']['contact']['address'][locale()] ?? ''): ?>
              <li class="lh-lg mb-2"><i class="bi bi-geo-alt-fill"></i> <?php echo e($footer_content['content']['contact']['address'][locale()] ?? ''); ?></li>
            <?php endif; ?>
          </ul>
        </div>
         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>
         <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.contact.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
      </div>
    </div>
  </div>

   <?php
                    $__hook_name="footer.copyright";
                    ob_start();
                ?>
  <div class="footer-bottom">
    <div class="container">
      <div class="row align-items-center">
        <div class="col">
          <div class="d-flex flex-wrap">


            <?php echo $footer_content['bottom']['copyright'][locale()] ?? ''; ?>

          </div>
        </div>
        <?php if(isset($footer_content['bottom']['image']) && $footer_content['bottom']['image']): ?>
          <div class="col-auto right-img py-md-2">
            <img src="<?php echo e(image_origin($footer_content['bottom']['image'])); ?>" class="img-fluid">
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                $__hook_content = ob_get_clean();
                $output = \Hook::getWrapper("$__hook_name",["data"=>$__definedVars],function($data) { return null; },$__hook_content);
                unset($__hook_name);
                unset($__hook_content);
                if ($output)
                echo $output;
                ?>

   <?php
                $__definedVars = (get_defined_vars()["__data"]);
                if (empty($__definedVars))
                {
                    $__definedVars = [];
                }
                
                $output = \Hook::getHook("footer.after",["data"=>$__definedVars],function($data) { return null; });
                if ($output)
                echo $output;
                ?>
</footer>
<?php /**PATH G:\workspace\new\themes\default/layout/footer.blade.php ENDPATH**/ ?>