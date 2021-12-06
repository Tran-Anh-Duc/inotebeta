{{--@extends('backend.layout.master')--}}
{{--    @section('title','Admin')--}}
{{--    @section('content')--}}
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inote Beta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">​


</head>

<body>
<div class="container">
    <a href="#" class="btn btn-success btn-add" data-target="#modal-add" data-toggle="modal">Add</a>
    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            {{-- biến $notes được controller trả cho view
                chứa dữ liệu tất cả các bản ghi trong bảng notes. Dùng foreach để hiển
                thị từng bản ghi ra table này. --}}

            @foreach ($notes as $key=>$note)
                <tr>
                    <td id="{{$note->id}}">{{$key+1}}</td>
                    <td id="name-{{$note->id}}">{{$note->name}}</td>
                    <td id="description-{{$note->id}}">{{$note->description}}</td>

                        <td><button data-url="{{ route('notes.show',$note->id) }}"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button><td>
                       <td> <button data-url="{{ route('notes.update',$note->id) }}"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button></td>
                    <td> <button data-url="{{ route('notes.destroy',$note->id) }}"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
     {{$notes->links()}}
</div>
@include('frontend.notes.add')
@include('frontend.notes.detail')
@include('frontend.notes.edit')

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"
        integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" charset="utf-8">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $('#form-add').submit(function (e) {
            e.preventDefault();

            let url = $(this).attr('data-url');

            $.ajax({
                type: 'post',
                url: url,
                data: {
                    name: $('#name-add').val(),
                    description: $('#description-add').val(),
                },
                success: function(response) {
                    toastr.success(response.message)
                    window.location.reload();
                    $('#modal-add').modal('hide');
                    console.log(response.data)
                    $('tbody').prepend('<tr><td id="'+response.data.id+'">'+response.data.id+'</td>' +
                        '<td id="hoten-'+response.data.id+'">'+response.data.name+'</td>' +
                        '<td id="gioitinh-'+response.data.id+'">'+response.data.description+'</td>' +
                        '<td><button data-url="{{asset('')}}notes/'+response.data.id+'"​ type="button" data-target="#show" data-toggle="modal" class="btn btn-info btn-show">Detail</button></td>' +
                        '<td><button style="margin-left: 5px;" data-url="{{asset('')}}notes/'+response.data.id+'"​ type="button" data-target="#edit" data-toggle="modal" class="btn btn-warning btn-edit">Edit</button></td>' +
                        '<td><button style="margin-left: 5px;" data-url="{{asset('')}}notes/'+response.data.id+'"​ type="button" data-target="#delete" data-toggle="modal" class="btn btn-danger btn-delete">Delete</button></td>' +
                        '</tr>');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })
        $('.btn-show').click(function(){
            let url = $(this).attr('data-url');
            $.ajax({
                type: 'get',
                url: url,
                success: function(response) {
                    console.log(response)

                    $('h1#id').text(response.data.id)
                    $('h1#name').text(response.data.name)
                    $('h1#description').text(response.data.description)
                    $('h1#created_at').text(response.data.created_at)
                    $('h1#update_at').text(response.data.update_at)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })

        $('.btn-delete').click(function(){
            let url = $(this).attr('data-url');
            let _this = $(this);
            if (confirm('ban co chac muon xoa khong?')) {
                $.ajax({
                    type: 'delete',
                    url: url,
                    success: function(response) {
                        toastr.success('Delete note success!')
                        _this.parent().parent().remove();
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        //xử lý lỗi tại đây
                    }
                })
            }
        })

        $('.btn-edit').click(function(e){

            let url = $(this).attr('data-url');

            $('#modal-edit').modal('show');

            e.preventDefault();

            $.ajax({
                //phương thức get
                type: 'get',
                url: url,
                success: function (response) {
                    //đưa dữ liệu controller gửi về điền vào input trong form edit.
                    $('#name-edit').val(response.data.name);
                    $('#description-edit').val(response.data.description);
                    $('#form-edit').attr('data-url','{{ asset('notes/') }}/'+response.data.id)
                },
                error: function (error) {

                }
            })
        })

        $('#form-edit').submit(function(e){
            e.preventDefault();
            let url=$(this).attr('data-url');

            $.ajax({
                type: 'put',
                url: url,
                data: {
                    name: $('#name-edit').val(),
                    description: $('#description-edit').val(),
                },
                success: function(response) {
                    // console.log(response.noteid)
                    window.location.reload();
                    toastr.success(response.message)
                    $('#modal-edit').modal('hide');
                    $('#name-'+response.noteid).text(response.note.name)
                    $('#description-'+response.noteid).text(response.note.description)
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    //xử lý lỗi tại đây
                }
            })
        })


    })
</script>

</body>
</html>
{{--@endsection--}}
