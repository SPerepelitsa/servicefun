@extends('main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Редактировать комментарий</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('comments.update', [$comment->id]) }}">
                            {{ method_field('PUT') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <div class="panel-heading">
                                    <textarea id="comment" type="text" class="form-control" cols="40" rows="10" name="body" required>{{ $comment->body }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">
                                        Сохранить
                                    </button>
                                    <a href="{{ URL::previous() }}" class="btn btn-primary btn-lg" role="button" style="margin-right: 10px">Отмена</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection