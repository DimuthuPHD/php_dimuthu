
<table class="table table-bordered">
    <tr>
        <th>Full Name</th>
        <td>{{ $model->first_name. ' ' .$model->last_name }}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{ $model->email }}</td>
    </tr>
    <tr>
        <th>Telephone</th>
        <td>{{ $model->telephone }}</td>
    </tr>
    <tr>
        <th>mobile</th>
        <td>{{ $model->mobile }}</td>
    </tr>
    <tr>
        <th>Joined Date</th>
        <td>{{ $model->joined_date }}</td>
    </tr>
    <tr>
        <th>Curent Routes</th>
       <td>
        @if ($model->routes && $model->routes->count() > 0)
        <ul>
                @foreach ($model->routes as $route)
                <li>{{ $route->name }}</li>
            @endforeach
        </ul>
        @else
            <p>No assigned routes</p>
        @endif
       </td>
    </tr>
</table>
<a href="#" rel="modal:close">Close</a>

