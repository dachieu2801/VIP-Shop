@extends('layout.master')
@section('body-class', 'page-categories')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center mb-4">Nhập mã đơn hàng để kiểm tra</h1>
            <form class="d-flex">
                <input type="text" class="form-control me-2" id="inputField" placeholder="Nhập mã đơn hàng">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
