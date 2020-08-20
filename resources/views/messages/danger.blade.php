@if(session('peligro'))
    <div class="alert alert-danger" style="text-align: center">
        {{  session('peligro') }}
    </div>
@endif