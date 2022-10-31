@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <a href="{{route('home')}}" class="btn btn-secondary">Back</a>
                    <div class="container mt-3">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name
                                    </th>
                                    <td>
                                        <input type="text" name="name" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age
                                    </th>
                                    <td>
                                        <input type="number" name="age" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image
                                    </th>
                                    <td>
                                        <input type="file" name="image" id="">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status
                                    </th>
                                    <td>
                                        <select name="status" id="">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                        </select>
                                    </td>
                                </tr>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection