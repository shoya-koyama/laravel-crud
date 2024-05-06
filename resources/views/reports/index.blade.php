@extends('layouts.app')

@section('content')
<h1>報告書一覧</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($reports->isEmpty())
    <p>報告書はまだ作成されていません。</p>
@else
    <table class="table table-striped">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>作成日時</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td><a href="{{ route('reports.show', $report->id) }}">{{ $report->title }}</a></td>
                    <td>{{ $report->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a href="{{ route('reports.edit', $report->id) }}" class="btn btn-primary btn-sm">編集</a>
                        <form action="{{ route('reports.destroy', $report->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('本当に削除しますか？')">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

<a href="{{ route('reports.create') }}" class="btn btn-success">新規作成</a>

@endsection
