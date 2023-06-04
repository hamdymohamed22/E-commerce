@extends('admin.layout')

@section('admin_name')
    {{ $user->name }}
@endsection

@section('content')
    @include('inc.errors')
    @include('inc.success')
        <h1 class="p-relative">all products</h1>

<div class="products p-20 bg-white rad-10 m-20">
    <h2 class="mt-0 text-c align-center">products</h2>
    <div class="responsive-table">
        <table class="fs-15 w-full">
            <thead>
                <tr>
                <th >#</th>
                <th >Title</th>
                <th >price</th>
                <th >Quantity</th>
                <th >Desc</th>
                <th >image</th>
                <th >Aciton</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product )
                <tr>
                    <th>{{$loop->iteration}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->desc}}</td>
                    <td><img src="{{asset("storage/$product->image")}}" alt="" srcset=""></td>
                    <td>
                        <div class="d-flex">
                         <form action="{{url("delete/$product->id")}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mr-5">Delete</button>
                        </form>
                        <a class="btn btn-success" href="{{url("edit_product/$product->id")}}">edit</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection