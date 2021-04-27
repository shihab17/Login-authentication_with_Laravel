@if(count($errors) > 0)
    @foreach($errors->all() as $e)
        <div class='alert alert-danger'>
            {{ $e }}   
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class='alerrt alert-success'>
        {{ session('success') }}
    </div>
@endif


@if(session('error'))
    <div class='alerrt alert-success'>
        {{ session('error') }}
    </div>
@endif