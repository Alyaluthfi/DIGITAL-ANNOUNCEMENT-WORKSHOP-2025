<?php

namespace App\Filament\Resources\Announcements\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AnnouncementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                // Gunakan Textarea/TextInput untuk category, tanpa Select
                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->required(),
                // Gunakan Textarea untuk konten, tanpa RichEditor
                Textarea::make('content')
                    ->required()
                    ->columnSpanFull(),
                DatePicker::make('date')
                    ->required(),
                // Gunakan TextInput untuk attachment, tanpa FileUpload
                FileUpload::make('attachment')
                    ->disk('public')
                    ->directory('/form-attachments')
                    ->visibility('public'),
            ]);
    }
}
