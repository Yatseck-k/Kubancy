<?php

namespace App\Livewire\Layout;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Navigation extends Component
{
    public function logout(): RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('welcome');
    }

    public function render(): Application|Factory|View|\Illuminate\View\View
    {
        return view('livewire.layout.navigation');
    }
}
