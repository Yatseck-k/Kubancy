<?php

declare(strict_types=1);

namespace app\MoonShine\Resources;

use App\Models\User;
use MoonShine\Contracts\UI\ComponentContract;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Password;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Users';

    protected string $column = 'name';

    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Name'),
            Text::make('Email'),
            Date::make('Last Login'),
            Select::make('Status')->options([
                'active' => 'Active',
                'blocked' => 'Blocked',
            ]),
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Name'),
                Text::make('Email'),
                Password::make('Password')->nullable(),
                Text::make('Birth Year')->nullable(),
                Text::make('Avatar')->nullable(),
                Textarea::make('Bio')->nullable(),
                Date::make('Last Login')->nullable(),
                Select::make('Status')->options([
                    'active' => 'Active',
                    'blocked' => 'Blocked',
                ])->default('active'),
            ]),
        ];
    }

    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Name'),
            Text::make('Email'),
            Date::make('Last Login'),
            Select::make('Status')->options([
                'active' => 'Active',
                'blocked' => 'Blocked',
            ]),
            Text::make('Birth Year'),
            Text::make('Avatar'),
            Textarea::make('Bio'),
        ];
    }

    protected function rules(mixed $item): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.($item->id ?? 'NULL'),
            'password' => 'nullable|string|min:8',
            'birth_year' => 'nullable|integer|digits:4',
            'avatar' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'status' => 'required|in:active,blocked',
        ];
    }
}
