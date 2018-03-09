@extends('primary')
@section('content')
    <a href="{!! route('consumer') !!}">Сортировать по id</a>
    <a href="{!! route('consumerLogin') !!}">Сортировать по login</a>
    <a href="{!! route('consumerEmail') !!}">Сортировать по email</a>
    <a href="{!! route('consumerGroup') !!}">Сортировать по group</a>
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
    <a href="consumer/add">Добавить</a>
@stop
@section('js')
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