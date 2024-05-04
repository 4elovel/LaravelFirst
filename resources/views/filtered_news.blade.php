<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered News</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container mt-5">
    <h1>Filtered News</h1>
    <div>
        <a href="{{ url('/addNew') }}" class="btn btn-primary mb-3">Add New</a>
        <form method="POST" action="{{ route('filterNews') }}">
            @csrf
            <div class="form-group">
                <label for="category">Filter by category</label>
                <select class="form-control" id="category" name="category">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name">Filter by name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
    </div>
    <div>
        @if($filtered_news->isEmpty())
            <p>No news found.</p>
        @else
            @foreach($filtered_news as $news)
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/news/{{ $news->id }}">{{ $news->summary }}</a></h5>
                        <p class="card-text">{{ $news->short_description }}</p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
</body>
</html>
