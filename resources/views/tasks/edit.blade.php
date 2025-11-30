@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit Task - {{ $list->name }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('tasks.update', [$list, $task]) }}" method="POST">
                @csrf @method('PUT')
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

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Prioritas *</label>
                        <select name="priority" class="form-select @error('priority') is-invalid @enderror" required>
                            <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low</option>
                            <option value="medium" {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium</option>
                            <option value="high" {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>High</option>
                        </select>
                        @error('priority')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Deadline</label>
                        <input type="date" name="deadline" class="form-control @error('deadline') is-invalid @enderror" 
                               value="{{ old('deadline', $task->deadline?->format('Y-m-d')) }}">
                        @error('deadline')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('lists.show', $list) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection