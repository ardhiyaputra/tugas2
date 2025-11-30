@extends('layouts.app')

@section('content')
<style>
    .card {
        border-radius: 20px;
        border: 1px solid #e5e5e5;
        box-shadow: 0 6px 18px rgba(0,0,0,0.05);
    }

    .card-header {
        background: #f8f9fa;
        border-bottom: 1px solid #e5e5e5;
        padding: 20px;
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }

    .card-body {
        padding: 25px;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control, .form-select {
        border-radius: 12px;
        border: 1px solid #ced4da;
        padding: 10px 14px;
        transition: 0.2s;
    }

    .form-control:focus, .form-select:focus {
        border-color: #495057;
        box-shadow: 0 0 0 0.15rem rgba(0,0,0,0.05);
    }

    .btn-primary, .btn-success, .btn-secondary {
        border-radius: 12px;
        font-weight: 600;
        padding: 8px 18px;
        transition: 0.2s;
    }

    .btn-primary:hover, .btn-success:hover, .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    .form-row {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .form-row > .col {
        flex: 1;
        min-width: 200px;
    }

    .btn-group-bottom {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
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
            <h4>Edit Task - {{ $list->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', [$list, $task]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Task *</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $task->name) }}" required>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $task->description) }}</textarea>
                </div>

                <div class="form-row">
                    <div class="col">
                        <label class="form-label">Prioritas *</label>
                        <select name="priority" class="form-select @error('priority') is-invalid @enderror" required>
                            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" 
                               value="{{ old('deadline', $task->deadline?->format('Y-m-d')) }}">
                        @error('deadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="btn-group-bottom">
                    <a href="{{ route('lists.show', $list) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">Update Task</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
