<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Login | Elegant Occasions</title>
  
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/elegant_occasions_logo.png') }}" />
  <link rel="stylesheet" href="{{ asset('backend/css/admin.css') }}?v={{ time() }}" />
</head>
<body>
  <div class="auth-page">
    <div class="auth-card">
      <div class="auth-brand">
        <div style="display: flex; justify-content: center; margin-bottom: 0.85rem;">
          <img src="{{ asset('images/elegant_occasions_logo.png') }}" alt="Elegant Occasions" style="height: 75px; width: auto; max-width: 220px; object-fit: contain;" />
        </div>
        <p>Sign in to access your administrative dashboard</p>
      </div>

      @if(session('success'))
        <div class="alert alert-success" style="font-size: 0.85rem;">
          {{ session('success') }}
        </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger" style="font-size: 0.85rem;">
          @foreach($errors->all() as $err)
            <div>{{ $err }}</div>
          @endforeach
        </div>
      @endif

      <form action="{{ route('admin.login.submit') }}" method="POST">
        @csrf

        <div class="form-group">
          <label class="form-label" for="email">Email Address</label>
          <input 
            type="email" 
            id="email" 
            name="email" 
            value="{{ old('email', 'admin@gmail.com') }}" 
            class="form-control" 
            placeholder="name@company.com" 
            required 
            autofocus 
          />
        </div>

        <div class="form-group">
          <label class="form-label" for="password">Password</label>
          <input 
            type="password" 
            id="password" 
            name="password" 
            class="form-control" 
            placeholder="••••••••" 
            required 
          />
        </div>

        <div class="form-group" style="display: flex; align-items: center; justify-content: space-between; margin-top: 0.5rem; margin-bottom: 1.5rem;">
          <label style="display: flex; align-items: center; gap: 0.5rem; font-size: 0.85rem; color: var(--text-muted); cursor: pointer;">
            <input type="checkbox" name="remember" value="1" style="accent-color: var(--primary);" />
            <span>Remember me</span>
          </label>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 0.85rem;">
          <span>Sign In to Dashboard</span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="9 18 15 12 9 6"></polyline>
          </svg>
        </button>
      </form>

      <div style="text-align: center; margin-top: 1.75rem; font-size: 0.82rem; color: var(--text-dim);">
        &copy; {{ date('Y') }} Elegant Occasions. All rights reserved.
      </div>
    </div>
  </div>
</body>
</html>
