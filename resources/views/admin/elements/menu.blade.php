<ul class="nav navigation-menu">
    <li>
        <a class="link-out" href="{{route('admin.dashboard')}}"><i class="mdi mdi-home"></i><p>Dashboard</p></a>
    </li>
    @isset($arrMenu)
        @foreach($arrMenu as $menu)
            @if(!isset($menu['nome']))
                @continue
            @endif
            <li class="{{ count($menu['childs']) ? 'has-submenu' : '' }}">
                <a class="{{ count($menu['childs']) ? '' : 'link-out' }} {{ $menu['rota'] ? '' : 'disable' }}" href="{{ (!count($menu['childs']) && $menu['rota']) ? route($menu['rota']) : '#' }}">
                    <i class="{{ $menu['icone'] ?: '' }}"></i><p>{{ $menu['nome'] }}</p>
                </a>
                @if(count($menu['childs']))
                    <ul class="submenu">
                        <li>
                            <ul>
                                @foreach($menu['childs'] as $submenu)
                                    <li><a class="link-out {{ $submenu['rota'] ? '' : 'disable' }}" href="{{ $submenu['rota'] ? route($submenu['rota']) : '#' }}"><p>{{ $submenu['nome'] }}</p></a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                @endif
            </li>
        @endforeach
    @endisset
</ul>