<div class="row">
    <div class="col-xs-12 col-lg-10 materialize">
        <div class="form-label-group">
            <input type="text" id="search" name="search" class="form-control required"
                   placeholder="Pesquise pelas colunas da tabela"
                   value="{{isset($palavra) ? $palavra: request()->search}}">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Pesquisa...</label>
            <span class="error-msg"></span>
        </div>
    </div>

    <div class="col-12 col-lg-2 text-center p-0">
        <div class="btn-group">
            <button class="btn btn-outline-primary btn-toolbar search btn-icon d-none d-md-none d-lg-inline-block d-xl-inline-block"
                    data-toggle="tooltip" title="Filtrar">
                <i aria-hidden="true" class="mdi mdi-magnify"></i>
            </button>
            <button class="btn btn-outline-primary btn-toolbar search btn-icon btn-block d-inline-block d-lg-none"
                    data-toggle="tooltip" title="" data-original-title="Filtrar">
                <i aria-hidden="true" class="mdi mdi-magnify"></i> <span>Filtrar</span>
            </button>
            <a href="{{ route('admin.usuarios.index') }}" class="btn btn-outline-danger btn-toolbar addAction text-uppercase d-block" data-toggle="tooltip" title="Limpar pesquisa">
                <i class="mdi mdi-filter-remove"></i>
            </a>
        </div>
    </div>
</div>
