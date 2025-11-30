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

    .table {
        margin-bottom: 0;
    }

    .table thead th {
        border-bottom: 2px solid #e5e5e5;
    }

    .table tbody tr {
        transition: 0.15s ease;
    }

    .table tbody tr:hover {
        background: #f9f9f9;
    }

    .badge {
        font-size: 0.85rem;
        font-weight: 500;
    }

    .empty-state {
        text-align: center;
        padding: 60px 0;
        color: #777;
    }
</style>

<div class="container">
    <div class="mb-3">
        <a href="{{ route('lists.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali
        </a>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-0"><i class="fas fa-folder"></i> {{ $list->name }}</h4>
            <a href="{{ route('tasks.create', $list) }}" class="btn btn-success">
                <i class="fas fa-plus"></i> Tambah Task
            </a>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($tasks->isEmpty())
                <div class="empty-state">
                    <i class="fas fa-tasks fa-4x text-muted mb-3"></i>
                    <h5>Belum ada task</h5>
                    <a href="{{ route('tasks.create', $list) }}" class="btn btn-success mt-3">
                        <i class="fas fa-plus"></i> Tambah Task
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th width="50">Status</th>
                                <th>Task</th>
                                <th>Prioritas</th>
                                <th>Deadline</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr class="{{ $task->isCompleted() ? 'table-success' : '' }}">
                                <td>
                                    <form action="{{ route('tasks.toggle', [$list, $task]) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm {{ $task->isCompleted() ? 'btn-success' : 'btn-outline-secondary' }}">
                                            <i class="fas fa-{{ $task->isCompleted() ? 'check-circle' : 'circle' }}"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    <strong class="{{ $task->isCompleted() ? 'text-decoration-line-through' : '' }}">
                                        {{ $task->name }}
                                    </strong>
                                    @if($task->description)
                                        <br><small class="text-muted">{{ $task->description }}</small>
                                    @endif
                                </td>
                                <td>
                                    @if($task->priority == 'high')
                                        <span class="badge bg-danger">High</span>
                                    @elseif($task->priority == 'medium')
                                        <span class="badge bg-warning text-dark">Medium</span>
                                    @else
                                        <span class="badge bg-info text-dark">Low</span>
                                    @endif
                                </td>
                                <td>
                                    @if($task->deadline)
                                        {{ $task->deadline->format('d M Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('tasks.edit', [$list, $task]) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('tasks.destroy', [$list, $task]) }}" method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin hapus?')">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
