<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Services\AccountDeleter;
use App\Services\ProfileUpdater;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    private $profileUpdater;
    private $accountDeleter;

    public function __construct(ProfileUpdater $profileUpdater, AccountDeleter $accountDeleter)
    {
        $this->profileUpdater = $profileUpdater;
        $this->accountDeleter = $accountDeleter;
    }

    /**
     * Mostrar el formulario de perfil del usuario.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Actualizar la información del perfil del usuario.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $this->profileUpdater->updateProfile($request->user(), $request->validated());

        return redirect()->route('profile.edit')->with('status', 'perfil-actualizado');
    }

    /**
     * Eliminar la cuenta del usuario.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $this->accountDeleter->deleteAccount($request->user(), $request);

        return redirect()->to('/');
    }

}
