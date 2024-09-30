<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MasukResource\Pages;
use App\Filament\Resources\MasukResource\RelationManagers;
use App\Models\Masuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MasukResource extends Resource
{
    protected static ?string $model = Masuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kd_masuk')
                    ->label('Kode Masuk')
                    ->required()
                    ->unique(masuk::class, 'kd_masuk', fn($record) => $record)
                    ->maxLength(255),

                Forms\Components\DatePicker::make('tgl_masuk')
                    ->label('Tanggal Masuk')
                    ->required(),

                Forms\Components\Select::make('kd_supplier')
                    ->label("Kode Supplier")
                    ->options(Supplier::all()->pluck('nama_supplier', 'kd_supplier')->map(function ($name, $code) {
                        return "$code - $name"; // Concatenate code and name
                    }))
                    ->searchable(),

                Forms\Components\TextInput::make('total_masuk')
                    ->label('Total Masuk')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kd_masuk')->label('Kode Barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tgl_masuk')->label('Tanggal Masuk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kd_supplier')->label('Kode Supplier')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('total_masuk')->label('Total Masuk')->sortable()->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMasuks::route('/'),
            'create' => Pages\CreateMasuk::route('/create'),
            'edit' => Pages\EditMasuk::route('/{record}/edit'),
        ];
    }
}
