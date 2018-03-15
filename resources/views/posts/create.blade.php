@extends('main')

@section('title', 'Заметки | Создать Пост')

@section('content')


        <div class="container">
            <div class="row create-wrap">
                <div class="col-md-8 col-md-offset-2">
                    <div class="text-center">
                        <br><br>
                        <h2>Создать запись</h2>
                        <p>Пожалуйста заполните все поля формы и нажмите кнопку "Создать".</p>
                        @include('partials._validation_messages')
                    </div>
                    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" role="form" class="postForm">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text" name="title" class="form-control" placeholder="Введите название поста"/>
                        </div>

                        <div class="form-group">
                            <label  for="body">Текст</label>
                            <textarea class="form-control" name="body" rows="5" placeholder="Добавьте ваш текст сюда."></textarea>
                        </div>

                        <div class="form-group">
                            <label  for="image">Прикрепить изображение</label>
                            <input type="file" name="image" class="file" />
                        </div>
                        <br><br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Создать пост</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--/.row-->
        </div>
        <!--/.container-->

    <br><br><br><br>

@endsection


