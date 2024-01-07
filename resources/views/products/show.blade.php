@extends("layouts.app")
@section("main")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 mt-4">
            <div class="card mt-4">
                <p class="p-4">Name: <b>{{ $product->name}}</b></p>
                <p class="p-4">Description: <b>{{ $product->description}}</b></p>
                <img src="/products/{{$product->image}}" class="rounded" width="100%">
            </div>
        </div>
    </div>
</div>

@endsection