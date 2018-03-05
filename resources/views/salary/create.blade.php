@extends('main')

@section('title', 'Зарплата | Расчет')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Зарплата</div>

                    @include('partials._validation_messages')

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('salary.store') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="month_num" class="col-md-4 control-label">Месяц</label>

                                <div class="col-md-6">
                                    <select id="month_num" name="month_num" class="form-control" required autofocus>
                                        @foreach($months as $month)
                                            <option value="{{ $month->id}}"> {{ $month->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="user_id" class="col-md-4 control-label">Пользователь</label>

                                <div class="col-md-6">
                                    <select id="user_id" name="user_id" class="form-control" required autofocus>
                                        @foreach($salary_users as $user)
                                            <option value="{{ $user->id }}"> {{ $user->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cashless_payment" class="col-md-4 control-label">Безнал</label>

                                <div class="col-md-6">
                                    <input id="cashless_payment" type="number" class="form-control" name="cashless_payment" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="working_hours_sec" class="col-md-4 control-label">Нормочасы</label>

                                <div class="col-md-6">
                                    <input id="working_hours_sec" type="number" class="form-control" placeholder="Введите количество нормочасов в секундах" name="working_hours_sec" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="assembling" class="col-md-4 control-label">Сборки</label>

                                <div class="col-md-6">
                                    <input id="assembling" type="number" class="form-control" name="assembling" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Расчитать
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