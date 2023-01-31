<?php

namespace App\Filament\Resources\HoKhauResource\Pages;

use App\Filament\Resources\HoKhauResource;
use Filament\Notifications\Notification;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Support\Exceptions\Halt;
use Illuminate\Database\Eloquent\Model;

class CreateHoKhau extends CreateRecord
{
    protected static string $resource = HoKhauResource::class;

    protected \App\Actions\HoKhau\TaoHoKhau $createHoKhauAction;

    public function __construct($id = null)
    {
        parent::__construct($id);
        $this->createHoKhauAction = new \App\Actions\HoKhau\TaoHoKhau();
    }

    protected function handleRecordCreation(array $data): Model
    {
        try {
            return $this->createHoKhauAction->handle($data);
        } catch (\Throwable $exception) {
            Notification::make()->danger()
                ->title('Không thể tạo hộ khẩu')
                ->body($exception->getMessage())->send();
        }
        $this->halt();
    }
}
