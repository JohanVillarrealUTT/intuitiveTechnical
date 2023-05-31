<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-1 flex h-auto">
            <div class="bg-white dark:bg-gray-800 overflow-auto shadow-sm sm:rounded-lg w-full">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nombre</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Número de Télefono</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Correo</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tiempo de Experiencia</th></th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puestos en Área de Calidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nivel de Ingles</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($contacts as $contact)
                            <tr>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->name }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->phone_number }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->email }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->time_of_experience }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->name_of_stalls }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->english_level }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">{{ $contact->approved == 1 ? 'Aprobado' : 'Desaprobado' }}</td>
                                <td class="px-4 py-4 whitespace-nowrap">Editar / Borrar</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
