<?php

namespace App\Filament\Resources\MedicalRecordResource\Pages;

use App\Filament\Resources\MedicalRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMedicalRecord extends EditRecord
{
    protected static string $resource = MedicalRecordResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
