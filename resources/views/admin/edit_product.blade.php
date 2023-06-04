@extends('admin.layout')

@section('admin_name')
    {{ $user->name }}
@endsection
@section('content')

@include('inc.errors')
@include('inc.success')
 <h1 class="p-relative">Edit Product</h1>


<!-- start add product -->
<div class="m-20 d-grid g-20">
    <div class="p-20 bg-white rad-10">
    <p class="mt-0 mb-10 fs-15 c-gray">update product</p>
<form method="POST" action="{{url("update_product/$product->id")}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
            <!-- inp 1 -->
            <div class="mb-20">
                <label class="d-block fs-14 c-gray mb-10">product Name</label>
                <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="name" id="first" type="text"
                    placeholder="product name" value="{{$product->name}}" >
            </div>
            <!-- inp 2 -->
            <div class="mb-20">
                <label class="d-block fs-14 c-gray mb-10">product description </label>
                <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="desc" type="text"
                    placeholder="product desc" value="{{$product->desc}}" >
            </div>
            <!-- inp 3 -->
            <div class="mb-20">
                <label class="d-block fs-14 c-gray mb-10">product Price </label>
                <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="price" type="number"
                    placeholder="product Price" value="{{$product->price}}">
            </div>
            <!-- inp 4 -->
            <div class="mb-20">
                <label class="d-block fs-14 c-gray mb-10">product quantity </label>
                <input class="brd-none p-10 border-ccc rad-6 d-block w-full" name="quantity" type="text"
                    placeholder="product quantity" value="{{$product->quantity}}" >
            </div>
                <img src="{{asset("storage/$product->image")}}" width="100" alt="" srcset="">
            <!-- inp 5 -->
            <div class="mb-20">
                <label class="d-block fs-14 c-gray mb-10">product image </label>
                <input class="brd-none p-10 border-ccc rad-6 d-block w-full" type="file" name="image" >
            </div>

                <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
</div>

@endsection
