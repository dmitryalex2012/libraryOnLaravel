
@extends('./layouts.app')

@section('content')
{{--    <h2>{{$message}}</h2>--}}
{{gettype($message)}}
<h2><?php print_r($message) ?></h2>
@endsection