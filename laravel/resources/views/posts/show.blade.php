@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('掲示板') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <h6 class="card-title">
                          投稿者: {{ $post->user->name }}
                        </h6>
                        <p class="card-text">{{ $post->content }}</p>
                      </div>
                    </div>

                    <div class="p-3">
                      <h3 class="card-title">コメント一覧</h3>
                      @foreach($post->comments as $comment)
                      <div class="card m-3">
                        <div class="card-body">
                          <p class="card-text">{{ $comment->comment }}</p>
                          <p class="card-text">投稿者:{{ $comment->user->name }}</p>
                        </div>
                      </div>
                      @endforeach
                    </div>
                    <a href="{{ route('comments.create', ['post_id' => $post->id]) }}" class="btn btn-primary float-right">コメントする</a>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
