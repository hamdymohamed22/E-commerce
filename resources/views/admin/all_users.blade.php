@extends('admin.layout')

@section('admin_name')
    {{ $admin->name }}
@endsection


@section('content')
@include('inc.errors')
@include('inc.success')
<div class="content w-full">
<h1 class="p-relative">All users</h1>
<div class="friends-page d-grid m-20 g-20">
@foreach ($users as $user )
          <div class="friend bg-white rad-6 p-20 p-relative">
            <div class="contact">
              <i class="fa-solid fa-phone"></i>
              <i class="fa-regular fa-envelope"></i>
            </div>
            <div class="text-c">
              <img class="rad-50 mt-10 mb-10 w-100 h-100" src="{{ asset('storage/products/Ndt002pT6am8PxmI0xnvsFfoSufFju79hBHBbI6L.jpg') }}" alt="" />
              <h4 class="m-0">{{ $user->name }} </h4>
              <p class="c-gray fs-13 mt-5 mb-0">{{ $user->email }}</p>
              <p class="c-gray fs-13 mt-5 mb-0">{{ $user->role }}</p>
            </div>

            <div class="info between-flex fs-13">
              <span class="c-gray">{{ $user->created_at }}</span>
              <div class="d-flex ">
                <form action="{{ url("promote/$user->id") }}" method="post">
                    @csrf
                    <button class="bg-blue c-white btn-shape" type="submit">Promote </button>
                </form>
                <form action="{{ url("down/$user->id") }}" method="post">
                    @csrf
                    <button class="bg-red c-white btn-shape" type="submit">Down </button>
                </form>
              </div>
            </div>
          </div>
          @endforeach 
        </div>
      </div>
@endsection