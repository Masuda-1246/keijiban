@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('投稿') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                        @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                    </div>
                    @endif
                    <div class="card">
                      <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST">
                          @csrf
                          <div class="form-group">
                            <div class="exapmleInputEmail1">タイトル<div>
                            <input class="form-control" type="text" id="exapmleInputEmail1" name="title" />
                          </div>

                          <div class="form-group">
                            <div for="comment">内容:</div>
                            <textarea class="form-control" rows=5; id="comment" name="content" ></textarea>
                          </div>

                          <input type="hidden" name="user_id" value="{{Auth::id()}}">
                          <button type="submit" class="btn btn-primary float-right">投稿</button>
                        </form>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
