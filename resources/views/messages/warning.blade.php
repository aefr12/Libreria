@if(session('informacion'))
    <div class="alert alert-warning" style="text-align: center">
        {{  session('informacion') }}
    </div>
@endif