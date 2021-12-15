@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Inicio</h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">{{ __('Banner') }}</th>
                                <th scope="col">{{ __('Title') }}</th>
                                <th scope="col">{{ __('Text') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($page as $pages)
                                <form method='POST' action='{{route('page.update', $pages->id)}}' enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <tr>
                                    <td><input class='w3-input' type="file" name="banner" value="{{$pages->banner }}'"></td>
                                    <td>
                                   <input class='w3-input'type='text' name='title' value='{{$pages->title }}'>



                                    </td>
                                    <td>
                                        <textarea class='w3-input' name='text' type='text'>{{$pages->text }}</textarea>
                                    </td>

                            @endforeach
                                    <td><button type='submit' class='btn btn-primary'>Editar</button></td>
                            </tr>
                            </form>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div><br>

        @include('layouts.footers.auth')
    </div>

@endsection
