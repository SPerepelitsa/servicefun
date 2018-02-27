@extends('main')

@section('title', 'Заметки | Редактировать')

@section('content')



    <div class="container">
        <div class="row create-wrap">
            <div class="col-md-8 col-md-offset-2">
                <div class="text-center">
                    <br><br>
                    <h2>Редактировать запись</h2>
                    <p>Отредактируйте нужное поле и нажмите кнопку "Сохранить".</p>
                </div>
                <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data" role="form" class="postForm">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" name="title" class="form-control" placeholder="Введите название поста" value="{{$post->title}}"/>
                    </div>

                    <div class="form-group">
                        <label  for="body">Текст</label>
                        <textarea class="form-control" name="body" rows="10" placeholder="Добавьте ваш текст сюда.">{{$post->body}}</textarea>
                    </div>

                    <div class="form-group">
                        <label  for="image">Прикрепить изображение</label>
                        <input type="file" name="image" class="file" />
                    </div>
                    <br><br>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Сохранить</button>
                    </div>
                </form>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->

    <br><br><br><br>

@endsection
