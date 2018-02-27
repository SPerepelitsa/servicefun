
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><span>Service-Fun</span></a>
        </div>
        <div class="navbar-collapse collapse">
            <div class="menu">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="{{Request::is('/') ? "active" : ""}}"><a href="{{asset('/')}}">Главная</a></li>
                    <li class="{{Request::is('blog') ? "active" : ""}}" role="presentation"><a href="{{route('blog.index')}}">Блог</a></li>
                    <li class="{{Request::is('posts/create') ? "active" : ""}}" role="presentation"><a href="{{route('posts.create')}}">Заметки</a></li>
                    <li class="{{Request::is('gallery') ? "active" : ""}}" role="presentation"><a href="{{route('gallery')}}">Галерея</a></li>
                    <li role="presentation"><a href="{{route('home')}}">Зарплата</a></li>

                    @if(Auth::check())

                    <li role="presentation" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="margin-left: 50px;">{{ Auth::user()->name }}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li ><a href="">Профиль</a></li>
                            <li><a href="">Мои заметки</a></li>
                            <li><a href="">Сообщения</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ route('logout') }}">Выход</a></li>
                        </ul>
                    </li>
                </ul>

                @else

                    <li role="presentation" style="margin-left: 50px;"><a href="{{route('login')}}">Вход</a></li>
                    <li role="presentation"><a href="{{route('register')}}">Регистрация</a></li>

                @endif
            </div>
        </div>
    </div>
</nav>