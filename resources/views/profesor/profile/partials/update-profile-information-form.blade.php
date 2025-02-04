<section>
    <header>
    @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 7000)"
                    class="text-sm text-gray-600"
                >{{ __('Guardado.') }}</p>
            @endif
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualice la información del perfil y la dirección de correo electrónico de su cuenta.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profesor.profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="nombre" :value="__('Nombre')" />
            <x-text-input id="nombre" name="nombre" type="text" class="mt-1 block w-full" :value="old('nombre', $user->nombre)" required autofocus autocomplete="nombre" />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>

        <div>
            <x-input-label for="apellido" :value="__('Apellido')" />
            <x-text-input id="apellido" name="apellido" type="text" class="mt-1 block w-full" :value="old('apellido', $user->apellido)" required autocomplete="apellido" />
            <x-input-error class="mt-2" :messages="$errors->get('apellido')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="edad" :value="__('Edad')" />
            <x-text-input id="edad" name="edad" type="number" class="mt-1 block w-full" :value="old('edad', $user->edad)" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('edad')" />
        </div>

        <div>
            <x-input-label for="cedula" :value="__('Cédula')" />
            <x-text-input id="cedula" name="cedula" type="text" class="mt-1 block w-full" :value="old('cedula', $user->cedula)" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('cedula')" />
        </div>

        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <x-text-input id="direccion" name="direccion" type="text" class="mt-1 block w-full" :value="old('direccion', $user->direccion)" disabled/>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
        </div>

        <div>
            <x-input-label for="telefono_profesor" :value="__('Teléfono')" />
            <x-text-input id="telefono_profesor" name="telefono_profesor" type="text" class="mt-1 block w-full" :value="old('telefono_profesor', $user->telefono_profesor)" placeholder="Ingrese el teléfono" pattern="[0-9]{10}" title="Debe ingresar un número de 10 dígitos sin el código de país" maxlength="10" />
            <small class="form-text text-muted">Ejemplo: 1234567890</small>
            <x-input-error class="mt-2" :messages="$errors->get('telefono_profesor')" />
        </div>

        <div>
            <x-input-label for="foto" :value="__('Foto')" />
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                <label class="custom-file-label" for="foto">Seleccionar archivo</label>
            </div>

            @if ($user->foto)
                <div class="mt-2">
                    <img src="{{ asset('images/' . $user->foto) }}" alt="Foto del usuario" class="img-thumbnail" style="max-width: 150px;">
                    <p>Foto actual</p>
                </div>
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('foto')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Guardar') }}</x-primary-button>

           
        </div>
    </form>
</section>