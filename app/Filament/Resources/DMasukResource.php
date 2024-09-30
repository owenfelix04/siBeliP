<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DMasukResource\Pages;
use App\Filament\Resources\DMasukResource\RelationManagers;
use App\Models\d_masuk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DMasukResource extends Resource
{
    protected static ?string $model = d_masuk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id_masuk')
                    ->label('Kode dMasuk')
                    ->required()
                    ->unique(d_masuk::class, 'id_masuk', fn($record) => $record)
                    ->maxLength(255),

                Forms\Components\Select::make('kd_masuk')
                    ->label("Kode Masuk")
                    ->options(masuk::all()->pluck('kd_masuk', 'kd_masuk'))
                    ->searchable(),

                Forms\Components\Select::make('kd_barang_beli')
                    ->label("Kode Barang")
                    ->options(barang::all()->pluck('nama_barang', 'kd_barang')->map(function ($name, $code) {
                        return "$code - $name"; // Concatenate code and name
                    }))
                    ->searchable()
                    ->reactive() // Make the select reactive
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        // When the product is selected, calculate the subtotal
                        $hargaBeli = barang::where('kd_barang', $state)->value('harga_beli'); // Fetch the product price
                        $jumlah = $get('jumlah'); // Get the current quantity
                        $subtotal = $hargaBeli * $jumlah; // Calculate subtotal based on selected price and quantity
                        $set('subtotal', $subtotal); // Update subtotal
                    }),

                Forms\Components\TextInput::make('jumlah')
                    ->label('Jumlah')
                    ->required()
                    ->numeric()
                    ->reactive() // Make the input reactive
                    ->afterStateUpdated(function ($state, callable $set, $get) {
                        // Update the subtotal based on the current quantity and selected product price
                        $hargaBeli = barang::where('kd_barang', $get('kd_barang_beli'))->value('harga_beli'); // Fetch the product price
                        $subtotal = $hargaBeli * $state; // Calculate subtotal
                        $set('subtotal', $subtotal); // Update subtotal
                    }),

                Forms\Components\TextInput::make('subtotal')
                    ->label('Total Harga')
                    ->required()
                    ->numeric()
                    ->disabled(), // Disable editing this field to prevent manual input
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id_masuk')->label('Kode dMasuk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kd_masuk')->label('Kode Masuk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('kd_barang_beli')->label('Kode Barang')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->label('Jumlah Masuk')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('subtotal')->label('Total Harga')->sortable()->searchable(),
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
            'index' => Pages\ListDMasuks::route('/'),
            'create' => Pages\CreateDMasuk::route('/create'),
            'edit' => Pages\EditDMasuk::route('/{record}/edit'),
        ];
    }
}
