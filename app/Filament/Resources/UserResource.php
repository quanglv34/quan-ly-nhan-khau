<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationGroup = 'Quản trị';
    protected static ?string $label = 'Người dùng';
    protected static ?string $pluralModelLabel = 'Người dùng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()->label('Họ và tên'),
                Forms\Components\TextInput::make('email')
                    ->email()->required()
                    ->label('Địa chỉ e-mail')->unique(ignoreRecord: true),
                Forms\Components\TextInput::make('password')
                    ->confirmed()->password()
                    ->dehydrateStateUsing(fn ($state) => \Hash::make($state))
                    ->required()->label('Mật khẩu'),
                Forms\Components\TextInput::make('password_confirmation')
                    ->password()
                    ->required()->label('Xác nhận mật khẩu')
                    ->dehydrated(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->label('Họ và tên'),
                Tables\Columns\TextColumn::make('email')->label('Địa chỉ e-mail'),
                Tables\Columns\TextColumn::make('created_at')->label('Ngày tạo')->date('d.m.Y'),
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
            'index' => Pages\ListUsers::route('/'),
        ];
    }
}
