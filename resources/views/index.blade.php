<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div>
    <a style="margin-bottom: 5px;" href="{{ url('/addNew') }}" class="btn btn-primary">Add New</a>
    <a style="margin-bottom: 5px;" href="{{ url('/create-category') }}" class="btn btn-primary">Create Category</a>
    <form method="POST" action="{{ url('/filterNews') }}">
        @csrf

    <p>Filter by category <label for="category"></label>
        <select class="form-control" id="category" name="category"style="width: 15%;display: inline-block;">
            <option value=""></option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select></p>
    <p>Filter by name <label for="name"></label><input type="text" name="name" id="name" /></p>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
</div>
<div>
    @foreach($news as $i)
        <div>
            <a href="/news/{{$i->id}}"><h2>{{$i->summary}}</h2></a>
            <p>{{$i->short_description}}</p>
        </div>
    @endforeach
</div>
