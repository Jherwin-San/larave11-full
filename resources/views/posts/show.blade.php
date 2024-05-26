@extends('layouts.app')

@section('content')
	<div class="card">
		<div class="card-body">
			<h2 class="card-title">{{$post->title}}</h2>
			<p class="card-subtitle text-muted">Author: {{$post->user->name}}</p>
			<p class="card-subtitle text-muted mb-3">Created at: {{$post->created_at}}</p>
			<p class="card-text">{{$post->content}}</p>
			<div class="row">
			<div  class="col-2">
			<p>
				
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-left-text" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
  <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6m0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
</svg> 
<span class="fw-bold px-3">
{{$post->comments->count()}}
</span>
			</p>
			</div>
			<div  class="col-2">
			<p class="fw-bold">
			
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
  <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2 2 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a10 10 0 0 0-.443.05 9.4 9.4 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a9 9 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.2 2.2 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.9.9 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
			</svg>
			<span class="fw-bold px-3">
			{{$post->likes->count()}}
			</span>
		</p>
</div>
			</div>
			@if(Auth::id() != $post->user_id)
			<div class="flex flex-row">
				<form class="d-inline" method="POST" action="/posts/{{$post->id}}/like">
					@method('PUT')
					@csrf
					@if($post->likes->contains("user_id", Auth::id()))
					<button type="submit" class="btn btn-danger">Unlike</button>
					@else
					<button type="submit" class="btn btn-success">Like</button>
					@endif
				</form>
				
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
				Comment
				</button>
				</div>
			@endif
			<div class="mt-3">
				<a href="/posts" class="card-link">View all posts</a>
			</div>
		</div>
	</div>
	<div class="mt-4">
    <h3 class="fw-bold">Comments:</h3>
    @if($post->comments->count() > 0)
        @foreach($post->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <h4 class="text-center fw-semibold card-title" >{{$comment->content}}</h4>
                <div class="text-end">
				<p class="h5 text-dark fw-medium">Posted By: {{$comment->user->name}}</p>
                <p class="fw-light text-muted">Posted on: {{$comment->created_at}}</p>
				</div>
            </div>
        </div>
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif
</div>


	<!-- Bootstrap 5 Modal for comment form -->
<div class="modal  fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Add Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="/posts/{{$post->id}}/comment">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="content" class="form-label">Comment:</label>
                        <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
	



@endsection