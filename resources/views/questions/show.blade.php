@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <div class="d-flex align-items-center">
                            <h2>{{ $question->title }}</h2>
                            <div class="ml-auto">
                            <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary">All Question</a>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="media">
                        {{-- vote Controls start--}}
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">222</span>

                            <a href="" title="This question is not useful" class="vote-down off">
                            <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a href="http://" title="Click to mark as Favorite question (Click again to undo)" class="favorite mt-2 favorited">
                                <i class="fas fa-star fa-2x"></i>
                                <span class="favorite-count"> 123</span>
                            </a>
                        </div>
                        {{-- Vote controls End--}}
                      <div class="media-body">
                        {!! $question->body_html !!}
                        <div class="float-right">
                            <span class="text-muted">
                                Answered {{$question->created_date }}
                                <div class="media mt-2">
                                <a href="{{$question->user->url}}" class="pr-2">
                                <img src="{{ $question->user->avatar}}" alt="" srcset="">
                                </a>
                                <div class="media-bodymt-1">
                                <a href="{{$question->user->url}}"> {{ $question->user->name}}</a>
                                </div>
                                </div>
                            </span>
                        </div>
                   </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>
                            {{$question->answers_count . " " . str_plural('Answer', $question->answers_count)}}
                        </h2>
                        <hr>
                        @foreach ($question->answers as $answer)
                            <div class="media">
                                    {{-- vote Controls start--}}
                        <div class="d-flex flex-column vote-controls">
                            <a href="" title="This is useful" class="vote-up">
                                <i class="fas fa-caret-up fa-3x"></i>
                            </a>
                            <span class="votes-count">222</span>

                            <a href="" title="This answer is not useful" class="vote-down off">
                            <i class="fas fa-caret-down fa-3x"></i>
                            </a>
                            <a href="http://" title="Mark as Best Answer" class="vote-accepted mt-2">
                                <i class="fas fa-check fa-2x"></i>
                                <span class="favorite-count"> 123</span>
                            </a>
                        </div>
                        {{-- Vote controls End--}}
                                <div class="media-body">
                                    {!! $answer->body_html !!}
                                    <div class="float-right">
                                        <span class="text-muted">
                                            Answered {{$answer->created_date }}
                                            <div class="media mt-2">
                                            <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{ $answer->user->avatar}}" alt="" srcset="">
                                            </a>
                                            <div class="media-bodymt-1">
                                            <a href="{{$answer->user->url}}"> {{ $answer->user->name}}</a>
                                            </div>
                                            </div>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
