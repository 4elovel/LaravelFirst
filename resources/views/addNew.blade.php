<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="POST" action="{{ url('/saveNew') }}">
    @csrf
    <div class="form-group">
        <label for="header">Header:</label>
        <input type="text" class="form-control @error('header') is-invalid @enderror" id="header" name="header" maxlength="50">
        @error('header')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="short_text">Short Text:</label>
        <input type="text" class="form-control @error('short_text') is-invalid @enderror" id="short_text" name="short_text" maxlength="150">
        @error('short_text')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="article">Article:</label>
        <textarea class="form-control @error('article') is-invalid @enderror" id="article" name="article" rows="6" maxlength="5000"></textarea>
        @error('article')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <select class="form-control" id="category" name="category">
            <option value=""></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
