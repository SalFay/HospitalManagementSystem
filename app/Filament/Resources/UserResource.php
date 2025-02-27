<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\RolesRelationManager;
use App\Models\User;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
class UserResource extends Resource
{

    protected static ?string $model = User::class;

    protected static ?string $navigationIcon  = 'heroicon-s-user-group';
    protected static ?string $navigationGroup = 'Roles & Users';

    public static function form( Form $form ) : Form
    {
        return $form
            ->schema( [
                Section::make( 'User' )
                    ->description( 'Create / Update User.' )
                    ->icon( 'heroicon-m-user' )
                    ->schema( [
                        Grid::make()
                            ->schema( [
                                TextInput::make( 'name' )
                                    ->required()
                                    ->maxLength( 255 ),
                                TextInput::make( 'email' )
                                    ->email()
                                    ->unique( ignoreRecord: true )
                                    ->required()
                                    ->maxLength( 255 ),
                                TextInput::make( 'password' )
                                    ->password()
                                    ->required()
                                    ->maxLength( 255 )->hiddenOn( 'edit' ),
                                Select::make( 'role_id' )
                                    ->relationship( 'role', 'name' )
                                    ->required()
                                    ->searchable()
                                    ->preload()
                                    ->default( 1 ),
                                Toggle::make( 'status' )
                                    ->required(),
                            ] )
                    ] )
            ] )->columns( 12 );
    }

    public static function table( Table $table ) : Table
    {
        return $table
            ->columns( [
                TextColumn::make( 'name' )
                    ->searchable(),
                TextColumn::make( 'email' )
                    ->searchable(),
                Tables\Columns\IconColumn::make( 'status' )
                    ->boolean(),
                TextColumn::make( 'role.name' )
                    ->numeric()->searchable()
                    ->sortable(),
                TextColumn::make( 'created_at' )
                    ->dateTime()
                    ->sortable()
                    ->toggleable( isToggledHiddenByDefault: true ),
                TextColumn::make( 'updated_at' )
                    ->dateTime()
                    ->sortable()
                    ->toggleable( isToggledHiddenByDefault: true ),
            ] )
            ->filters( [
                //
            ] )
            ->actions( [
                EditAction::make(),
                DeleteAction::make(),
            ] )
            ->bulkActions( [
                BulkActionGroup::make( [
                    DeleteBulkAction::make(),
                ] ),
            ] )
            ->emptyStateActions( [
                CreateAction::make(),
            ] );
    }

    public static function getRelations() : array
    {
        return [
        ];
    }

    public static function getPages() : array
    {
        return [
            'index'  => Pages\ListUsers::route( '/' ),
            'create' => Pages\CreateUser::route( '/create' ),
            'edit'   => Pages\EditUser::route( '/{record}/edit' ),
        ];
    }

}
