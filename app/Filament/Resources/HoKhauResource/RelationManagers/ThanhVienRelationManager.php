<?php

namespace App\Filament\Resources\HoKhauResource\RelationManagers;

use App\Models\NhanKhau;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ThanhVienRelationManager extends RelationManager
{
    protected static string $relationship = 'thanhVien';

    protected static ?string $recordTitleAttribute = 'nhanKhauId';
    protected static ?string $modelLabel = 'Thành viên';
    protected static ?string $pluralModelLabel = 'Thành viên';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('nhanKhauId')
                    ->searchable()
                    ->required()
                    ->options(fn () => NhanKhau::all()->pluck('maNhanKhauVaHoVaTen', 'id'))
                    ->getOptionLabelFromRecordUsing(fn ($record) => "({$record->id}) {$record->hoVaTen}"),
                Forms\Components\TextInput::make('quanHeVoiChuHo')->label('Quan hệ với chủ hộ')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nhanKhauId')->label('Mã nhân khẩu'),
                Tables\Columns\TextColumn::make('nhanKhau.hoVaTen')->label('Họ và tên'),
                Tables\Columns\TextColumn::make('quanHeVoiChuHo')->label('Quan hệ với chủ hộ'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
}
