<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountDeleter
{
    /**
     * Elimina la cuenta del usuario.
     *
     * @param User $user El usuario cuya cuenta se eliminará.
     * @param Request $request La instancia de la solicitud actual.
     * @return void
     */
    public function deleteAccount(User $user, Request $request): void
    {
        // Valida la solicitud con la regla de validación 'current-password' para el campo 'password'
        // y los errores se asignan al "bag" (conjunto) de errores 'userDeletion'
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        // Cierra la sesión del usuario autenticado
        Auth::logout();

        // Elimina el usuario de la base de datos
        $user->delete();

        // Invalida la sesión actual, lo que significa que se cerrará la sesión y se eliminarán todos los datos de la sesión
        $request->session()->invalidate();

        // Regenera el token de sesión para evitar posibles ataques de falsificación de solicitudes entre sitios (CSRF)
        $request->session()->regenerateToken();
    }
}
