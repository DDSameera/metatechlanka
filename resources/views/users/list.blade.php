@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-2">&nbsp;</div>
    <h1>Manage Users</h1>
    @include('alert-notification')
    <table class="table table-striped">
        <thead>
            <th>Name </th>
            <th>Email</th>
            <th>Action</th>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="button-group">
                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-dark">Update Profile</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-sm btn-danger" value="Delete"/>
                            </form>
                         </div>

                    </td>
                </tr>
            @endforeach
                <tr>
                    <td>
                        <div class="col-md-12">
                            {!! $users->links() !!}
                        </div>
                    </td>
                </tr>
        </tbody>


    </table>
</div>
@endsection
