@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('layouts.headers.cards')

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Mensagens') }}</h3>
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
                                <th scope="col">{{ __('Nome') }}</th>
                                <th scope="col">{{ __('Apelido') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Titulo') }}</th>
                                <th scope="col">{{ __('Mensagem') }}</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
@foreach($messages as $message)
                                <tr>

                                    <td>
                                       {{$message->first_name}}
                                    </td>
                                    <td>
                                        {{$message->last_name}}
                                    </td>
                                    <td>
                                        {{$message->email}}
                                    </td>
                                    <td>
                                        {{$message->title}}
                                    </td>
                                    <td>
                                     {{$message->message}}
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <a class="dropdown-item" href="">{{ __('Edit') }}</a>
                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this user?") }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>

                                                    <a class="dropdown-item" href="">{{ __('Edit') }}</a>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
@endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
