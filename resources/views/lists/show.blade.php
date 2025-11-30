@extends('layouts.app')

@section('content')
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
                <div class="text-center py-5">
                    <i class="fas fa-tasks fa-4x text-muted mb-3"></i>
                    <h5>Belum ada task</h5>
                    <a href="{{ route('tasks.create', $list) }}" class="btn btn-success mt-3">Tambah Task</a>
                </div>
            @else
                <table class="table">
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
                                    <span class="badge bg-warning">Medium</span>
                                @else
                                    <span class="badge bg-info">Low</span>
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
                                <a href="{{ route('tasks.edit', [$list, $task]) }}" class="btn btn-sm btn-warning">Edit</a>
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
            @endif
        </div>
    </div>
</div>
@endsection