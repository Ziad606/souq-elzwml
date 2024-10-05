@extends('layouts.app')

@section('create-categories')
    <div class="container mt-5">
        <h2>Create New Category</h2>

        {{-- Success message --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            {{-- Name input --}}
            <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                    placeholder="Enter category name">
            </div>

            {{-- Description input --}}
            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Enter category description"></textarea>
            </div>

            {{-- Submit button --}}
            <button type="submit" class="btn primary-btn">Create Category</button>
        </form>
    </div>
@endsection
