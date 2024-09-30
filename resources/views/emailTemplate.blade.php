@extends('Components.layout')

@section('content')
    <!--SECTION OF FORM  -->
        <p><b>Name: </b>{{ $dataReceived['name'] }}</p>
        <p><b>Email: </b>{{ $dataReceived['email'] }}</p>
        <p><b>Subject: </b>{{ $dataReceived['subject'] }}</p>
        <p><b>Message: </b>{{ $dataReceived['message'] }}</p>
    <!--END OF SECTION OF FORM  -->
@endsection