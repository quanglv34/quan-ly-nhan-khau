<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HoKhauResource\Pages;
use App\Filament\Resources\HoKhauResource\RelationManagers;
use App\Models\HoKhau;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HoKhauResource extends Resource
{
    protected static ?string $model = HoKhau::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $pluralModelLabel = 'Hộ khẩu';
    protected static ?string $modelLabel = 'Hộ khẩu';
    protected static ?string $slug = 'ho-khau';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHoKhaus::route('/'),
            'create' => Pages\CreateHoKhau::route('/create'),
            'edit' => Pages\EditHoKhau::route('/{record}/edit'),
        ];
    }
}
