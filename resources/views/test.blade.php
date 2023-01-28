

<h1>Hello {{$name}}</h1>

{{--<?php foreach ($books as $book) {?>--}}

{{--    <h1>{{$book}}</h1>--}}

{{--<?php } ?>--}}


@foreach($books as $book)

    <h1>{{$book}}</h1>

@endforeach
