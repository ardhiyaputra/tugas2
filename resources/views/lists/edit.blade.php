@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Edit List</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('lists.update', $list) }}" method="POST">
                @csrf @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Nama List</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                           value="{{ old('name', $list->name) }}" required autofocus>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
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