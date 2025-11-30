@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0">My To-Do Lists</h4>
            <a href="{{ route('lists.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Buat List
            </a>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($lists->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-list-ul fa-4x text-muted mb-3"></i>
                    <h5>Belum ada list</h5>
                    <a href="{{ route('lists.create') }}" class="btn btn-primary mt-3">Buat List Pertama</a>
                </div>
            @else
                <div class="row">
                    @foreach($lists as $list)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5><i class="fas fa-folder text-primary"></i> {{ $list->name }}</h5>
                                <p class="text-muted">
                                    <i class="fas fa-tasks"></i> {{ $list->tasks_count }} Tasks
                                </p>
                                <div class="btn-group w-100">
                                    <a href="{{ route('lists.show', $list) }}" class="btn btn-sm btn-primary">Lihat</a>
                                    <a href="{{ route('lists.edit', $list) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('lists.destroy', $list) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@endsection