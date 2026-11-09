<?php

return [
    'cloud_url' => env('CLOUDINARY_URL', 'cloudinary://921354557797716:u0-PO-GmmsogtrPlooPhpsOgG8A@oi4k7nlh'),

    'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'),

    'cloud_name' => env('CLOUDINARY_CLOUD_NAME', 'oi4k7nlh'),
    'api_key'    => env('CLOUDINARY_API_KEY', '921354557797716'),
    'api_secret' => env('CLOUDINARY_API_SECRET', 'u0-PO-GmmsogtrPlooPhpsOgG8A'),

    'notification_url' => env('CLOUDINARY_NOTIFICATION_URL'),

    'analytics' => env('CLOUDINARY_ANALYTICS', true),
];