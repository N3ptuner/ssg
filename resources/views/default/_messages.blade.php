<div class="messages">
@if (session()->has('info'))
    <ul>
        {{ session()->get('info') }}
    </ul>
@endif
</div>