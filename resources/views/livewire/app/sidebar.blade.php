<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
        <div class="list-group list-group-flush mx-3 mt-4">
            <a href="/" class="list-group-item list-group-item-action py-2 ripple @if(Route::currentRouteName() == 'home') active @endif" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Dashboard</span>
            </a>
            @can('view_analytics')
                <a href="/analytics" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'analytics')) active @endif"><i
                        class="fas fa-chart-line fa-fw me-3"></i><span>Analytics</span></a>
            @endcan
            @can('view_players')
                <a href="/players" class="list-group-item list-group-item-action py-2 ripple">
                    <i class="fas fa-users fa-fw me-3"></i><span>Players</span>
                </a>
            @endcan
            @can('view_punishments')
                <a href="/punishments" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'punishments')) active @endif">
                    <i class="fas fa-lock fa-fw me-3"></i><span>Punishments</span>
                </a>
            @endcan
            @can('view_announcements')
                <a href="/announcements" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'announcements')) active @endif">
                    <i class="fas fa-bullhorn fa-fw me-3"></i><span>Announcements</span>
                </a>
            @endcan
            @can('view_servers')
                <a href="/servers" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'servers')) active @endif">
                    <i class="fas fa-server fa-fw me-3"></i><span>Servers</span>
                </a>
            @endcan
            @can('view_pre_punishments')
                <a href="/punishment_templates" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'punishment_templates')) active @endif">
                    <i class="fas fa-file-lines fa-fw me-3"></i><span>Punishment Templates</span>
                </a>
            @endcan
            @can('view_languages')
                <a href="/languages" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'languages')) active @endif">
                    <i class="fas fa-language fa-fw me-3"></i><span>Languages</span>
                </a>
            @endcan
            @can('view_network')
                <a href="/settings" class="list-group-item list-group-item-action py-2 ripple @if(Str::startsWith(Route::currentRouteName(), 'settings')) active @endif">
                    <i class="fas fa-gear fa-fw me-3"></i><span>Settings</span>
                </a>
            @endcan
        </div>
    </div>
</nav>
