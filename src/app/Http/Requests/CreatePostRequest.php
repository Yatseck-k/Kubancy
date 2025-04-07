<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\InputBag;

class CreatePostRequest extends Request
{
    public InputBag $request;

    public function __construct(Request $request)
    {
        $this->dump($request->title);
        exit();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
