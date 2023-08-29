<?php

namespace App\Filament\Resources;

use stdClass;
use App\Models\User;
use Filament\Resources\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TagsColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\SelectFilter;
use Phpsa\FilamentAuthentication\Actions\ImpersonateLink;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Phpsa\FilamentAuthentication\Resources\UserResource as phpsaUserResource;

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
                    ->label('Username')
                    ->formatStateUsing(fn ($record): string => $record->getRawOriginal('name'))
                    ->description(fn (User $record): string => $record->name, 'above'),
                TextColumn::make('pw')
                    ->label('Password Default')
                    ->formatStateUsing(fn ($record): string => $record->getRawOriginal('name')),
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
                SelectFilter::make('pegawai_id')->label('Nama Pegawai')->relationship('pegawai', 'nama_pegawai')->columnSpan(5)->searchable(),
                SelectFilter::make('role_id')->label('Hak Akses')->relationship('roles', 'name')->columnSpan(5)->searchable(),
            ], layout: Layout::AboveContent)

            ->bulkActions([
                ExportBulkAction::make(),
                DeleteBulkAction::make()
            ])

            ->prependActions([
                ImpersonateLink::make(),
            ]);
    }
}
