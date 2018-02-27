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
                    {{--<div class="blog">--}}
                        {{--<h5>February,22 2015</h5>--}}
                        {{--<img src="img/01.jpg" class="img-responsive" alt=""/>--}}

                        {{--<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod--}}
                            {{--tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam,quis--}}
                            {{--nostrud exerci tation ullamcorper suscipit lobortis nisl ut--}}
                            {{--aliquip ex ea commodo consequat.</p>--}}

                        {{--<h3>Право на нахуй. Нецензурный пост.</h3>--}}

                        {{--<p>Одно из главных прав человеческих – право на нахуй. Возможность сказать с чувством, от души:--}}
                            {{--«Да пааашол ты НАХУЙ!!!!» собственно и делает нас людьми, то есть автономными субъектами--}}
                            {{--бытия. Реализуя право на нахуй, мы отделяем себя от Вселенной, объективируем собственный--}}
                            {{--микрокосм, и проводим демаркационную линию: вот мы - стоим. Вот они - идут. Нахуй.</p>--}}

                        {{--<p>Право на нахуй – это гарант внутренней свободы и мерило самоценности. Первое, что отбирает у--}}
                            {{--человека тоталитаризм любого рода – это право на нахуй, остальные права после этого засыхают--}}
                            {{--и сами отваливаются. Нет большего унижения, чем не иметь возможности послать кого-то нахуй,--}}
                            {{--когда очень хочется. Если стоит перед тобой некое воплощенное мудило, городит всякую обидную--}}
                            {{--хуйню, а ты его даже нахуй послать не можешь – из политкорректности ли, из субординации или--}}
                            {{--из банального страха, - это хуже, чем сапогом по яйцам. Всякие стрессы, расстройства психики--}}
                            {{--и желудка, гастриты с язвами и бытовое пьянство, присущие нашему времени, происходят именно--}}
                            {{--от того, что мы право свое коренное - право на нахуй, - часто реализовать не можем. От этого--}}
                            {{--организм расстраивается и физиология нарушается.</p>--}}

                        {{--<p>Вся история человечества – это борьба за право на нахуй. Территории, ресурсы, деньги и прочая--}}
                            {{--странная хуйня – вторичны. Издревле, вольные славянские народы славились своим непоколебимым--}}
                            {{--нахуем, и за то пользовались большим уважением. Приходили к ним, скажем, какие-нибудь хазары--}}
                            {{--и начинали дань требовать, а навстречу князь выходит с дружиною, и говорит этак уверенно и--}}
                            {{--протяжно: «Да пошли вы нахуй, хазары!» - и те шли, осознавая по пути, что были неправы. Даже--}}
                            {{--гордый Царьград и тот опасался русского нахуя: хошь, злата-серебра давали, хошь принцессу--}}
                            {{--замуж – только нахуй на посылайте! Как вы думаете, что было написано на щите Вещего Олега,--}}
                            {{--который он им к воротам прихуячил? От так-то…--}}
                            {{--Конечно, получалось не всегда. Когда вместо хазар пришли монголы, и сказали: «Выдайте нам--}}
                            {{--половцев, конюхов наших», князья, по древней русской традиции весело ответили: «Да пошли вы--}}
                            {{--нахуй, монголы!» Но монголы, нимало не смутившись, ответили: «А пошли вы сами нахуй,--}}
                            {{--князья!» Не ожидавшие такого ответа князья растерялись, и тут-то монгольский степной нахуй--}}
                            {{--оказался покрепче славянского. Вот так Русь впервые лишилась своего волшебного нахуя, от--}}
                            {{--чего и произошли все дальнейшие беды нашей многострадальной Родины. </p>--}}
                        {{--<div class="ficon">--}}
                            {{--<a href="#" alt="">Learn more</a>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="blog">

                        @foreach($posts as $post)
                            <h5>{{$post->created_at->format('F j, Y')}}</h5>
                            <img src="img/posts/{{$post->image}}" class="img-responsive" alt=""/>

                            <h3>{{$post->title}}</h3>

                            <p>{!! substr($post->body, 0,600) !!} {{strlen($post->body) > 300 ? " ..." : "" }}</p>


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


