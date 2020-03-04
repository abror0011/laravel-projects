@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Maqolalar
            <a class="btn btn-sm btn-primary float-right" href="{{route('posts.create')}}">Yaratish</a>
        </h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <th>Sarlavha</th>
                <th width="280px">Amallar</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{route('posts.edit', ['id' => $post->id])}}">O`zgartirish</a>
                        <form method="POST" action="{{route('posts.destroy', ['id' =>$post->id])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger">O`chirish</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection