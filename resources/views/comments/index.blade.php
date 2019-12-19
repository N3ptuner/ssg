@if(isset($test))
    @for($i=1;$i<=$test;++$i)
        '-'
    @endfor
    </br>
    @if($test<10)
        @php
            $test = $test + 1;
        @endphp
        @include('comments.index')
    @endif
@endif