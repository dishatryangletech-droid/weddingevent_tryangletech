@extends('backend.layouts.app')

@section('title', 'Users Management')
@section('page_title', 'Admin Users')

@section('content')
  <div class="admin-card">
    <div class="card-header">
      <div>
        <div class="card-title">Administrators &amp; Staff</div>
        <div class="card-subtitle">List of registered administrative accounts.</div>
      </div>
    </div>

    <div class="table-responsive">
      <table class="admin-table">
        <thead>
          <tr>
            <th style="width: 70px;">ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Registered At</th>
            <th style="width: 100px; text-align: right;">Status</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr>
              <td style="font-weight: 700; color: var(--text-dim);">#{{ $user->id }}</td>
              <td>
                <div style="display: flex; align-items: center; gap: 0.75rem;">
                  <div class="avatar" style="width: 32px; height: 32px; font-size: 0.8rem;">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                  </div>
                  <div style="font-weight: 600; color: var(--text-main);">{{ $user->name }}</div>
                </div>
              </td>
              <td>{{ $user->email }}</td>
              <td style="color: var(--text-dim); font-size: 0.85rem;">{{ $user->created_at?->format('M d, Y') ?? 'N/A' }}</td>
              <td style="text-align: right;">
                <span class="badge badge-success">Active</span>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" style="text-align: center; color: var(--text-dim); padding: 2rem;">
                No users found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
@endsection
