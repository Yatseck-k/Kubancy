<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Post;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Image;
use MoonShine\UI\Fields\Json;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Textarea;

class PostResource extends ModelResource
{
    protected string $model = Post::class;

    protected string $title = 'Posts';

    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            Text::make('Title'),
            Text::make('Slug'),
            Select::make('Status')->options([
                'draft' => 'Draft',
                'published' => 'Published',
                'archived' => 'Archived',
            ]),
        ];
    }

    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Title'),
                Textarea::make('Content'),
                Text::make('Slug'),
                Textarea::make('Excerpt')->nullable(),
                Select::make('Status')->options([
                    'draft' => 'Draft',
                    'published' => 'Published',
                    'archived' => 'Archived',
                ])->default('draft'),
                Date::make('Published At')->nullable(),
                Image::make('Image')->nullable(),
                Json::make('Tags')->nullable(),
            ]),
        ];
    }

    protected function detailFields(): iterable
    {
        return [
            ID::make(),
            Text::make('Title'),
            Textarea::make('Content'),
            Text::make('Slug'),
            Textarea::make('Excerpt')->nullable(),
            Select::make('Status')->options([
                'draft' => 'Draft',
                'published' => 'Published',
                'archived' => 'Archived',
            ]),
            Date::make('Published At')->nullable(),
            Image::make('Image')->nullable(),
            Json::make('Tags')->nullable(),
        ];
    }

    protected function rules(mixed $item): array
    {
        return [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:posts,slug,'.($item->id ?? 'NULL'),
            'content' => 'required|string',
            'excerpt' => 'nullable|string',
            'status' => 'required|in:draft,published,archived',
            'published_at' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'tags' => 'nullable|json',
        ];
    }
}
