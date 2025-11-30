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

    .list-item {
        background: #fafafa;
        border: 1px solid #ebebeb;
        padding: 14px 18px;
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: 0.15s ease;
    }

    .list-item:hover {
        background: #f0f0f0;
        border-color: #dcdcdc;
    }

    .list-name {
        font-size: 16px;
        font-weight: 600;
        margin: 0;
        color: #111;
    }

    .list-name a {
        text-decoration: none;
        color: inherit;
    }

    .list-name a:hover {
        text-decoration: underline;
    }

    .menu-wrapper {
        position: relative;
    }

    .menu-btn {
        background: transparent;
        border: none;
        font-size: 22px;
        cursor: pointer;
        padding: 4px 8px;
        color: #333;
        border-radius: 6px;
    }

    .menu-btn:hover {
        background: #e9ecef;
    }

    .menu-dropdown {
        display: none;
        position: absolute;
        right: 0;
        top: 30px;
        background: white;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        min-width: 130px;
        z-index: 10;
        padding: 6px 0;
    }

    .menu-dropdown .dropdown-item {
        display: block;
        padding: 8px 15px;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        text-decoration: none;
        white-space: nowrap;
        border: none;
        background: none;
        width: 100%;
        text-align: left;
    }

    .menu-dropdown .dropdown-item:hover {
        background: #f5f5f5;
    }

    .menu-dropdown .text-danger:hover {
        background: #ffe5e5;
    }

    .empty-state {
        text-align: center;
        padding: 60px 0;
        color: #777;
    }
</style>

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
                <div class="empty-state">
                    <i class="fas fa-list-ul fa-4x mb-3 text-muted"></i>
                    <h5 class="mb-1">Belum ada list</h5>
                    <p class="text-muted mb-3">Buat list pertama kamu.</p>
                    <a href="{{ route('lists.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Buat List
                    </a>
                </div>
            @else

                <div class="d-flex flex-column gap-2">
                    @foreach($lists as $list)

                    <div class="list-item">
                        <div>
                            <h6 class="list-name">
                                <a href="{{ route('lists.show', $list) }}">
                                    {{ $list->name }}
                                </a>
                            </h6>
                            <small class="text-muted">{{ $list->tasks_count }} tasks</small>
                        </div>

                        <div class="menu-wrapper">
                            <button class="menu-btn">⋮</button>

                            <div class="menu-dropdown">

                                <a href="{{ route('lists.edit', $list) }}" class="dropdown-item">
                                    Edit
                                </a>

                                <form action="{{ route('lists.destroy', $list) }}" method="POST"
                                      onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="dropdown-item text-danger">Hapus</button>
                                </form>

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

@section('scripts')
<script>
    document.addEventListener('click', function(e) {

        const isMenuButton = e.target.matches('.menu-btn');
        const dropdown = e.target.nextElementSibling;

        document.querySelectorAll('.menu-dropdown').forEach(menu => {
            if (menu !== dropdown) {
                menu.style.display = 'none';
            }
        });

        if (isMenuButton) {
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        } else {
            document.querySelectorAll('.menu-dropdown').forEach(menu => {
                menu.style.display = 'none';
            });
        }
    });
</script>
@endsection
