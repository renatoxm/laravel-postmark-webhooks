<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Path
    |--------------------------------------------------------------------------
    |
    | This is the URI path where Postmark can post webhooks to.
    | Change this path to anything you like.
    |
    */

    'path' => '/api/webhooks/postmark',

    /*
    |--------------------------------------------------------------------------
    | Log Options
    |--------------------------------------------------------------------------
    |
    | Logging events to the database is enabled by default. You may set this
    | to false if you don't want to log the Postmark events to the database.
    |
    | You may specify one or more event types to be excluded from being
    | logged to the database. You can place them under the except key.
    |
    | Supported event types: "open", "bounce", "click",
    | "delivery", "spam_complaint"
    |
    */

    'log' => [
        'enabled' => env('POSTMARK_WEBHOOKS_LOG_ENABLED', true),
        'model' => \RenatoXM\PostmarkWebhooks\PostmarkWebhook::class,
        'table_name' => 'postmark_webhook_logs',

        'except' => [
            //
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Event Mapping
    |--------------------------------------------------------------------------
    |
    | This option allows you to map Postmark webhook
    | events to your own object-based events.
    |
    */

    'events' => [
        //
    ],

];
