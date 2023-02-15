@extends('layouts.app')


@section('content')

    <div class="d-flex justify-between my-2">
        <h1 class="text-2xl font-semibold">Menu List</h1>
            <div class="d-flex h-25">
                <a  href="{{ route('menue.create') }}"  class="me-2 btn btn-primary btn-sm d-flex align-items-center ">
                    <iconify-icon icon="ic:baseline-add-circle-outline" class="me-2 "></iconify-icon>
                    Add
                </a>
                <a href="{{ route('category.destroyAll') }}" class="btn btn-danger me-2 btn-sm d-flex align-items-center ">
                    Delete All
                </a>
                <a href="{{ route('menue.index') }}" class="btn btn-primary btn-sm d-flex align-items-center ">
                    Menue
                </a>
            </div>
    </div>



    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Action Error! </strong> {{  session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Action Success! </strong> {{  session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif





<table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->name }}</td>
            <td>{{ $category->description }}</td>
            <td>
                <form action="{{ route('category.destroy' , $category) }}" method="POST" >
                    @csrf
                    @method('DELETE')
                    <a  href="{{ route('category.edit' , $category) }}" class="btn btn-success">Update</a>
                    <button type="submit" class="btn btn-danger bg-danger">Delete</button>
                </form>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>





@endsection
