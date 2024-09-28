
<section class="module-item <?php echo e($design ? 'module-item-design' : ''); ?>" id="module-<?php echo e($module_id); ?>">
  <?php echo $__env->make('design._partial._module_tool', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <div class="module-info mb-3 mb-md-5">
    <div class="position-relative">
      <div class="d-flex justify-content-between align-items-center">
        <!-- Icon di chuyển sang trái -->
        <div class="icon-move-left bg-transparent wh-50 d-flex justify-content-center align-items-center rounded-5 shadow-sm fs-3">
              <i  class="bi bi-chevron-left"></i>
        </div>

        <!-- Nội dung module -->
        <div class="container" style="width: auto">
          <?php if($content['title']): ?>
            <div class="module-title-category" style="padding: 15px 0px; font-size: 21px"><?php echo e($content['title']); ?></div>
          <?php endif; ?>
          <div class="grid-container">
        <?php $__currentLoopData = $content['images']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class=" border">
                <a href="<?php echo e($image['url'] ?: 'javascript:void(0)'); ?>" class="text-decoration-none">
                    <div class="image-item d-flex justify-content-center mb-3">
                        <img src="<?php echo e($image['image']); ?>" style="max-width: 80px" class="img-fluid">
                    </div>
                    <?php if($image['text']): ?>
                        <div class="w-48 h-14" style="width: auto; height: 50px;">
                            <p class="text-center text-dark mb-2 mt-2 fs-5"><?php echo e($image['text']); ?></p>
                        </div>
                    <?php endif; ?>
                    <?php if($image['sub_text']): ?>
                        <div class="w-48 h-14" style="width: auto; height: 50px;">
                            <p class="text-center text-secondary my-2"><?php echo e($image['sub_text']); ?></p>
                        </div>
                    <?php endif; ?>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
        </div>

        <!-- Icon di chuyển sang phải -->
        <div class="icon-move-right bg-transparent  wh-50 d-flex justify-content-center align-items-center rounded-5 shadow-sm fs-3">
            <i class="bi bi-chevron-right"></i>
        </div>
      </div>
    </div>
  </div>

  <style>

    .grid-container {
        display: grid;
        grid-template-columns: repeat(6, 1fr); /* 6 cột có kích thước bằng nhau */
        gap: 8px; /* Khoảng cách giữa các cột */
    }

    .grid-container .border {
        margin: 0; /* Xóa margin để tránh khoảng trống dư thừa */
    }

    @media (max-width: 576px) {
        .grid-container {
            grid-template-columns: repeat(2, 1fr); /* 2 cột cho màn hình nhỏ hơn hoặc bằng 576px */
        }
        .icon-move-right {
          position: absolute;
          top: 55%;
          right: 0.5%;
        }
        .icon-move-left {
          position: absolute;
          top: 55%;
          left: 0.5%;
        }
    }

    @media (min-width: 576px) and (max-width: 992px) {
        .grid-container {
            grid-template-columns: repeat(3, 1fr); /* 3 cột cho màn hình từ 576px đến 992px */
        }
        .icon-move-right {
          position: absolute;
          top: 53%;
          right: 11.1%;
        }
        .icon-move-left {
          position: absolute;
          top: 53%;
          left: 11.1%;
        }
    }

    @media (min-width: 992px) and (max-width: 1200px) {
        .grid-container {
            grid-template-columns: repeat(4, 1fr); /* 4 cột cho màn hình từ 992px đến 1200px */
        }
        .icon-move-right {
          position: absolute;
          top: 55%;
          right: 6.1%;
        }
        .icon-move-left {
          position: absolute;
          top: 55%;
          left: 6.1%;
        }
    }

    @media (min-width: 1200px) {
        .grid-container {
            grid-template-columns: repeat(6, 1fr); /* 6 cột cho màn hình lớn hơn 1200px */
        }
        .icon-move-right {
          position: absolute;
          top: 55%;
          right: 6.1%;
        }
        .icon-move-left {
          position: absolute;
          top: 55%;
          left: 6.1%;
        }
    }

    /* CSS cho border */
    .border {
        border: 1px solid #dbdbdb;
        border-radius: 8px;
        padding: 10px;
        transition: all 0.3s ease;

    }
    .border:hover {
      transform: scale(1.05);
      box-sizing: border-box;
    -webkit-box-shadow: 3px 0px 24px -1px rgba(219,216,219,1);
    -moz-box-shadow: 3px 0px 24px -1px rgba(219,216,219,1);
    box-shadow: 3px 0px 24px -1px rgba(219,216,219,1);
    }

    /* CSS cho icon di chuyển */
    .icon-move-left,
    .icon-move-right {
        width: 40px;
        height: 40px;
        background-color: #f8f9fa;
        border: 1px solid #ced4da;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .icon-move-left:hover,
    .icon-move-right:hover {
        background-color: #e9ecef;
        transform: scale(1.2);
    }

    /* CSS cho module title */
    .module-title-category {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    /* CSS cho image item */
    .image-item {
        margin-bottom: 20px;
    }

    .image-item img {
        max-width: 100%; /* Chỉnh sửa max-width */
        height: auto;
        transition: transform 0.3s ease;
    }

    /* CSS cho text trong module */
    .module-text {
        font-size: 18px;
        margin-top: 10px;
    }

    .border.move-left,
    .border.move-right {
        transform: translateX(0);
    }

    .border.move-left {
        transform: translateX(-100%);
    }

    .border.move-right {
        transform: translateX(100%);
    }
  </style>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var currentIndex = 0;
      var totalProducts = document.querySelectorAll('.border').length;
      var products = document.querySelectorAll('.border');
      var moveLeftIcon = document.querySelector('.icon-move-left');
      var moveRightIcon = document.querySelector('.icon-move-right');
      var visibleProducts = determineVisibleProducts(); // Khởi tạo số lượng sản phẩm hiển thị ban đầu

      function determineVisibleProducts() {
        return window.innerWidth < 576 ? 4 : 12;
      }

      function moveProducts(direction) {
        if (direction === 'left' && currentIndex > 0) {
          currentIndex--;
        } else if (direction === 'right' && currentIndex < Math.ceil(totalProducts / visibleProducts) - 1) {
          currentIndex++;
        }

        // Hiển thị các sản phẩm ứng với vị trí hiện tại
        for (let i = 0; i < totalProducts; i++) {
          if (i >= currentIndex * visibleProducts && i < (currentIndex + 1) * visibleProducts) {
            products[i].style.display = 'block';
          } else {
            products[i].style.display = 'none';
          }
        }
        // Ẩn hiện nút di chuyển khi đã hết sản phẩm cần hiển thị
        if (currentIndex === 0) {
            moveLeftIcon.style.display = 'none';
        } else {
            moveLeftIcon.style.display = 'block';
        }

        if (currentIndex === Math.ceil(totalProducts / visibleProducts) - 1) {
            moveRightIcon.style.display = 'none';
        } else {
            moveRightIcon.style.display = 'block';
        }
      }

      function handleResize() {
        var newVisibleProducts = determineVisibleProducts();

        if (newVisibleProducts !== visibleProducts) {
          visibleProducts = newVisibleProducts;
          currentIndex = 0; // Reset lại chỉ số trang khi số lượng sản phẩm hiển thị thay đổi
          moveProducts('right'); // Hiển thị lại số lượng sản phẩm mới
        }
        // Ẩn hiện nút di chuyển khi đã hết sản phẩm cần hiển thị
        if (currentIndex === 0) {
            moveLeftIcon.style.display = 'none';
        } else {
            moveLeftIcon.style.display = 'block';
        }

        if (currentIndex === Math.ceil(totalProducts / visibleProducts) - 1) {
            moveRightIcon.style.display = 'none';
        } else {
            moveRightIcon.style.display = 'block';
        }
      }

      // Bắt sự kiện click cho nút di chuyển sang trái và sang phải
      if (moveLeftIcon && moveRightIcon) {
        moveLeftIcon.addEventListener('click', function() {
          moveProducts('left');
        });

        moveRightIcon.addEventListener('click', function() {
          moveProducts('right');
        });
      } else {
        console.error('Không thể tìm thấy phần tử HTML với lớp .icon-move-left hoặc .icon-move-right');
      }

      // Bắt sự kiện resize để cập nhật số lượng sản phẩm hiển thị khi kích thước màn hình thay đổi
      window.addEventListener('resize', function() {
        handleResize(); // Xử lý sự kiện thay đổi kích thước màn hình
      });

      // Hiển thị số lượng sản phẩm ban đầu
      moveProducts('left');
    });

  </script>

</section>
<?php /**PATH G:\workspace\new\themes\default/design/icons.blade.php ENDPATH**/ ?>