@extends('layouts.app')

@section('content')

<style>
    body {
        background: #f5f6f8 !important;
        font-family: "Inter", sans-serif;
        color: #333;
    }

    .form-wrapper {
        max-width: 520px;
        margin: 40px auto;
    }

    .form-card {
        background: #ffffff;
        border-radius: 14px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        overflow: hidden;
    }

    .form-header {
        padding: 20px 24px;
        background: #fafafa;
        border-bottom: 1px solid #e1e1e1;
    }

    .form-header h4 {
        margin: 0;
        font-weight: 600;
        font-size: 18px;
    }

    .form-body {
        padding: 26px;
    }

    .input-group-custom {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .input-group-custom label {
        font-size: 14px;
        margin-bottom: 6px;
        color: #666;
    }

    .input-group-custom input {
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        background: #fafafa;
        transition: all 0.2s ease;
    }

    .input-group-custom input:focus {
        border-color: #8a8a8a;
        background: #fff;
    }

    .error-text {
        margin-top: 6px;
        color: #d9534f;
        font-size: 13px;
    }

    .form-actions {
        display: flex;
        justify-content: space-between;
        margin-top: 8px;
    }

    .btn-cancel {
        padding: 10px 20px;
        border: 1px solid #bbb;
        background: #f2f2f2;
        border-radius: 8px;
        color: #555;
        text-decoration: none;
        transition: 0.2s;
    }

    .btn-cancel:hover {
        background: #e8e8e8;
    }

    .btn-submit {
        padding: 10px 20px;
        border-radius: 8px;
        background: #333;
        color: #fff;
        border: none;
        font-weight: 600;
        transition: 0.2s;
    }

    .btn-submit:hover {
        background: #000;
    }
</style>


<div class="form-wrapper">
    <div class="form-card">
        <div class="form-header">
            <h4>Edit List</h4>
        </div>

        <div class="form-body">
            <form action="{{ route('lists.update', $list) }}" method="POST">
                @csrf 
                @method('PUT')

                <div class="input-group-custom">
                    <label>Nama List</label>
                    <input type="text" name="name" 
                           value="{{ old('name', $list->name) }}"
                           class="@error('name') is-invalid @enderror"
                           required autofocus>

                    @error('name')
                        <p class="error-text">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="{{ route('lists.show', $list) }}" class="btn-cancel">Batal</a>
                    <button type="submit" class="btn-submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
