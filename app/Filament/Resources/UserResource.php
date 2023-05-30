<?php

namespace App\Filament\Resources;

use Phpsa\FilamentAuthentication\Resources\UserResource as phpsaUserResource;

class UserResource extends phpsaUserResource
{
    protected static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }
}
