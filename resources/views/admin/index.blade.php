@extends('layouts.app')

@section('title', 'Page administateur')

@push('scripts')
    <script src="{{ asset('js/SudoDelete.js') }}"></script>
@endpush


@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
            });
        </script>
    @endif
    <div class="container">
        <h1>Liste des Utilisateurs</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Rôle</th>
                <th>Date d'Inscription</th>
                <th>Dernière connexion </th>
                <th>Supprimer</th>
                <th>Éditer</th>

            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr data-user-id="{{ $user->id }}">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>{{ $user->created_at->format('d-m-Y H\hi') }}</td>
                    <td>{{ $user->lastlogin ? date('d-m-Y H\hi', strtotime($user->lastlogin)) : 'N/A' }}</td>
                    <td>
                        @if ($user->id !== Auth::id())
                            <form action="{{ route('admin.delete', $user->id) }}" method="GET">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger delete-user" data-user-id="{{ $user->id }}">Supprimer</button>
                            </form>
                        @endif
                    </td>
                    <td>
                        @if ($user->id !== Auth::id())
                            <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">Éditer</a>
                        @endif
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
@stack('scripts')


