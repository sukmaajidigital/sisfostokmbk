@extends('layouts.app')
@section('title', 'user')
@section('content')
    @include('components.createmodalbutton', [
        'route' => route('user.create'),
        'label' => 'Add User Baru',
    ])
    <table id="example" class="table table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Username</th>
                <th>email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama_user }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @if ($user->role == 1)
                            admin
                        @elseif ($user->role == 2)
                            Owner
                        @elseif ($user->role == 3)
                            Petugas
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        @include('components.editmodalbutton', [
                            'route' => route('user.edit', $user->id),
                            'label' => 'Edit User',
                        ])
                        @include('components.deletebutton', [
                            'route' => route('user.destroy', $user->id),
                            'confirmationMessage' => 'Are you sure you want to delete this item?',
                            'label' => 'Delete',
                        ])
                    </td>
            @endforeach
        </tbody>
    </table>
    @include('components.modal', [
        'edittitle' => 'Edit User',
        'createtitle' => 'Tambah User',
    ])
@endsection
@include('components.script')
