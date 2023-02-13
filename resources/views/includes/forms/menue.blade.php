<div class="container my-5">
    <h1 class="text-center fs-2 mb-3">{{ $formTitle }}</h1>

    <form action="{{ $formAction }}" method="POST" enctype="multipart/form-data">
        @csrf
        @isset($formMethod)
            @method($formMethod)
        @endisset
        <div class="form-group mb-3">
            <label for="name">Name</label>
            <input type="text" value="{{ $menu->name ?? '' }}" name="name" class="form-control" id="name" placeholder="Enter name">
            @error('name')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Error! </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description">Image</label>
            <div class="d-flex justify-betwen align-items-center ">
                <input class="form-control" type="file" name="image" accept="image/png, image/gif, image/jpeg" id="image-admin-id" rows="3" placeholder="Upload  image">
                <img class="img-thumbnail" style="max-width: 200px; max-height: 100px;" id="display-image" src="{{ asset('images/plats/' . ($menu->image ?? 'default.png'))}}" alt="Menu item 1">
            </div>
            @error('image')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Error! </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div >
            <div class="d-flex justify-content-between align-items-center ">
                <div class="form-group w-75">
                    <label for="category_id">Category:</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="??">Loading..</option>
                    </select>
                </div>
                <a class="btn btn-primary mr-2"  data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Add new Category</a>
            </div>
            <div class="form-group w-75">
            @error('category_id')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Data Error! </strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @enderror
        </div>


        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Enter description">{{ $menu->description ?? '' }}</textarea>
            @error('description')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Error! </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div  class="form-group mb-3">
            <label for="price">Price</label>
            <input  type="text" value="{{ $menu->price ?? '' }}" name="price" class="form-control" id="price" placeholder="Enter price">
            @error('price')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Data Error! </strong> {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary bg-info text-white">Submit</button>
        </div>
    </form>
</div>

{{-- modael  --}}
@include('includes.forms.category')






<script src="{{ asset('js/form.js') }}"></script>

