@extends('primary')
@section('content')
    <main role="main">
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор группы: <br><select name="groupId">
                    @foreach($group as $group)
                        <option value="{{$group->groupId}}">{{$group->name}}</option>
                    @endforeach
                </select></p>
            <p>Введите логин: <br><input type="text" name="login"></p>
            <p>Введите пароль: <br><input type="text" name="password"></p>
            <p>Текст email: <br><input type="email" name="email"></p>
            <button type="submit">Добавить</button>
        </form>
    </main>
@stop
@section('js')
@stop