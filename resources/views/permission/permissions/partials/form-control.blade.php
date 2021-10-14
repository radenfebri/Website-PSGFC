<div class="form-group">
    <label for="name">Name</label>
        <input type="text" name="name" id=name" class="form-control" value="{{ old('name') ?? $permission->name }}" placeholder="Permission Name">
</div>
<div class="form-group">
    <label for="name">Guard Name</label>
        <input type="text" name="guard_name" id=guard_name" placeholder='default "web" '
                class="form-control" value="{{ old('guard_name') ?? $permission->guard_name }}">
</div>
<button type="submit" class="btn btn-primary btn-sm">{{ $submit }}</button>
