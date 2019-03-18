@if(count($errors) >0 )
<ul class="list-group">
    @foreach($errors->all() as $error)
        <li class="list-group text-danger">
            <p class="alert alert-danger">{{ $error }}</p>
        </li>
    @endforeach
</ul>
@endif