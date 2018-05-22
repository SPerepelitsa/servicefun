@extends('main')

@section('title')
    {{$post->title}}
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="blogs">
                    <div class="text-center">
                        <h2>Заметка</h2>
                        <p>В этом разделе вы можете прочесть заметку целиком, отредактировать, либо удалить заметку.
                        </p>
                        @include('partials._validation_messages')
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">

                    <div class="blog">

                        <h5>{{$post->created_at->format('F j, Y')}}</h5>
                        <img src="/img/posts/{{$post->image}}" class="img-responsive" alt=""/>

                        <h3>{{$post->title}}</h3>

                        <p>{!! $post->body !!}</p>

                    </div>
                    <hr>
                    @if(Auth::user()->isAuthor($post->id))
                        <div class="btn-group" role="group">
                            <a class="btn btn-warning" href="{{route('posts.edit', $post->id)}}" alt="">Редактировать</a>
                            <form method="POST" action="{{route('posts.destroy', $post->id)}}" style="display: inline-block;">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input class="btn btn-danger" type="submit" value="Удалить" onclick='return confirm("Вы уверены, что хотите удалить заметку?");'>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>