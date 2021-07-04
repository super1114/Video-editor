<?php

return [
    "binaries" => [
        "path" => [
            "ffmpeg" => env("FFMPEG_PATH"),
            "ffprobe" => env("FFPROBE_PATH"),
            "timeout" => env("FFMPEG_TIMEOUT"),
            "threads" => env("FFMPEG_THREADS"),

        ],
        "enabled" => true
    ],
    'watermark' => [
        'image' => [
            'enabled' => env('WATERMARK_IMAGE', true),
            'path'    => env('WATERMARK_PATH', 'http://voluntarydba.com/pics/YouTube%20Play%20Button%20Overlay.png'),
        ],
        'video' => [
            'enabled' => env('WATERMARK_VIDEO', false),
            'path'    => env('WATERMARK_PATH', ''),
        ],
    ],
    "dimensions" => [
        "width" => env("THUMBNAIL_IMAGE_WIDTH"),
        "height" => env("THUMBNAIL_IMAGE_HEIGHT"),
    ]
];
