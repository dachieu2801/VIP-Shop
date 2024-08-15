<template id="module-editor-icons-template">
  <div class="image-edit-wrapper">
    <div class="module-editor-row"><?php echo e(__('admin/builder.text_set_up')); ?></div>
    <div class="module-edit-group" style="margin-bottom: 200px;">
      <div class="module-edit-title"><?php echo e(__('admin/builder.text_add_pictures')); ?></div>
      <div class="pb-images-selector" v-for="(item, index) in form.images" :key="index">
        <div class="selector-head" @click="itemShow(index)">
          <div class="left">

            <img :src="thumbnail(item.image, 40, 40)" class="img-responsive">
          </div>

          <div class="right">
            <span @click="removeItem(index)" class="remove-item"><i class="el-icon-delete"></i></span>
            <i :class="'el-icon-arrow-'+(item.show ? 'up' : 'down')"></i>
          </div>
        </div>
        <div :class="'pb-images-list ' + (item.show ? 'active' : '')">
          <div class="pb-images-top">
            <pb-image-selector v-model="item.image" :is-language="false"></pb-image-selector>
            <div class="tag"><?php echo e(__('admin/builder.text_suggested_size')); ?>: 200x200</div>
          </div>
          <div class="module-edit-title"><?php echo e(__('admin/builder.text_set_title')); ?></div>
          <text-i18n v-model="item.text" style="margin-bottom: 10px"></text-i18n>
          <link-selector :hide-types="['page_category', 'static']" v-model="item.link"></link-selector>
        </div>
      </div>
      <div class="add-items" style="margin-top: 20px">
        <el-button icon="el-icon-circle-plus-outline" type="primary" size="small" style="width: 100%" @click="addItems" plain><?php echo e(__('common.add')); ?></el-button>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
Vue.component('module-editor-icons', {
  template: '#module-editor-icons-template',

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
    itemShow(index) {
      this.form.images.find((e, key) => {if (index != key) return e.show = false});
      this.form.images[index].show = !this.form.images[index].show;
    },

    addItems() {
      this.form.images.push({
        image: '',
        link: {
          type: 'product',
          value:''
        },
        text: languagesFill(''),
        show: true
      })

      this.form.images.find((e, key) => {if (this.form.images.length - 1 != key) return e.show = false});
    },

    removeItem(index) {
      this.form.images.splice(index, 1);
    }
  }
});

</script>

<?php $__env->startPush('footer'); ?>
  <script>
    app.source.modules.push({
      title: '<?php echo e(__('admin/app_builder.module_icons')); ?>',
      code: 'icons',
      icon: '&#xe60e;',
      content: {
        style: {
          background_color: ''
        },
        floor: languagesFill(''),
        images: []
      }
    })
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/design/builder/app_component/icons.blade.php ENDPATH**/ ?>