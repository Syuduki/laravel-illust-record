<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    |
    | フロントエンドのaxiosヘッダー情報と一致するように
    | 【備忘録】
    |  設定はしたのに、CORSになる。原因は以下のどれか
    | 　・レスポンスデータを返していない
    | 　・フロントエンドのヘッダー情報とcors.phpの設定値に差異がある。
    | 　・フロントエンド側で、withCredentials: trueと'X-Requested-With': 'XMLHttpRequest'が無い
    | 　・CSRFトークンの設定をしているにもかかわらず、フロントエンド側で取得する前にAPI飛ばしているパターン（←　今回はこれ原因だった）
    */

    'paths' => ['*'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['http://localhost:3000'],

    'allowed-credentials' => true,

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => false,

    'max_age' => false,

    'supports_credentials' => true,

    /**
     * 'paths' => ['api/*', 'sanctum/csrf-cookie', 'web/*'],

    *'allowed_methods' => ['GET', 'POST', 'PUT'],

    *'allowed_origins' => ['http://localhost:3000/'],

    *'allowed-credentials' => true,

    *'allowed_origins_patterns' => ['*'],

    *'allowed_headers' => ['X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept'],

    *'exposed_headers' => [],

    *'content-type' => ['application/json'],

    *'max_age' => 0,

    *'supports_credentials' => false,
     *
     */

];
