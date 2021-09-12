@extends('layouts.main')

@section('content')

    <div class="container mt-4">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Laravel 8 Results
            </div>
            <div class="card-body">
                <div class="row">
                    <table>
                        <tr>
                            <th>Дата</th>
                            <th>Тема</th>
                            <th>Название</th>
                        </tr>
                        @if($results && sizeof($results))
                            @foreach($results as $result)
                                <tr>
                                    <td>{{$result->datetime}}</td>
                                    <td>{{$result->themeWebinar->theme}}</td>
                                    <td>{{$result->name}}</td>
                                </tr>
                            @endforeach
                        @elseif ($results === false)
                            <tr>
                                <td>По требованию в задаче, Вы должны выбрать от 5 до 10 тем</td>
                            </tr>
                        @else
                            <tr>
                                <td>Нет результата по запрошенным данным!</td>
                            </tr>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection