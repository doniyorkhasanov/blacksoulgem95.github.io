<?php

use Illuminate\Support\Str;

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Sofia Vicedomini - The Italian Programmer',
    'siteDescription' => 'My name is Sofia, grown between Italy and Scotland and learnt the hard way the art of coding. For me to code is not just a job, is a full time passion.',
    'siteAuthor' => 'Sofia Vicedomini',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Sofia Vicedomini', // Default author, if not provided in a post
            'sort' => '-date',
            'path' => '{date|Y/m/d}/{-title}',
        ],
        'categories' => [
            'path' => '/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
        'testimonials' => [
            'path' => '/testimonial/{-company}/{-name}',
            'sort' => '-name'
        ],
        'projects' => [
            'path' => '/project/{-name}',
            'sort' => '-date'
        ],
        'socials' => [
            'sort' => 'order'
        ],
        'redirects',
        'products' => [
            'sort' => '-date',
            'path' => 'shop/products/{-title}'
            ],

        'shopcategories' => [
            'sort' => '-date',
            'path' => 'shop/collections/{-title}',
            'products' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            }
        ],

    ],

    // helpers
    'getDate' => function ($page) {
        return Datetime::createFromFormat('U', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
