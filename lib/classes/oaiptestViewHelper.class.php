<?php

class oaiptestViewHelper extends waViewHelper {

  const APP_ID = 'oaiptest';

  public static function getAppPath($path = '')
  {
    return wa()->getAppPath($path, self::APP_ID);
  }

  public static function getAppUrl($path = '')
  {
    return wa()->getAppUrl(self::APP_ID) . $path;
  }

  public static function getBackendApiUrl($path = '')
  {
    return '/' . wa()->getConfig()->getBackendUrl() . '/' . self::APP_ID . $path;
  }

  public static function getConfigOption($key)
  {
    return wa(self::APP_ID)->getConfig()->getOption($key);
  }

  // To be consistent and have the same settings object for all applications,
  // we need to have one place where we can configure this object.
  // This is for frontend apps.
  public static function getSettingsScript()
  {
    $backendApiUrlPrefix = oaiptestHelper::getConfigOption('backendApiUrlPrefix');

    $backend_api_url = $backendApiUrlPrefix . self::getBackendApiUrl();
    $backend_app_static_url = $backendApiUrlPrefix . substr(wa(self::APP_ID)->getAppStaticUrl(self::APP_ID), 0, -1);

    return <<<EOF
    <script>
      (function openaiConfigInit(window) {
        var config = {
          backendApiUrl: '{$backend_api_url}',
          backendAppStaticUrl: '{$backend_app_static_url}'
        }
        if (window.oaiptest) {
          window.oaiptest.backendApiUrl = config.backendApiUrl;
          window.oaiptest.backendAppPath = config.backendAppPath;
        } else {
          window.oaiptest = config;
        }
      })(window);
    </script>
EOF;
  }
  public static function appVersion($app_id = self::APP_ID)
  {
    return wa()->getAppInfo($app_id)['version'];
  }


}
