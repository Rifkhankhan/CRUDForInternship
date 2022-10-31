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
                                        <input type="text" name="name" id="" value="{{$student->name}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Age
                                    </th>
                                    <td>
                                        <input type="number" name="age" id="" value="{{$student->age}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Image
                                    </th>
                                    <td>
                                        <input type="file" name="image" id="" value="{{$student->image}}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status
                                    </th>
                                    <td>
                                        <select name="status" id="">
                                            <option value="active" {{ $student->status == 'active' ? 'selected' : '' }}>
                                                Active</option>
                                            <option value="inactive"
                                                {{ $student->status == 'inactive' ? 'selected' : '' }}>
                                                Inactive
                                            </option>

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