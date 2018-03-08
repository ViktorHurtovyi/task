@extends('primary')
@section('content')
        <button id="id">Сортировать по id</button>
        <button id="login">Сортировать по login</button>
        <button id="email">Сортировать по email</button>
        <button id="group">Сортировать по group</button>
        <div id="tableId">
            <table>
                <tr>
                    <th>consumerId</th>
                    <th>groupId</th>
                    <th>login</th>
                    <th>password</th>
                    <th>email</th>
                    <th>Действия</th>
                </tr>
                @foreach($consumers as $consumer)
                    <tr>
                        <td>{{$consumer->consumerId}}</td>
                        <td>{{$consumer->groupId}}</td>
                        <td>{{$consumer->login}}</td>
                        <td>{{$consumer->password}}</td>
                        <td>{{$consumer->email}}</td>
                        <td><a href="{!! route('consumer.edit', ['consumerId' => $consumer->consumerId]) !!}">Редактировать</a>||
                            <a href="javascript:;"class="delete" rel="{{$consumer->consumerId}}">Удалить</a></td>
                    </tr>
                @endforeach
            </table>
            {!!$consumers->render()!!}
        </div>
        <div id="tableLogin">
        <table>
            <tr>
                <th>consumerId</th>
                <th>groupId</th>
                <th>login</th>
                <th>password</th>
                <th>email</th>
                <th>Действия</th>
            </tr>
            @foreach($consumerLogin as $consumer)
                <tr>
                    <td>{{$consumer->consumerId}}</td>
                    <td>{{$consumer->groupId}}</td>
                    <td>{{$consumer->login}}</td>
                    <td>{{$consumer->password}}</td>
                    <td>{{$consumer->email}}</td>
                    <td><a href="{!! route('consumer.edit', ['consumerId' => $consumer->consumerId]) !!}">Редактировать</a>||
                        <a href="javascript:;"class="delete" rel="{{$consumer->consumerId}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
            {!!$consumerLogin->render()!!}
        </div>
        <div id="tableEmail">
        <table>
            <tr>
                <th>consumerId</th>
                <th>groupId</th>
                <th>login</th>
                <th>password</th>
                <th>email</th>
                <th>Действия</th>
            </tr>
            @foreach($consumerEmail as $consumer)
                <tr>
                    <td>{{$consumer->consumerId}}</td>
                    <td>{{$consumer->groupId}}</td>
                    <td>{{$consumer->login}}</td>
                    <td>{{$consumer->password}}</td>
                    <td>{{$consumer->email}}</td>
                    <td><a href="{!! route('consumer.edit', ['consumerId' => $consumer->consumerId]) !!}">Редактировать</a>||
                        <a href="javascript:;"class="delete" rel="{{$consumer->consumerId}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
            {!!$consumerEmail->render()!!}
    </div>
        <div id="tableGroup">
        <table>
            <tr>
                <th>consumerId</th>
                <th>groupId</th>
                <th>login</th>
                <th>password</th>
                <th>email</th>
                <th>Действия</th>
            </tr>
            @foreach($consumerGroup as $consumer)
                <tr>
                    <td>{{$consumer->consumerId}}</td>
                    <td>{{$consumer->groupId}}</td>
                    <td>{{$consumer->login}}</td>
                    <td>{{$consumer->password}}</td>
                    <td>{{$consumer->email}}</td>
                    <td><a href="{!! route('consumer.edit', ['consumerId' => $consumer->consumerId]) !!}">Редактировать</a>||
                        <a href="javascript:;"class="delete" rel="{{$consumer->consumerId}}">Удалить</a></td>
                </tr>
            @endforeach
        </table>
            {!!$consumerGroup->render()!!}
        </div>
        <a href="consumer/add">Добавить</a>
    </main>

@stop
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function (){
            $("#tableId").show();
            $("#tableEmail").hide();
            $("#tableLogin").hide();
            $("#tableGroup").hide();
            $("#id").on('click', function () {
                $("#tableEmail").hide();
                $("#tableId").show();
                $("#tableGroup").hide();
                $("#tableLogin").hide();
            });
            $("#login").on('click', function () {
                $("#tableEmail").hide();
                $("#tableId").hide();
                $("#tableGroup").hide();
                $("#tableLogin").show();
            });
            $("#group").on('click', function () {
                $("#tableEmail").hide();
                $("#tableId").hide();
                $("#tableGroup").show();
                $("#tableLogin").hide();
            });
            $("#email").on('click', function () {
                $("#tableEmail").show();
                $("#tableId").hide();
                $("#tableGroup").hide();
                $("#tableLogin").hide();
            });
            });
    </script>
    <script>
            $(document).ready(function () {
                $(".delete").on('click', function () {
                    if (confirm("Вы действительно хотите удалить запись?")) {
                        let id = $(this).attr("rel");
                        $.ajax({
                            type: "DELETE",
                            url: "{!! route('consumer.delete') !!}",
                            data: {_token: "{{csrf_token()}}", id: id},
                            complete: function () {
                                alert("успех");
                                location.reload();
                            },
                            error: function () {
                                alert('неудача');
                            }
                        })
                    } else {
                        alert('Действие отменено');
                    }
                });
            });
    </script>
@stop