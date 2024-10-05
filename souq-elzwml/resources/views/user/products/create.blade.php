@extends('layouts.app')

@section('create-products')
    
<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="product_name" class="form-label">{{__('Product Name')}}</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('Description')}}</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="summary" class="form-label">{{__('Summary')}}</label>
            <input type="text" class="form-control" id="summary" name="summary"></input>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{__('Price')}}</label>
            <input type="number" class="form-control" id="price" name="price">
        </div>
        <div class="mb-3">
            <label for="images" class="form-label">{{__('Upload Product Images')}}</label>
            <input type="file" class="form-control" id="images" name="images[]" multiple>
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">{{__('Category')}}</label>
            <select name="category_id" id="category_id" class="form-select form-select-lg">
                @foreach ($subCategories as $subCategory)
                    <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn primary-btn">{{__('Add')}}</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">{{__('Cancel')}}</a>
    </form>
</div>
    
@endsection