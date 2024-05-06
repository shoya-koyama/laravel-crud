@extends('layouts.app')

@section('content')
<h1>報告書の編集</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('reports.update', $report->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">タイトル</label>
        <input type="text" name="title" id="title" class
