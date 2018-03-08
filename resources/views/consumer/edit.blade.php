@extends('primary')
@section('content')
    <main role="main">
        <h1>Редактировать Статью</h1>
        <br>
        <form method="post">
            {!! csrf_field() !!}
            <p>Выбор группы: <br><select name="groupId">
                    @foreach($group as $group)
                        <option value="{{$group->groupId}}">{{$group->name}}</option>
                    @endforeach
                </select></p>
            <p>Редактировать логин: <br><input type="text" name="login"value="{{$consumer->login}}"></p>
            <p>Редактировать пароль: <br><input type="text" name="password"value="{{$consumer->password}}"></p>
            <p>Редактировать email: <br><input type="text" name="email"value="{{$consumer->email}}"></p>
            <button type="submit" class="btn-success" style="cursor: pointer">Изменить</button>
        </form>
    </main>

@stop()