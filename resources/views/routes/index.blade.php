@extends('layouts.master')
@section('content')
<div class="container">
    <br><br><br>
            <div class="row">

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-7"><h2>Routes</h2></div>
                        <div class="col-md-5 text-right">
                            <a href="/" class="btn btn-primary btn-sm">Home</a>
                            <a href="{{ route('route.create') }}" class="btn btn-success btn-sm">Add new</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Route Name</th>
                                    <th>Status</th>
                                    {{-- <th>Curent Route</th> --}}
                                    <th>Actions</th>
                                </tr>
                                @foreach ($routes as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status == 1 ? 'Active' : 'Disabled' }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm"  href="{{ route('route.edit', $item) }}">Edit</a>

                                            <form method="POST" action={{ route('route.destroy', $item) }}" name="delete-item" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="confirm('Are you sure that you want to delete this route?')" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
              </div>


              </div>
            </div>
</div>
@endsection
