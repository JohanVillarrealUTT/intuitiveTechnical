<?php

namespace App\Services;

use App\Models\User;

class ProfileUpdater
{
    public function updateProfile(User $user, array $validatedData): void
    {
        // Llena los atributos del usuario con los datos validados
        $user->fill($validatedData);

        // Verifica si el atributo 'email' del usuario ha cambiado
        if ($user->isDirty('email')) {
            // Si el email ha cambiado, se restablece la propiedad 'email_verified_at' a null
            $user->email_verified_at = null;
        }

        // Guarda el usuario actualizado en la base de datos
        $user->save();
    }
}
