<template id="module-editor-product-template">
  <div class="module-editor-product-template">
    <div class="module-editor-row"><?php echo e(__('admin/builder.text_set_up')); ?></div>
    <div class="module-edit-group">
      <div class="module-edit-title"><?php echo e(__('admin/builder.text_module_title')); ?></div>
      <text-i18n v-model="form.title"></text-i18n>
    </div>

    <div class="module-editor-row"><?php echo e(__('admin/builder.modules_content')); ?></div>
    <div class="module-edit-group">
      <div class="module-edit-title"><?php echo e(__('admin/builder.modules_set_product')); ?></div>
      <div class="tab-info">
        <div class="module-edit-group">
          <div class="autocomplete-group-wrapper">
            <el-autocomplete
              class="inline-input"
              v-model="keyword"
              value-key="name"
              size="small"
              :fetch-suggestions="querySearch"
              placeholder="<?php echo e(__('admin/builder.modules_keywords_search')); ?>"
              :highlight-first-item="true"
              @select="handleSelect"
            ></el-autocomplete>

            <div class="item-group-wrapper" v-loading="loading">
              <template v-if="productData.length">
                <draggable
                  ghost-class="dragabble-ghost"
                  :list="productData"
                  @change="itemChange"
                  :options="{animation: 330}"
                >
                  <div v-for="(item, index) in productData" :key="index" class="item">
                    <div>
                      <i class="el-icon-s-unfold"></i>
                      <span>${item.name}</span>
                    </div>
                    <i class="el-icon-delete right" @click="removeProduct(index)"></i>
                  </div>
                </draggable>
              </template>
              <template v-else><?php echo e(__('admin/builder.modules_please_products')); ?></template>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script type="text/javascript">
Vue.component('module-editor-product', {
  delimiters: ['${', '}'],
  template: '#module-editor-product-template',
  props: ['module'],
  data: function () {
    return {
      keyword: '',
      productData: [],
      loading: null,
      form: null
    }
  },

  watch: {
    form: {
      handler: function (val) {
        this.$emit('on-changed', val);
      },
      deep: true
    },
  },

  created: function () {
    this.form = JSON.parse(JSON.stringify(this.module));
    this.tabsValueProductData();
  },

  computed: {
  },

  methods: {
    tabTitleLanguage(titles) {
      return titles['<?php echo e(locale()); ?>'];
    },

    tabsValueProductData() {
      var that = this;

      if (!this.form.products.length) return;
      this.loading = true;

      $http.get('products/names?product_ids='+this.form.products.join(','), {hload: true}).then((res) => {
        this.loading = false;
        that.productData = res.data;
      })
    },

    querySearch(keyword, cb) {
      $http.get('products/autocomplete?name=' + encodeURIComponent(keyword), null, {hload:true}).then((res) => {
        cb(res.data);
      })
    },

    handleSelect(item) {
      if (!this.form.products.find(v => v == item.id)) {
        this.form.products.push(item.id * 1);
        this.productData.push(item);
      }
      this.keyword = ""
    },

    itemChange(evt) {
      this.form.products = this.productData.map(e => e.id * 1);
    },

    removeProduct(index) {
      this.productData.splice(index, 1)
      this.form.products.splice(index, 1);
    },
  }
});
</script>

<?php $__env->startPush('footer-script'); ?>
  <script>
    register = <?php echo json_encode($register, 15, 512) ?>;

    register.make = {
      style: {
        background_color: ''
      },
      floor: languagesFill(''),
      products: [],
      title: languagesFill('<?php echo e(__('admin/builder.text_module_title')); ?>'),
    };

    app.source.modules.push(register)
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH G:\workspace\shop-freelance\resources\/beike/admin/views/pages/design/module/product.blade.php ENDPATH**/ ?>