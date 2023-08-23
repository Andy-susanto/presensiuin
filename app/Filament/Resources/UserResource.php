<?php

namespace App\Filament\Resources;

use App\Models\User;
use Phpsa\FilamentAuthentication\Resources\UserResource as phpsaUserResource;
use Filament\Resources\Table;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Phpsa\FilamentAuthentication\Actions\ImpersonateLink;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class UserResource extends phpsaUserResource
{
    protected static function getNavigationGroup(): ?string
    {
        return 'Settings';
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->sortable()
                    ->label(strval(__('filament-authentication::filament-authentication.field.id')))
                    ->searchable(),
                TextColumn::make('pegawai.nama_lengkap')
                    ->searchable()
                    ->sortable()
                    ->label(strval(__('filament-authentication::filament-authentication.field.employee'))),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->description(fn (User $record): string => $record->getRawOriginal('name'), 'above')
                    ->label(strval(__('filament-authentication::filament-authentication.field.user.name'))),
                TextColumn::make('email')
                    ->searchable()
                    ->sortable()
                    ->label(strval(__('filament-authentication::filament-authentication.field.user.email'))),
                IconColumn::make('email_verified_at')
                    ->options([
                        'heroicon-o-check-circle',
                        'heroicon-o-x-circle' => fn ($state): bool => $state === null,
                    ])
                    ->colors([
                        'success',
                        'danger' => fn ($state): bool => $state === null,
                    ])
                    ->label(strval(__('filament-authentication::filament-authentication.field.user.verified_at'))),
                TagsColumn::make('roles.name')
                    ->label(strval(__('filament-authentication::filament-authentication.field.user.roles'))),
                TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i:s')
                    ->label(strval(__('filament-authentication::filament-authentication.field.user.created_at'))),
            ])
            ->filters([
                TernaryFilter::make('email_verified_at')
                    ->label(strval(__('filament-authentication::filament-authentication.filter.verified')))
                    ->nullable(),
            ])

            ->bulkActions([
                ExportBulkAction::make(),
                DeleteBulkAction::make()
            ])

            ->prependActions([
                ImpersonateLink::make(),
            ]);
    }
}
