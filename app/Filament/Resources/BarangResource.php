<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kd_barang')
                    ->label('Kode Barang')
                    ->required()
                    ->unique(Barang::class, 'kd_barang', fn ($record) => $record)
                    ->maxLength(255),

                Forms\Components\TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->unique(Barang::class, 'nama_barang', fn ($record) => $record)
                    ->maxLength(255),

                Forms\Components\TextInput::make('satuan')
                    ->label('Satuan')
                    ->required()
                    ->maxLength(100), 

                Forms\Components\TextInput::make('harga_jual')
                    ->label('Harga Jual')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('harga_beli')
                    ->label('Harga Beli')
                    ->required()
                    ->numeric(), 

                Forms\Components\TextInput::make('stok')
                    ->label('Stok')
                    ->required()
                    ->numeric(), 

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->required()
                    ->options([
                        true => 'ON',
                        false => 'OFF',
                    ])
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kd_barang')->label('Kode Barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('nama_barang')->label('Nama Barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('satuan')->label('Satuan')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('harga_jual')->label('Harga Jual')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('harga_beli')->label('Harga Beli')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('stok')->label('Stok')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('status')->label('Status')->sortable()->searchable()
                    ->formatStateUsing(fn($state) => $state ? 'ON' : 'OFF'),
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
            'index' => Pages\ListBarangs::route('/'),
            'create' => Pages\CreateBarang::route('/create'),
            'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }
}
