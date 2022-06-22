@extends('layouts.app')

@section('content')
    <div class="container">
        @include('helpers/flash-messages')
        <div class="row">
            <div class="col-6">
                <h1>{{ __('shop.user.index_title') }}</h1>
            </div>
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Imię</th>
            <th scope="col">Nazwisko</th>
            <th scope="col">Numer telefonu</th>
            <th scope="col">Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->phone_number }}</td>
                    <td>
                        <button class="btn btn-danger btm-sm delete" data-id="{{ $user->id }}">
                            X
                        </button>
                    </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        {{ $users->links() }}
    </div>
@endsection
@section('javascript')
    const deleteUrl = "{{ url('users') }}/";
@endsection
@section('js-files')
    <script src="{{ asset('js/delete.js') }}"></script>
@endsection
