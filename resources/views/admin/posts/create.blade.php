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
        @include('admin.alerts.main')
        <form method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.store') }}">
            @csrf
            <div class="form-group">
                <label for="">Sarlavha</label>
                <input class="form-control" name="title" type="text">
            </div>
            <div class="form-group">
                <label for="">Turkum</label>
                <select class="form-control" name="id_cat" id="">
                    @foreach ($category_list as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Rasm</label>
                <input class="form-control" name="picture" type="file">
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