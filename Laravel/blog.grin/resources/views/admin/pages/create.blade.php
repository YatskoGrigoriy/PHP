@extends('admin.admin-index')

@section('title','Добавить пост')

@yield('header')

@section('breadcrumb')
    <ol class="breadcrumb">

        <li><a href="{{url('admin-panel/')}}">Home</a></li>
        <li><a href="{{url('admin-panel/create')}}">Posts</a></li>
        <li class="prime-text">HELLO</li>
        <li><a class="navbar-brand" href="http://localhost/admin-panel/">
                <img alt="Brand" src="http://localhost/uploads/logo/logo2.png" width="70px">
            </a></li>

    </ol>
@show


@section('content')


    @if (Session::get('message') != Null)
        <div class="row">
            <div class="col-md-12 centered prime-text">
                {{ Session::get('message') }}
            </div>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-11">
                <div class="form-group">

                    <div class="centered">
                        <nav aria-label="Page navigation centered">
                            {{ $post->links() }}
                        </nav>
                    </div>

                    <div class="table-responsive">
                        <table class="table ">

                            <th class="prime-text">Заголовок</th>
                            <th class="prime-text">Текст</th>
                            <th class="prime-text">Изображение</th>
                            <th class="prime-text">Управление</th>
                            <th class="prime-text">Категория_LEN</th>

                            @foreach($post as $item)

                                <tr>

                                    <td>{!! $item->title !!}</td>
                                    <td>{!! $item->text !!}</td>
                                    <td><img src="http://localhost/{!! $item->file !!}" alt="img" width="100px">
                                    </td>


                                    <td>
                                        {{--Show--}}
                                        <a title="Read article" href="{{ url('admin-panel/'.$item->id) }}"
                                           class="btn btn-primary"><span class="fa fa-newspaper-o"></span></a>

                                        {{--Edit--}}
                                        <a title="Edit article" href="{{ url('admin-panel/'.$item->id.'/edit') }}"
                                           class="btn btn-warning"><span class="fa fa-edit"></span></a>

                                        {{--Delete--}}
                                        <button title="Delete article" type="button" class="btn btn-danger"
                                                data-toggle="modal" data-target="#delete_article_{{ $item->id  }}"><span
                                                    class="fa fa-trash-o"></span></button>

                                    </td>

                                    <td>
                                        @foreach($categories as $art)

                                            {{ $art->title }}

                                        @endforeach
                                    </td>

                                    @endforeach

                                </tr>


                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="col-md-12">


                {{--<div class="input-group ">--}}
                {!! Form::open(['route'=>'admin-panel.store','files' => true]) !!}

                <div class="row">
                    <div class="col-md-1">
                        {!! Form::submit('send form',['class'=>'btn btn-primary btn-sm buttonText']) !!}
                    </div>
                    <div class="col-md-3">
                        {!! Form::file('file', ['class'=>'filestyle btn btn-primary'],null) !!}
                        <script>
                            $(":file").filestyle();
                        </script>
                    </div>
                </div>

                {!! Form::text('title',null,['class'=>'form-control','placeholder' => 'Заголовок']) !!}

                <select name="category_id" class="form-control prime-text">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->title}} </option>
                    @endforeach
                </select>

                {!! Form::text('slug',null,['class'=>'form-control','placeholder' => 'Ярлык']) !!}


                {!! Form::text('video',null,['class'=>'form-control','placeholder' => 'Ютуб']) !!}

                {!! Form::textarea('text',null,['class'=>'form-control ','placeholder' => 'Краткое Описание']) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                {!! Form::label('text', 'Краткое Описание'); !!}
                <script>
                    CKEDITOR.replace('text');
                </script>

                {!! Form::close() !!}

                {{--</div>--}}
            </div>
        </div>


    </div>

    </div>

    {{--//modal--}}

    @foreach($post as $item)
        <div class="modal fade" id="delete_article_{{ $item->id  }}" tabindex="-1" role="dialog"
             aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <form class="" action="{{ route('admin-panel.destroy', ['id' => $item->id]) }}" method="post">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="mySmallModalLabel">Delete article</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>


                        <div class="modal-body">
                            Are you sure to delete article: <b>{{ $item->title }} </b>?

                        </div>
                        <div class="modal-footer">
                            <a href="{{ url('/') }}">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close
                                </button>
                            </a>
                            <button type="submit" class="btn btn-outline" title="Delete" value="delete">Delete</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    @endforeach

@endsection