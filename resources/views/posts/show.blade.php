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
                    @if($post->isAuthor(Auth::id()))
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

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="page-header">
                    <h1>
                        <small class="pull-right">{{$amount}} comment(s)</small>
                        Комментарии
                    </h1>
                </div>

                @if($comments->isEmpty())

                    <div class="comments-list">
                        <div class="media">
                            <div class="media-body">
                                <h4 class="media-heading user_name">У данного поста пока нет комментариев.</h4>
                            </div>
                        </div>

                @else
                    @foreach($comments as $comment)

                                <div class="comments-list">
                                    <div class="media">
                                        <p class="pull-right">
                                            <small>{{ $comment->created_at->diffForHumans() }}</small>
                                        </p>
                                        <a class="media-left" href="#">
                                            <img src="http://lorempixel.com/40/40/people/{{mt_rand(1,10)}}/">
                                        </a>
                                        <div class="media-body">

                                            <h4 class="media-heading user_name">{{ $comment->user->name }}</h4>
                                            {{ $comment->body }}

                                            @if($comment->isAuthor(Auth::id()))
                                                <p>
                                                    <small><a href="{{route('comments.edit', $comment->id)}}">Edit</a> -
                                                        <a href="{{route('comments.delete', $comment->id)}}" onclick='return confirm("Вы уверены, что хотите удалить комментарий?");'>Delete</a>
                                                    </small>
                                                </p>
                                            @else
                                                <p class="reply-comment">
                                                    <small><a href="#reply-comment">Ответить</a></small>
                                                </p>
                                                <div class="reply-form">
                                                    <form class="form-horizontal" method="POST" action="{{ route('comments.store', [$post->id]) }}">
                                                        {{ csrf_field() }}

                                                        <div class="form-group">
                                                            <div class="panel-heading">
                                                                <input type="hidden" id="parentId" name="parent_id" value="{{ $comment->id }}">
                                                                <textarea id="comment" class="form-control" placeholder="Введите свой коммент" cols="80" rows="2" name="body" required></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="pull-right">
                                                                <button type="submit" class="btn btn-primary" style="margin-right: 10px; font-size: 12px;">
                                                                    Отправить
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                         @foreach($comment->children as $childComment)

                                        <div class="media" style="margin-left: 60px;">
                                            <p class="pull-right">
                                                <small>{{ $childComment->created_at->diffForHumans() }}</small>
                                            </p>
                                            <a class="media-left" href="#">
                                                <img src="http://lorempixel.com/40/40/people/{{mt_rand(1,10)}}/">
                                            </a>
                                            <div class="media-body">

                                                <h4 class="media-heading user_name">{{ $childComment->user->name }}</h4>
                                                {{ $childComment->body }}

                                                @if($childComment->isAuthor(Auth::id()))
                                                    <p>
                                                        <small>
                                                            <a href="{{route('comments.edit', $childComment->id)}}">Edit</a>
                                                            -
                                                            <a href="{{route('comments.delete', $childComment->id)}}" onclick='return confirm("Вы уверены, что хотите удалить комментарий?");'>Delete</a>
                                                        </small>
                                                    </p>
                                                @else
                                                    <p class="reply-comment">
                                                        <small><a href="#reply-comment">Ответить</a></small>
                                                    </p>
                                                    <div class="reply-form">
                                                        <form class="form-horizontal" method="POST" action="{{ route('comments.store', [$post->id]) }}">
                                                            {{ csrf_field() }}

                                                            <div class="form-group">
                                                                <div class="panel-heading">
                                                                    <input type="hidden" id="parentId" name="parent_id" value="{{ $comment->id }}">
                                                                    <textarea id="comment" class="form-control" placeholder="Введите свой коммент" cols="80" rows="2" name="body" required></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <div class="pull-right">
                                                                    <button type="submit" class="btn btn-primary" style="margin-right: 10px; font-size: 12px;">
                                                                        Отправить
                                                                    </button>
                                                                </div>

                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>

                         @endforeach
                    @endforeach
                @endif

                                </div>
                                <hr>

                                <div class="panel panel-default">
                                    <div class="panel-heading">Оставить комментарий</div>

                                    <div class="panel-body">
                                        <form class="form-horizontal" method="POST" action="{{ route('comments.store', [$post->id]) }}">
                                            {{ csrf_field() }}

                                            <div class="form-group">
                                                <div class="panel-heading">
                                                    <textarea id="comment" class="form-control" placeholder="Введите свой коммент" cols="40" rows="10" name="body" required></textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="pull-right">
                                                    <button type="submit" class="btn btn-primary" style="margin-right: 10px">
                                                        Отправить
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                    </div>
            </div>
        </div>

        @endsection

        @section('scripts')

            <script type="text/javascript">
                $(document).ready(function () {
                    $(".reply-form").hide();
                    $(".reply-comment").click(function () {
                        $(this).nextAll('.reply-form:first').toggle();
                    });
                });
            </script>

@endsection