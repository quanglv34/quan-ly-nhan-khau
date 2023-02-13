<?php

namespace App\Filament\Resources;

use App\Enums\LoaiDanhMucQuy;
use App\Filament\Resources\DanhMucQuyResource\Pages;
use App\Filament\Resources\DanhMucQuyResource\RelationManagers;
use App\Models\DanhMucQuy;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DanhMucQuyResource extends Resource
{
    protected static ?string $model = DanhMucQuy::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Quản lý quỹ';
    protected static ?string $pluralModelLabel = 'Danh mục Quỹ';
    protected static ?string $modelLabel = 'Quỹ';
    protected static ?string $slug = 'danh-muc-quy';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make([
                    Forms\Components\Select::make('loaiQuy')
                        ->disabledOn('edit')
                        ->options
                    ([
                        LoaiDanhMucQuy::BatBuoc->value => 'Bắt buộc',
                        LoaiDanhMucQuy::DongGop->value => 'Đóng góp',
                    ])->required()->label('Loại quỹ'),
                    Forms\Components\TextInput::make('tenQuy')
                        ->required()->label
                    ('Tên quỹ'),
                    Forms\Components\TextInput::make('ngayBatDau')->type('date')
                        ->label('Ngày bắt đầu'),
                    Forms\Components\TextInput::make('ngayKetThuc')->type('date')
                        ->label('Ngày kết thúc'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('tenQuy')
                    ->label('Tên quỹ')
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('loaiQuy')
                    ->enum([
                    LoaiDanhMucQuy::BatBuoc->value => 'Bắt buộc',
                    LoaiDanhMucQuy::DongGop->value => 'Đóng góp',
                ])->label('Loại quỹ'),
                Tables\Columns\TextColumn::make('ngayBatDau')
                    ->label('Ngày bắt đầu'),
                Tables\Columns\TextColumn::make('ngayKetThuc')
                    ->label('Ngày kết thúc'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('loaiQuy')->options([
                    LoaiDanhMucQuy::BatBuoc->value => 'Bắt buộc',
                    LoaiDanhMucQuy::DongGop->value => 'Đóng góp',
                ])->multiple()
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
            RelationManagers\QuyDongGopRelationManager::class,
            RelationManagers\QuyBatBuocRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDanhMucQuy::route('/'),
            //'create' => Pages\CreateDanhMucQuy::route('/create'),
            'edit' => Pages\EditDanhMucQuy::route('/{record}/edit'),
        ];
    }
}
