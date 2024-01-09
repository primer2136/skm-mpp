<!-- resources/views/pertanyaan/show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Pertanyaan {{$pertanyaan->id}}</h1>
    <p>{{$pertanyaan->pertanyaan_text}}</p>
    <form method="POST" action="{{ route('pertanyaan.store', ['layanan_id' => $layanan->id, 'pertanyaan_id' => $pertanyaan->id]) }}">
        @csrf
        <!-- Form untuk jawaban -->
        <input type="text" name="jawaban">
        <button type="submit">Submit</button>
    </form>
@endsection
