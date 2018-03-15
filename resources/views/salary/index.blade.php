@extends('main')

@section('title', 'Зарплата | Итог')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="salary-total">
                    <h2 class="text-center">Общий отчет по зарплате</h2>
                    <hr>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Сотрудник</th>
                                <th scope="col">Месяц</th>
                                <th scope="col">Нормочасы/грн</th>
                                <th scope="col">Сбоки/грн</th>
                                <th scope="col">Б/Н грн</th>
                                <th scope="col">Сумма/грн</th>
                                <th scope="col">Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($salaryAll as $salary)
                                <tr>

                                    <th scope="row">{{$salary->user->name}}</th>
                                    <td>{{$salary->month->name}}</td>
                                    <td>{{$salary->working_hours}}</td>
                                    <td>{{$salary->assembling}}</td>
                                    <td>{{ $salary->cashless_payment}}</td>
                                    <td>{{$salary->total}}</td>
                                    <td class="text-center">
                                        <a href="" class="glyphicon glyphicon-pencil"></a>
                                        <a href="" class="glyphicon glyphicon-remove"></a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>

@endsection
