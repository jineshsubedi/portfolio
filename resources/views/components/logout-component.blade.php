<li class="nav-item">
    <a class="nav-link" role="button" onclick="$('#logout-form').submit()">
        {{$slot}}
    </a>
</li>
<form action="{{route('logout')}}" method="post" id="logout-form">
@csrf
</form>