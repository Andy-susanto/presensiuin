<?php

return [
    'includes' => [
        App\Filament\Resources\PermissionResource::class,
        App\Filament\Resources\UserResource::class,
        App\Filament\Resources\Shield\RoleResource::class,
        // App\Filament\Resources\Blog\AuthorResource::class,
    ],
    'excludes' => [
        // App\Filament\Resources\Blog\AuthorResource::class,
    ],
    'should_convert_count' => true,
    'enable_convert_tooltip' => true,
];
