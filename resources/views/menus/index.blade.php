@extends('layouts.app')


@section('content')

    <div class="d-flex justify-between my-2">
        <h1 class="text-2xl font-semibold">Menu List</h1>
            <div class="d-flex">
                <a  href="{{ route('menue.create') }}" class="me-3 btn btn-primary btn-sm d-flex align-items-center ">
                    <iconify-icon icon="ic:baseline-add-circle-outline" class="me-2 "></iconify-icon>
                    Add
                </a>
                <a href="{{ route('category.index') }}" class="btn btn-primary btn-sm d-flex align-items-center ">
                    Categoies
                </a>
            </div>
    </div>







    <div class="table-responsive">
        <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Catrgoty</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td ><img class="img-thumbnail " style="max-width: 200px; " src="{{ asset('images/plats/' . $menu->image)}}"  alt="Menu item 1" ></td>
                            <td>{{ $menu->name }}</td>
                            <td>{{ $menu->description }}</td>
                            <td>{{ $menu->price }} $</td>
                            <td>{{ $menu->category->name }}</td>

                            <td>
                                <form action="{{ route('menue.destroy' , $menu) }}" method="POST" >
                                    @csrf
                                    @method('DELETE')
                                    <a  href="{{ route('menue.edit' , $menu) }}" class="btn btn-success">Update</a>
                                    <button type="submit" class="btn btn-danger bg-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
@endsection
