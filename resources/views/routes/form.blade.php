<div class="col-md-5 text-left" style="padding-left: 0;">
    <a href="{{ route('route.index') }}" class="btn btn-warning btn-sm">List</a>
    <a href="/" class="btn btn-primary btn-sm">Home</a>
</div>
<br>
<form action="{{ $route }}" method="{{ $method }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    @if ($patch == true)
        @method('PATCH')
    @endif
    <div class="form-group">
      <label for="name">Route Name</label>
      <input type="text" class="form-control" id="email" name="name" value="{{ old('name', $model->name ?? null) }}" placeholder="First Name">
      <div class="error">{{ $errors->first('name') }}</div>
    </div>

    <div class="form-group">
        <label for="name">Status</label><br>
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="active" value="1" {{ $model && $model->status == 1 ? 'checked' : null }}>
        <label class="form-check-label" for="active">Active</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="disabled" value="0"  {{ $model && $model->status == 0 ? 'checked' : null }}>
        <label class="form-check-label" for="disabled">Disable</label>
      </div>
      <div class="error">{{ $errors->first('status') }}</div>
    </div>
    <input type="submit" value="Submit">
  </form>
