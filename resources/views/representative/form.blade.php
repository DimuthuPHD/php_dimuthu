<div class="col-md-5 text-left" style="padding-left: 0;">
    <a href="{{ route('representative.index') }}" class="btn btn-warning btn-sm">List</a>
    <a href="/" class="btn btn-primary btn-sm">Home</a>
</div>
<br>
<form action="{{ $route }}" method="{{ $method }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if ($patch == true)
        @method('PATCH')
    @endif
    <div class="form-group">
      <label for="first_name">First Name</label>
      <input type="text" class="form-control" id="email" name="first_name" value="{{ old('first_name', $model->first_name ?? null) }}" placeholder="First Name">
      <div class="error">{{ $errors->first('first_name') }}</div>
    </div>
    <div class="form-group">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $model->last_name ?? null) }}" placeholder="Last Name">
      <div class="error">{{ $errors->first('last_name') }}</div>
    </div>
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" class="form-control" name="email" id="email" value="{{ old('email', $model->email ?? null) }}" placeholder="Email">
      <div class="error">{{ $errors->first('email') }}</div>
    </div>
    <div class="form-group">
      <label for="mobile">Mobile Numbe</label>
      <input type="number" class="form-control" name="mobile" id="mobile" value="{{ old('mobile', $model->mobile ?? null) }}" placeholder="Mobile Number">
      <div class="error">{{ $errors->first('mobile') }}</div>
    </div>
    <div class="form-group">
      <label for="telephone">Telephone Numbe</label>
      <input type="number" name="telephone" class="form-control" id="mobile" value="{{ old('telephone', $model->telephone ?? null) }}" placeholder="Telephone Number">
      <div class="error">{{ $errors->first('telephone') }}</div>
    </div>
    <div class="form-group">
      <label for="joined_date">Joined Date</label>
      <input type="date" name="joined_date" class="form-control" id="joined_date" value="{{ old('joined_date', $model->joined_date ?? null) }}" placeholder="Telephone Number">
      <div class="error">{{ $errors->first('joined_date') }}</div>
    </div>
    <div class="form-group">
      <label for="joined_date">Route</label><br>
      @php
          $my_routes = $model && $model->routes  ? $model->routes->pluck('id')->toArray() : [];
      @endphp
     @foreach ($routes as $route)
     <div class="form-check form-check-inline">
         <input class="form-check-input" type="checkbox" name="routes[]" id="routes{{ $route->id }}" value="{{ $route->id }}"  {{ old('route', in_array($route->id, $my_routes)) == $route->id ? 'checked' : null }}>
         <label class="form-check-label" for="routes{{ $route->id }}">{{ $route->name }}</label>
      </div>
      <div class="error">{{ $errors->first('route') }}</div>
     @endforeach
    </div>
    <div class="form-group">
      <label for="comments">Comments</label>
      <textarea name="" class="form-control" name="comments" id="" cols="30" rows="3">{{ old('comments', $model->comments ?? null) }}</textarea>
      <div class="error">{{ $errors->first('comments') }}</div>
    </div>

    <input type="submit" value="Submit">
    <div class="error">{{ $errors->first() }}</div>
  </form>
