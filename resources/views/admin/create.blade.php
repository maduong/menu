@extends('edutalk-core::admin._master')

@section('css')

@endsection

@section('js')
    @include('edutalk-menus::admin._components.nestable-script-renderer')
@endsection

@section('js-init')

@endsection

@section('content')
    <div class="layout-2columns sidebar-left">
        <div class="column left">
            @php do_action(BASE_ACTION_META_BOXES, 'top-sidebar', Edutalk_MENUS, null) @endphp
            @include('edutalk-menus::admin._partials.custom-link')
            {!! menus_management()->renderWidgets() !!}
            @php do_action(BASE_ACTION_META_BOXES, 'bottom-sidebar', Edutalk_MENUS, null) @endphp
        </div>
        <div class="column main">
            {!! Form::open(['class' => 'js-validate-form', 'novalidate' => 'novalidate']) !!}
            <textarea name="menu_structure"
                      id="menu_structure"
                      class="hidden"
                      style="display: none;">{!! old('menu_structure', '[]') !!}</textarea>
            <textarea name="deleted_nodes"
                      id="deleted_nodes"
                      class="hidden"
                      style="display: none;">[]</textarea>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="icon-layers font-dark"></i>
                        {{ trans('edutalk-menus::base.menu_info') }}
                    </h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-menus::base.title') }}</b>
                        </label>
                        <input required type="text" name="title"
                               class="form-control"
                               value="{{ old('title') }}"
                               autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-menus::base.slug') }}</b>
                        </label>
                        <input required type="text" name="slug"
                               class="form-control"
                               value="{{ old('slug') }}"
                               autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-menus::base.status') }}</b>
                        </label>
                        {!! form()->select('status', [
                            'activated' => trans('edutalk-core::base.status.activated'),
                            'disabled' => trans('edutalk-core::base.status.disabled'),
                        ], old('status'), ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-menus::base.menu_structure') }}</b>
                        </label>
                        <div class="dd nestable-menu"></div>
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button class="btn btn-primary"
                            type="submit">
                        <i class="fa fa-check"></i> {{ trans('edutalk-core::base.form.save') }}
                    </button>
                    <button class="btn btn-success"
                            name="_continue_edit"
                            value="1"
                            type="submit">
                        <i class="fa fa-check"></i> {{ trans('edutalk-core::base.form.save_and_continue') }}
                    </button>
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'main', Edutalk_MENUS, null) @endphp
            {!! Form::close() !!}
        </div>
    </div>
@endsection
