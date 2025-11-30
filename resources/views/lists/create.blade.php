@extends('layouts.app')

@section('content')
<div class="create-wrapper">
    <div class="create-card">

        <div class="create-card-header">
            <h2 class="title">Buat List Baru</h2>
            <p class="subtitle">Beri nama yang jelas agar mudah dikelola.</p>
        </div>

        <form action="{{ route('lists.store') }}" method="POST" class="create-form">
            @csrf

            <div class="form-group">
                <label class="form-label">Nama List</label>
                <input type="text" name="name"
                    class="form-input @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" required autofocus>
                @error('name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="action-row">
                <a href="{{ route('lists.index') }}" class="btn-secondary">Batal</a>
                <button type="submit" class="btn-primary">Simpan</button>
            </div>
        </form>

    </div>
</div>
@endsection

@push('styles')
<style>


.create-wrapper {
    max-width: 620px;
    margin: 40px auto;
    padding: 0 16px;
}

.create-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 28px;
    border: 1px solid #e5e7eb;
    box-shadow:
        0 8px 16px rgba(0,0,0,0.03),
        0 20px 40px rgba(0,0,0,0.05);
    transition: 0.25s ease;
}

.create-card:hover {
    transform: translateY(-1px);
    box-shadow:
        0 12px 20px rgba(0,0,0,0.04),
        0 26px 50px rgba(0,0,0,0.07);
}


.create-card-header {
    margin-bottom: 28px;
}

.title {
    font-size: 24px;
    font-weight: 600;
    color: #111827;
    margin-bottom: 4px;
}

.subtitle {
    color: #6b7280;
    font-size: 14px;
}


.form-group {
    margin-bottom: 22px;
}

.form-label {
    font-weight: 500;
    color: #1f2937;
    margin-bottom: 6px;
    display: block;
}

.form-input {
    width: 100%;
    border: 1px solid #d1d5db;
    background: #f9fafb;
    padding: 13px 15px;
    border-radius: 10px;
    transition: 0.25s ease;
    font-size: 15px;
}

.form-input:hover {
    background: #ffffff;
}

.form-input:focus {
    border-color: #9ca3af;
    background: #ffffff;
    box-shadow: 0 0 0 3px rgba(156,163,175,0.25);
}

.error-text {
    font-size: 13px;
    color: #dc2626;
    margin-top: 4px;
}


.action-row {
    display: flex;
    justify-content: flex-end;
    gap: 12px;
    margin-top: 10px;
}

.btn-primary {
    background: #111827;
    color: white;
    border: none;
    padding: 11px 26px;
    border-radius: 10px;
    font-weight: 500;
    transition: 0.25s ease;
}

.btn-primary:hover {
    background: #0f172a;
    transform: translateY(-2px);
}

.btn-secondary {
    background: #e5e7eb;
    color: #374151;
    padding: 11px 26px;
    border-radius: 10px;
    font-weight: 500;
    transition: 0.25s ease;
    text-decoration: none;
}

.btn-secondary:hover {
    background: #d1d5db;
    transform: translateY(-2px);
}

</style>
@endpush
