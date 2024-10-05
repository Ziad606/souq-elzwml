@extends('layouts.app')

@section('create-sub-categories')
    <div class="container mt-5">
        <h2>Create New Subcategory</h2>

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

        <form action="{{ route('subCategories.store') }}" method="POST">
            @csrf

            {{-- Name input --}}
            <div class="mb-3">
                <label for="name" class="form-label">Sub-Category Name</label>
                <input type="text" class="form-control" id="name" name="name" 
                    placeholder="Enter category name">
            </div>

            {{-- Description input --}}
            <div class="mb-3">
                <label for="description" class="form-label">Category Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                    placeholder="Enter category description"></textarea>
            </div>
            
            <div class="mb-3">
                <label for="parent_id" class="form-label">Main Category</label>
                <select name="parent_id" id="parent_id" class="form-select form-select-lg">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            {{-- Submit button --}}
            <button type="submit" class="btn primary-btn">Create Category</button>
        </form>
    </div>
@endsection
