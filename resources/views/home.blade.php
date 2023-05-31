@extends('layouts.homelayouts')

@section('content')
<div
        class="relative overflow-hidden bg-no-repeat bg-cover"
        style="
            background-position: 50%;
            background-image: url('https://intuitivemexicali.com/images/landing-page/hero-bg.jpg');
            height: 500px;
        "
        >
        <div
            class="absolute top-0 right-0 bottom-0 left-0 w-full h-full overflow-hidden bg-fixed"
            style="background-color: rgba(0, 0, 0, 0.75)"
        >
            <div class="flex justify-center items-center h-full">
            <div class="text-center text-white px-6 md:px-12">
                <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12">
                    Registro de Tecnico de ensamble  <br /><span>¡SÉ PARTE DE LA INNOVACIÓN! </span>
                </h1>
                <a >
                    <button type="button" class="inline-block px-7 py-3 border-2 border-blue-500 text-white font-medium text-sm leading-snug uppercase rounded hover:bg-blue-500 hover:bg-opacity-75 focus:outline-none focus:ring-0 transition duration-150 ease-in-out" data-mdb-ripple="true" data-mdb-ripple-color="light">
                        Ponte en contacto con nosotros
                    </button>
                </a>

            </div>
            </div>
        </div>
        </div>

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12 ">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="h-14 w-14 bg-blue-200 rounded-full flex flex-shrink-0 justify-center items-center text-blue-500 text-2xl font-mono">i</div>
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                        <h2 class="leading-relaxed">CONTACTO</h2>
                        <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
                        </div>
                    </div>
                    {{--   @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <form action="{{ route('contactUs.store') }}" method="POST">
                        @csrf
                        <div >
                            <label for="name" class="leading-loose">Nombre:</label>
                            <input type="text" id="name" name="name" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <br>
                            @error('name')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <label for="phone_number" class="leading-loose">Teléfono:</label>
                            <input type="text" id="phone_number" name="phone_number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            <br>
                            @error('phone_number')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="leading-loose">Correo:</label>
                            <input type="email" id="email" name="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                            @error('email')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <label for="time_of_experience" class="leading-loose">¿Cuánto tiempo tienes de experiencia en área de calidad?</label>
                            <select id="time_of_experience" name="time_of_experience" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                <option value="">Selecciona una opción</option>
                                <option value="1">No tengo experiencia</option>
                                <option value="2">1 a 7 meses</option>
                                <option value="3">8 meses a 1 año y medio</option>
                                <option value="4">Más de 1 año y medio</option>
                            </select>
                            @error('time_of_experience')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <label for="name_of_stalls" class="leading-loose">¿Qué puestos has tenido en áreas de calidad?</label>
                            <textarea id="name_of_stalls" name="name_of_stalls" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"></textarea>
                            @error('name_of_stalls')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>

                        <div>
                            <label for="english_level" class="leading-loose">¿Qué nivel de inglés manejas?</label>
                            <select id="english_level" name="english_level" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                <option value="">Selecciona una opción</option>
                                <option value="1">Principiante</option>
                                <option value="2">Intermedio Bajo</option>
                                <option value="3">Intermedio Avanzado</option>
                                <option value="4">Avanzado</option>
                            </select>
                            @error('english_level')
                            <small style="color:red">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="pt-4 flex items-center space-x-4">
                            <button type="submit"  class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">Enviar</button>
                        </div>
                    </form>
                    @if (session('info'))
                        <script>
                            alert("{{ session('info') }}");
                        </script>
                    @endif
                </div>
            </div>
        </div>
</div>
@endsection
