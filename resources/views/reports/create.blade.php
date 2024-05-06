@extends('layouts.app')

@section('content')
<h1>報告書の新規作成</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('reports.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="content">内容</label>
        <textarea name="content" id="content" class="form-control" rows="10">{{ old('content') }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">作成</button>
</form>

@endsection
