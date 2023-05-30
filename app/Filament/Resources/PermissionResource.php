<?php

namespace App\Filament\Resources;

use Phpsa\FilamentAuthentication\Resources\PermissionResource as phpsaPermission;

class PermissionResource extends phpsaPermission
{
    protected static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }
}
