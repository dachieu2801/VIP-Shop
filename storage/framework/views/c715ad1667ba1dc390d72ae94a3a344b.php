<template id="module-editor-bestseller-template">
  <div class="image-edit-wrapper">
    <div class="module-editor-row"><?php echo e(__('admin/builder.text_set_up')); ?></div>
    <div class="module-edit-group">
      <div class="module-edit-title"><?php echo e(__('admin/builder.text_module_title')); ?></div>
      <text-i18n v-model="module.title"></text-i18n>
    </div>
    <div class="module-edit-group">
      <div class="module-edit-title"><?php echo e(__('Bestseller::common.limit')); ?></div>
      <el-input type="number" v-model="module.limit" size="small"></el-input>
    </div>
  </div>
</template>

<script type="text/javascript">
Vue.component('module-editor-bestseller', {
  template: '#module-editor-bestseller-template',

  props: ['module'],

  data: function () {
    return {
      //
    }
  },

  watch: {
    module: {
      handler: function (val) {
        this.$emit('on-changed', val);
      },
      deep: true
    }
  },
});
</script>


<?php $__env->startPush('footer-script'); ?>
  <script>
    register = <?php echo json_encode($register, 15, 512) ?>;

    register.make = {
      style: {
        background_color: ''
      },
      title: languagesFill('<?php echo e(__('admin/builder.text_module_title')); ?>'),
      limit: 8,
    }

    app.source.modules.push(register)
  </script>
<?php $__env->stopPush(); ?>

<?php /**PATH G:\workspace\new\plugins/Bestseller/Views/admin/design_module_bestseller.blade.php ENDPATH**/ ?>