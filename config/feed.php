<?php

return [

    'feeds' => [
        'adWordsXml' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feeds/adwords_catalog.xml',
            'title' => 'AdWords catalog',
            'view' => 'feed::feed',
            'headers' => [
                'Content-Type' => 'application/xml;charset=UTF-8',
            ]
        ],
        'adWordsCsv' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',
            /*
             * The feed will be available on this url.
             */
            'url' => '/feeds/adwords_catalog.csv',
            'title' => 'AdWords catalog',
            'view' => 'feed::feed_csv',
            'headers' => [
                'Content-Type' => 'text/csv',
            ]
        ],
        'fbXml' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/feeds/fb_catalog.xml',
            'title' => 'Facebook catalog',
            'view' => 'feed::fb_feed',
            'headers' => [
                'Content-Type' => 'application/xml;charset=UTF-8',
            ]
        ],
        'fbCsv' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Post@getFeedItems',
            /*
             * The feed will be available on this url.
             */
            'url' => '/feeds/fb_catalog.csv',
            'title' => 'Facebook catalog',
            'view' => 'feed::fb_feed_csv',
            'headers' => [
                'Content-Type' => 'text/csv',
            ]
        ],
    ],

];
