<template id="module-editor-image100-template">
  <div class="image-edit-wrapper">
    <div class="module-editor-row">Cài đặt</div>
    <div class="module-edit-group">
      <div class="module-edit-title">Có để toàn màn hình không</div>
      <el-switch v-model="form.full"></el-switch>
    </div>
    <div class="module-editor-row">nội dung</div>
    <div class="module-edit-group">
      <div class="module-edit-title">Chọn ảnh</div>
      <div class="">
        <div class="pb-images-top">
          <pb-image-selector v-model="form.images[0].image"></pb-image-selector>
          <div class="tag">Kích thước đề xuất: 1920 x 500</div>
        </div>
        <link-selector v-model="form.images[0].link"></link-selector>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
  Vue.component('module-editor-image100', {
    template: '#module-editor-image100-template',

    props: ['module'],

    data: function () {
      return {
        form: null
      }
    },

    watch: {
      form: {
        handler: function (val) {
          this.$emit('on-changed', val);
        },
        deep: true
      }
    },

    created: function () {
      this.form = JSON.parse(JSON.stringify(this.module));
    },

    methods: {

    }
  });
</script>

<?php $__env->startPush('footer-script'); ?>
  <script>
    register = <?php echo json_encode($register, 15, 512) ?>;

    // 定义模块的配置项
    register.make = {
      style: {
        background_color: ''
      },
      floor: languagesFill(''),
      full: true,
      images: [
        {
          image: languagesFill('catalog/demo/banner/banner-2-en.png'),
          show: true,
          link: {
            type: 'product',
            value:''
          }
        }
      ]
    }

    app.source.modules.push(register)
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH G:\workspace\new\resources\/beike/admin/views/pages/design/module/image100.blade.php ENDPATH**/ ?>