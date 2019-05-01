<div class="exploding-tiles mt-5">
    <div class="row justify-content-md-center">
        @can('acl.view', 'admin.usuarios.perfil')
            <a class="col-md-6 col-lg-3 exploding-link" href=" {{ route('admin.usuarios.perfil', \Illuminate\Support\Facades\Auth::id()) }} ">
                <div class="widget card-box p-3 wg-purple">
                    <div class="wg-bg"></div>
                    <div class="content">
                        <div class="media-body">
                            <div class="clearfix">
                                <div class="fs-45"><span class="mdi mdi-account"></span></div>
                                <div class="fs-36"><span>Perfil</span></div>
                                <div class="">Gerencie seus dados e estatisticas</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('acl.view', 'admin.visitas.index')
            <a class="col-md-6 col-lg-3 exploding-link" href=" {{ route('admin.visitas.index') }} ">
                <div class="widget card-box p-3 wg-blue">
                    <div class="wg-bg"></div>
                    <div class="content">
                        <div class="media-body">
                            <div class="clearfix">
                                <div class="fs-45"><span class="mdi mdi-calendar-clock"></span></div>
                                <div class="fs-36"><span>Visitas Pendentes</span></div>
                                <div class="">Seus agendamentos pendentes</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
        @can('acl.view', 'admin.visitas.create')
            <a class="col-md-6 col-lg-3 exploding-link" href=" {{ route('admin.visitas.create') }} ">
                <div class="widget card-box p-3 wg-green">
                    <div class="wg-bg"></div>
                    <div class="content">
                        <div class="media-body">
                            <div class="clearfix">
                                <div class="fs-45"><span class="mdi mdi-calendar-check"></span></div>
                                <div class="fs-36"><span>Nova Visita</span></div>
                                <div class="">Crie um novo agendamento</div>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endcan
    </div>
</div>
