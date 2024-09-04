<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ __('') }}</a>
            <a href="{{ route('home') }}" class="simple-text logo-normal">{{ __('ERP Smartech') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ __('Inicio') }}</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Modulos') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active " @endif>
                            <a href="{{ route('profile.edit')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'cliente') class="active " @endif>
                            <a href="{{ '/admin/clientes' }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ __('Clientes') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'proveedor') class="active " @endif>
                            <a href="{{ '/admin/proveedor'  }}">
                                <i class="tim-icons icon-delivery-fast"></i>
                                <p>{{ __('Proveedores') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'materiales') class="active " @endif>
                            <a href="{{ '/admin/material' }}">
                                <i class="tim-icons icon-settings"></i>
                                <p>{{ __('Materiales') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'invoice') class="active " @endif>
                            <a href="{{ '/admin/invoice'  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ __('Invoice') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'doctor') class="active " @endif>
                            <a href="{{ '/admin/doctor'  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ __('Doctores') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'status') class="active " @endif>
                            <a href="{{ '/admin/status'  }}">
                                <i class="tim-icons icon-notes"></i>
                                <p>{{ __('Estatus') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li @if ($pageSlug == 'icons') class="active " @endif>
                <a href="{{ route('pages.icons') }}">
                    <i class="tim-icons icon-atom"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'maps') class="active " @endif>
                <a href="{{ route('pages.maps') }}">
                    <i class="tim-icons icon-pin"></i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'notifications') class="active " @endif>
                <a href="{{ route('pages.notifications') }}">
                    <i class="tim-icons icon-bell-55"></i>
                    <p>{{ __('Notifications') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'tables') class="active " @endif>
                <a href="{{ route('pages.tables') }}">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p>{{ __('Table List') }}</p>
                </a>
            </li>
            <li @if ($pageSlug == 'typography') class="active " @endif>
                <a href="{{ route('pages.typography') }}">
                    <i class="tim-icons icon-align-center"></i>
                    <p>{{ __('Typography') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
