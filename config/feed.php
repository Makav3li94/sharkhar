<?php

return [
    'feeds' => [
        'blogs' => [
            /*
             * Here you can specify which class and method will return
             * the items that should appear in the feed. For example:
             * 'App\Model@getAllFeedItems'
             *
             * You can also pass an argument to that method:
             * ['App\Model@getAllFeedItems', 'argument']
             */
            'items' => 'App\Models\Blog@getFeedItems',

            /*
             * The feed will be available on this url.
             */
            'url' => '/blogs.rss',

            'title' => 'Sharkhar blogs',
            'description' => 'this are the feeds for sharkhar blogs',
            'language' => 'fa-IR',

            /*
             * The view that will render the feed.
             */
            'view' => 'feed::atom',

            /*
             * The type to be used in the <link> tag
             */
            'type' => 'application/atom+xml',
        ],

        'vendors' => [
	        /*
			 * Here you can specify which class and method will return
			 * the items that should appear in the feed. For example:
			 * 'App\Model@getAllFeedItems'
			 *
			 * You can also pass an argument to that method:
			 * ['App\Model@getAllFeedItems', 'argument']
			 */
	        'items' => 'App\Models\Seller@getFeedItems',

	        /*
			 * The feed will be available on this url.
			 */
	        'url' => '/vendors.rss',

	        'title' => 'Sharkhar Vendors',
	        'description' => 'this are the feeds for sharkhar Vendors',
	        'language' => 'fa-IR',

	        /*
			 * The view that will render the feed.
			 */
	        'view' => 'feed::atom',

	        /*
			 * The type to be used in the <link> tag
			 */
	        'type' => 'application/atom+xml',
        ],

        'products' => [
	        /*
			 * Here you can specify which class and method will return
			 * the items that should appear in the feed. For example:
			 * 'App\Model@getAllFeedItems'
			 *
			 * You can also pass an argument to that method:
			 * ['App\Model@getAllFeedItems', 'argument']
			 */
	        'items' => 'App\Models\Product@getFeedItems',

	        /*
			 * The feed will be available on this url.
			 */
	        'url' => '/products.rss',

	        'title' => 'Sharkhar Products',
	        'description' => 'this are the feeds for sharkhar products',
	        'language' => 'fa-IR',

	        /*
			 * The view that will render the feed.
			 */
	        'view' => 'feed::atom',

	        /*
			 * The type to be used in the <link> tag
			 */
	        'type' => 'application/atom+xml',
        ],
    ],
];
