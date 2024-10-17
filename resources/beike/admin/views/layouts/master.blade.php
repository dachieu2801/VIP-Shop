<!DOCTYPE html>
<html lang="{{ admin_locale() }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <base href="{{ $admin_base_url }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="asset" content="{{ asset('/') }}">
  <meta name="editor_language" content="{{ locale() }}">
  <script src="{{ asset('vendor/vue/2.7/vue' . (!config('app.debug') ? '.min' : '') . '.js') }}"></script>
  <script src="{{ asset('vendor/element-ui/index.js') }}"></script>
  <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('vendor/layer/3.5.1/layer.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/cookie/js.cookie.min.js') }}"></script>
  <link href="{{ mix('/build/beike/admin/css/bootstrap.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('vendor/element-ui/index.css') }}">
  @if (locale() != 'zh_cn')
    <script src="{{ asset('vendor/element-ui/language/' . locale() . '.js') }}"></script>
  @endif
  <link rel="shortcut icon" href="{{ image_origin(system_setting('base.favicon')) }}">
  <link href="{{ mix('build/beike/admin/css/app.css') }}" rel="stylesheet">
  <script src="{{ mix('build/beike/admin/js/app.js') }}"></script>
  <title>BeikeShop - @yield('title')</title>
  @stack('header')
  {{-- <x-analytics /> --}}
  <script>
    const $languages = @json(locales());
    const $locale = '{{ locale() }}';
  </script>
</head>

<body class="@yield('body-class') {{ admin_locale() }}">
  <x-admin-header />

  <div class="main-content">
    <x-admin-sidebar />
    <div id="content">
      <div class="page-title-box py-1 d-flex align-items-center justify-content-between">
        <div class="d-flex">
          <h5  class="page-title">
              <svg style="height: 16px; color:#ee4d2d"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><<path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
              @yield('title')
           </h5>
          <div class="ms-4 text-danger">@yield('page-title-after')</div>
        </div>
        <div class="text-nowrap">@yield('page-title-right')</div>
      </div>
      <div class="container-fluid p-0">
        <div class="content-info">@yield('content')</div>
        <div class="page-bottom-btns">
          @yield('page-bottom-btns')
        </div>
      </div>
    </div>
  </div>

  <script>
    @if (locale() != 'zh_cn')
      ELEMENT.locale(ELEMENT.lang['{{ locale() }}'])
    @endif
    const lang = {
      file_manager: '{{ __('admin/file_manager.file_manager') }}',
      error_form: '{{ __('common.error_form') }}',
      text_hint: '{{ __('common.text_hint') }}',
      translate_form: '{{ __('admin/common.translate_form') }}',
    }

    const config = {
      beike_version: '{{ config('beike.version') }}',
      api_url: '{{ beike_api_url() }}',
      app_url: '{{ config('app.url') }}',
      has_license: {{ json_encode(check_license()) }},
      has_license_code: '{{ system_setting("base.license_code", "") }}',
    }

    function languagesFill(text) {
      var obj = {};
      $languages.map(e => {
        obj[e.code] = text
      })
      return obj;
    }
  </script>
  @stack('footer')
</body>
</html>
