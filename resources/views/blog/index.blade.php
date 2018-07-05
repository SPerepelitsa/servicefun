@extends('main')

@section('title', 'Блог')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="blogs">
                    <div class="text-center">
                        <h2>Блог</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Cras suscipit arcu<br> vestibulum
                            volutpat libero sollicitudin vitae Curabitur ac aliquam <br>
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
            <div class="col-md-8">
                <div class="page-header">

                    <div class="blog">

                        @foreach($posts as $post)
                            <h5>{{$post->created_at->format('F j, Y')}}</h5>
                            <img src="/img/posts/{{$post->image}}" class="img-responsive" alt=""/>

                            <h3>{{$post->title}}</h3>

                            <p>{!! substr($post->body, 0,600) !!} {{strlen($post->body) > 300 ? " ..." : "" }}</p>

                        <div class="text-center">
                            <div class="col-md-4  author">
                                    <p>Автор: {{$post->user->name}}</p>
                            </div>
                            <div class="col-md-4  author">

                            </div>

                            <div class="col-md-4  author">
                                <p>Комментариев:{{ count($post->comments) }}</p>
                            </div>
                        </div>
                            <div class="ficon">
                              <a href="{{route('posts.show', $post->slug)}}" alt="">Читать полностью</a>
                            </div>
                            <hr>

                        @endforeach
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="pag-links">
                            {!! $posts->links() !!} <!-- pagination (links - default method for pagination, we can also use render method) -->
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <form class="form-search">
                    <input class="form-control" type="text" placeholder="Search..">
                </form>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Popular Posts</strong>
                    </div>
                    <div class="panel-body">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="img/b.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Kelly Hidayah</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore
                                </p>
                                <div class="ficon">
                                    <a href="#" alt="">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="img/a.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Kelly Hidayah</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore
                                </p>
                                <div class="ficon">
                                    <a href="#" alt="">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="img/c.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Kelly Hidayah</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore
                                </p>
                                <div class="ficon">
                                    <a href="#" alt="">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="media">
                            <a class="media-left" href="#">
                                <img src="img/d.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Kelly Hidayah</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh
                                    euismod tincidunt ut laoreet dolore
                                </p>
                                <div class="ficon">
                                    <a href="#" alt="">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


