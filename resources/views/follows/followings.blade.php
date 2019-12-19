<table>
    @foreach($users as $user)
        @include('users._card')
    @endforeach
</table>