@extends('layouts.app')

@section('content')
<style>
    .card {
        border-radius: 16px;
        border: 1px solid #e5e5e5;
    }

    .card-header {
        border-bottom: 1px solid #e5e5e5;
        padding: 18px 20px;
        background: #fff;
    }

    .card-body {
        padding: 20px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        transition: 0.15s ease;
    }

    .form-control:focus, .form-select:focus {
        border-color: #495057;
        box-shadow: 0 0 0 0.2rem rgba(0,0,0,0.05);
    }

    .btn-primary, .btn-success, .btn-secondary {
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-primary:hover, .btn-success:hover, .btn-secondary:hover {
        opacity: 0.9;
    }
</style>

<div class="container">
    <div class="mb-3">
        <a href="{{ route('lists.show', $list) }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke List
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Tambah Task - {{ $list->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.store', $list) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Task *</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name') }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prioritas *</label>
                        <select name="priority" class="form-select @error('priority') is-invalid @enderror" required>
                            <option value="">Pilih</option>
                            <option value="low" {{ old('priority') == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', 'medium') == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority') == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" 
                               value="{{ old('deadline') }}" min="{{ date('Y-m-d') }}">
                        @error('deadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('lists.show', $list) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Simpan Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
