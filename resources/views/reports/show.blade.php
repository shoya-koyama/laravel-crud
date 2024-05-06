@extends('layouts.app')

@section('content')
<h1>報告書の詳細</h1>

<p>タイトル: {{ $report->title }}</p>
<p>内容:</p>
<pre>{{ $report->content }}</pre>
<p>作成日時: {{ $report->created_at->format('Y-m-d H:i:s') }}</p>
<p>更新日時: {{ $report->updated_at->format('Y-m-d H:i:s') }}</p>

<a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary">編集</a>

@endsection
