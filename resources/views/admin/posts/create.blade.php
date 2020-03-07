@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Maqolala qo'shish
        </h6>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>    
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('admin.posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="">Sarlavha</label>
                <input class="form-control" name="title" type="text">
            </div>
            <div class="form-group">
                <label for="">Qisqacha</label>
                <input class="form-control" name="short" type="text">
            </div>
            <div class="form-group">
                <label for="">Maqola</label>
                <textarea name="content" id="" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Saqlash</button>
        </form>
    </div>
</div>
@endsection