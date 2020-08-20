@if(session('correcto'))
    <div class="alert alert-success" style="text-align: center">
        {{  session('correcto') }}
    </div>
@endif