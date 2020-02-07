@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h2>{{ $question->title }}</h2>
                        <div class="ml-auto">
                        <a href="{{ route('questions.index')}}" class="btn btn-outline-secondary">All Question</a>
                        </div>
                    </div>

                </div>
               <div class="card-body">
                    {!! $question->body_html !!}
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
