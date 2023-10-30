<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name">Nombre</label>
            <input id="name" class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
            @if ($errors->has('name'))
                <div class="invalid-feedback">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>

        <!-- Lastname -->
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input id="lastname" class="form-control @if($errors->has('lastname')) is-invalid @endif" type="text" name="lastname" value="{{ old('lastname') }}" required autofocus />
            @if ($errors->has('lastname'))
                <div class="invalid-feedback">
                    {{ $errors->first('lastname') }}
                </div>
            @endif
        </div>

        <!-- Role -->
        <div class="form-group">
            <label for="role_id">Rol</label>
            <select id="role_id" class="form-control @if($errors->has('role_id')) is-invalid @endif" name="role_id" required>
                <option value="">-- Seleccione un Rol --</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('role_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('role_id') }}
                </div>
            @endif
        </div>

        <!-- Staff -->
        <div class="form-group">
            <label for="staff_id">Staff</label>
            <select id="staff_id" class="form-control @if($errors->has('staff_id')) is-invalid @endif" name="staff_id" required>
                <option value="">-- Seleccione un Staff --</option>
                @foreach ($staff as $st)
                    <option value="{{ $st->id }}">{{ $st->area }}</option>
                @endforeach
            </select>
            @if ($errors->has('staff_id'))
                <div class="invalid-feedback">
                    {{ $errors->first('staff_id') }}
                </div>
            @endif
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input id="email" class="form-control @if($errors->has('email')) is-invalid @endif" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
            @if ($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" class="form-control @if($errors->has('password')) is-invalid @endif" type="password" name="password" required autocomplete="new-password" />
            @if ($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña</label>
            <input id="password_confirmation" class="form-control @if($errors->has('password_confirmation')) is-invalid @endif" type="password" name="password_confirmation" required autocomplete="new-password" />
            @if ($errors->has('password_confirmation'))
                <div class="invalid-feedback">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>

        <div class="form-group mt-4">
            <a class="text-sm text-gray-600" href="{{ route('login') }}">
                ¿Estás registrado?
            </a>

            <button type="submit" class="btn btn-primary ml-4">
                Registrarse
            </button>
        </div>
    </form>
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

