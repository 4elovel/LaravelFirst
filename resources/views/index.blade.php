<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<div>
    <a href="{{ url('/addNew') }}" class="btn btn-primary">Add New</a>
</div>
<div>
    @foreach($news as $i)
        <div>
            <h2>{{$i->summary}}</h2>
            <p>{{$i->short_description}}</p>
        </div>
    @endforeach
</div>
