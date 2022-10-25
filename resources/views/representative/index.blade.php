@extends('layouts.master')
@section('content')
<div class="container">
    <br><br><br>

<div id="rep_detail" class="modal">
</div>
            <div class="row">
              <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-7"><h2>Sales team</h2></div>
                        <div class="col-md-5 text-right">
                            <a href="/" class="btn btn-primary btn-sm">Home</a>
                            <a href="{{ route('representative.create') }}" class="btn btn-success btn-sm">Add new</a>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Curent Routes</th>
                                    <th>Actions</th>
                                </tr>
                                @foreach ($representatives as $item)

                                    <tr>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            @if ($item->routes && $item->routes->count() > 0)
                                            <ul>
                                                 @foreach ($item->routes as $route)
                                                    <li>{{ $route->name }}</li>
                                                @endforeach
                                            </ul>
                                            @else
                                                <p>No assigned routes</p>
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-info btn-sm rep-details" data-id="{{ $item->id }}">View</button>
                                            <a class="btn btn-info btn-sm"  href="{{ route('representative.edit', $item) }}">Edit</a>

                                            <form method="POST" action={{ route('representative.destroy', $item) }}" name="delete-item" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" onclick="confirm('Are you sure that you want to delete this Representative?')" class="btn btn-danger btn-sm">
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
@push('scripts')
<script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('.rep-details').on('click', function(){
        $.ajax({
            type: "post",
            url: "{{ route('repDetails') }}",
            data: {'id' : $(this).data('id')},
            dataType: "json",
            success: function (response) {
                $("#rep_detail").html(response.view).modal()
            }
        });
    })
</script>
@endpush
