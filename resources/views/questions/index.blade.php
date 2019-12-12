@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    All Questions
                </div>
                <div class="card-body">
                    @foreach ($questions as $question)
                    <div class="media">
                        <div class="media-body">
                        <h3 class="mt-0">{{ $question->title }}</h3>
                        <p>
                            {{ str_limit($question->body, 250)}}
                        </p>
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    <div class="text-center">
                       {{$questions->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
