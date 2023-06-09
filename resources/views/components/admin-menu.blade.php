@foreach ($menu as $m)
    <li class="nav-item @if(in_array(request()->segment(2), $m['path'])) menu-open @endif">
        <a href="{{$m['url']}}" class="nav-link @if($m['links']) active @elseif ($m['childrens'] && in_array(request()->segment(2), $m['path'])) active  @endif">
            <i class="nav-icon {{$m['icon']}}"></i>
            <p>
                {{$m['label']}}
                @if($m['childrens'])
                <i class="right fas fa-angle-left"></i>
                @endif
            </p>
        </a>
        @if($m['childrens'])
        <ul class="nav nav-treeview">
            @foreach ($m['childrens'] as $child)
                <li class="nav-item">
                    <a href="{{ $child['url'] }}" class="nav-link @if($child['links']) active @endif">
                        <i class="{{$child['icon']}} nav-icon"></i>
                        <p>{{ $child['label'] }}</p>
                    </a>
                </li>
            @endforeach
        </ul>
        @endif
    </li>
@endforeach