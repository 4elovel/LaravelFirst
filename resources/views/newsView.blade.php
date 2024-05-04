<div>
    <h2>{{$news->summary}}</h2>
    <p>{{$news->short_description}}</p>
    <p>{{$news->full_text}}</p>
    <div>
        @if(session('email')!= null)
            <form id="commentForm" method="POST" action="/comment/{{$news->id}}">
                @csrf
                <textarea name="comment" id="comment" rows="3" placeholder="Enter your comment"> </textarea>
                <button type="submit">Add Comment</button>
            </form>
            <div id="comments">
                @foreach($comments as $i)
                     <div> {{$i->created_at}} <h3>{{$i->comment}}</h3></div>
                @endforeach
            </div>
        @else
            <div><a href="/">Login</a> to see or leave comments</div>
        @endif
    </div>
</div>

