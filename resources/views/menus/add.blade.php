@extends('layouts.app')

@section('header')
    <h1 class="text-2xl font-semibold">Menu List</h1>
@endsection

@section('content')
    <div class="container  my-5">
        <h1 class="text-center fs-2 mb-3">Add Menu Item</h1>
        <form action="{{ route('menue.store') }}" method="POST" class="container text-center">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter price">
            </div>
            {{-- <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" class="form-control-file" id="image">
            </div> --}}
            <div class="text-center">
                <button type="submit " class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>

    @endsection

