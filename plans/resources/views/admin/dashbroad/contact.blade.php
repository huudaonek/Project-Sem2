@extends('layout.dashbroad')
@section('body')
@foreach($contacts as $contact)
    <p>Name: {{ $contact->name }}</p>
    <p>Email: {{ $contact->email }}</p>
    <p>Message: {{ $contact->message }}</p>
@endforeach
@endsection
