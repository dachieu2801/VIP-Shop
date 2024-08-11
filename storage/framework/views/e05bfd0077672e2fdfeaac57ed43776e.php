<template id="module-editor-rich-text-template">
  <div class="image-edit-wrapper">
    <div class="module-editor-row"><?php echo e(__('admin/builder.text_set_up')); ?></div>
    <div class="module-edit-group">
      <div class="module-edit-title"><?php echo e(__('admin/builder.modules_content')); ?></div>
      <rich-text-i18n v-model="form.text"></rich-text-i18n>
    </div>
  </div>
</template>

<script type="text/javascript">
Vue.component('module-editor-rich-text', {
  template: '#module-editor-rich-text-template',

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
      text: {}
    }

    app.source.modules.push(register)
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/design/module/rich_text.blade.php ENDPATH**/ ?>