@extends('layouts.admin')

@section('content')
<!-- Basic Card Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">
            Maqolalar
            <a class="btn btn-sm btn-primary float-right" href="{{route('admin.posts.create')}}">Yaratish</a>
        </h6>
    </div>
    <div class="card-body">
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
        @if(session()->has('delete'))
            <div class="alert alert-danger">
                {{session()->get('delete')}}
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <th width="100px">Rasm</th>
                <th>Sarlavha</th>
                <th width="280px">Amallar</th>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>
                        <img class="img img-thumbnail" width="80px" src="{{ '/storage/'.$post->thumb }}" alt="{{ $post->title }}">
                    </td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a href="{{route('admin.posts.show', $post->id)}}" class="btn text-white btn-success btn-sm float-left "><i class="fa fa-eye"></i></>
                        <a class="btn btn-sm btn-warning float-left " href="{{route('admin.posts.edit', ['id' => $post->id])}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form method="POST" action="{{route('admin.posts.destroy', ['id' =>$post->id])}}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection