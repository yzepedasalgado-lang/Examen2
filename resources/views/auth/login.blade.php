<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Iniciar Sesión | DISFARMA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="background-color: #dcebef;">
<div class="container">
  <div class="row justify-content-center align-items-center min-vh-100">
    <div class="col-md-6 col-lg-4">
      <div class="card shadow border-0">

        <div class="card-header text-center py-4 border-0" style="background-color: #eef2f4; border-bottom: 4px solid #5bb8d9 !important;">
          <img src="{{ asset('img/logo.png') }}" height="70" alt="DISFARMA">
          <h4 class="fw-bold mt-2 mb-0" style="color: #14606e;">DISFARMA</h4>
          <small class="text-muted">Sistema de Gestión Farmacéutica</small>
        </div>

        <div class="card-body p-4">
          <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <div class="mb-3">
              <label class="form-label">Correo institucional</label>
              <input type="email" name="email" value="{{ old('email') }}"
                     class="form-control @error('email') is-invalid @enderror" placeholder="usuario@disfarma.hn" autofocus>
              @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Contraseña</label>
              <input type="password" name="password"
                     class="form-control @error('password') is-invalid @enderror">
              @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="form-check mb-3">
              <input class="form-check-input" type="checkbox" name="remember" id="remember">
              <label class="form-check-label" for="remember">Recordar mi sesión</label>
            </div>
            <button class="btn w-100 text-white" style="background-color: #14606e;">
              <i class="bi bi-box-arrow-in-right me-1"></i>Ingresar
            </button>
          </form>
        </div>

        <div class="card-footer text-center small text-white border-0" style="background-color: #14606e;">
          &copy; DISFARMA {{ date('Y') }}. Todos los derechos reservados.
        </div>

      </div>
    </div>
  </div>
</div>
</body>
</html>