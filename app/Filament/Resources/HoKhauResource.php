<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HoKhauResource\Pages;
use App\Filament\Resources\HoKhauResource\RelationManagers;
use App\Models\HoKhau;
use Auth;
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
                Forms\Components\Card::make([
                    Forms\Components\TextInput::make('maHoKhau')
                        ->required()
                        ->label('Mã hộ khẩu')->unique(ignoreRecord: true),
                    Forms\Components\TextInput::make('maKhuVuc')
                        ->required()
                        ->label('Mã khu vực'),
                    Forms\Components\TextInput::make('diaChi')
                        ->required()
                        ->label('Địa chỉ'),
                    Forms\Components\TextInput::make('ngayLap')->required()
                        ->label('Ngày
                lập')->type('date'),
                    Forms\Components\TextInput::make('ngayChuyenDi')->label('Ngày
                chuyển đi')->type('date'),
                    Forms\Components\Textarea::make('lyDoChuyen')
                        ->label('Lý do chuyển'),
                    Forms\Components\Select::make('nguoiThucHienId')
                        ->required()
                        ->default(Auth::user()->id)
                        ->label('Người thực hiện')
                        ->relationship('nguoiThucHien', 'name'),
                    Forms\Components\Select::make('chuHoId')
                        ->preload()
                        ->required()
                        ->label('Chủ hộ')
                        ->searchable()
                        ->relationship('chuHo', 'hoVaTen'),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('maHoKhau')->label('Mã hộ khẩu'),
                Tables\Columns\TextColumn::make('maKhuVuc')->label('Mã khu vực'),
                Tables\Columns\TextColumn::make('diaChi')->label('Địa chỉ'),
                Tables\Columns\TextColumn::make('ngayLap')->date()->label('Ngày lập'),
                Tables\Columns\TextColumn::make('chuHo.hoVaTen')->label('Chủ hộ'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                //Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ThanhVienRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListHoKhaus::route('/'),
            'create' => Pages\CreateHoKhau::route('/create'),
            'edit'   => Pages\EditHoKhau::route('/{record}/edit'),
        ];
    }
}
