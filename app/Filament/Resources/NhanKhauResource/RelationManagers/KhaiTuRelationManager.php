<?php

namespace App\Filament\Resources\NhanKhauResource\RelationManagers;

use Auth;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KhaiTuRelationManager extends RelationManager
{
    protected static string $relationship = 'khaiTu';

    protected static ?string $recordTitleAttribute = 'id';

    protected static ?string $title = 'Khai tử';
    protected static ?string $modelLabel = 'khai tử';
    protected static ?string $pluralModelLabel = 'khai tử';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(1)
            ->schema([
                Forms\Components\Select::make('nguoiChetId')
                    ->label('Người chết')
                    ->disabled()
                    ->relationship('nguoiChet', 'maNhanKhauVaHoVaTen')
                    ->default(Auth::user()->id),
                Forms\Components\TextInput::make('maGiayKhaiTu')
                    ->required()
                    ->label('Mã giấy khai tử')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lyDoChet')
                    ->required()
                    ->label('Lý do chết')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ngayChet')->label('Ngày chết')
                    ->required()->type('date'),
                Forms\Components\TextInput::make('ngayKhai')->label('Ngày khai')
                    ->required()->type('date'),
                Forms\Components\Select::make('nguoiKhaiId')
                    ->relationship('nguoiKhai', 'name')
                    ->label('Người khai')
                    ->default(Auth::user()->id),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()->modalWidth('lg'),
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
