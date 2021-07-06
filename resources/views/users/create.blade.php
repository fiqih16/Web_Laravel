@extends('layouts.dashboard')

@section('title')
    {{ trans('users.title.create')}}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('add_user')}}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    <!-- name -->
                    <div class="form-group">
                    <label for="input_user_name" class="font-weight-bold">
                        {{ trans('users.form_control.input.name.label')}}
                    </label>
                    <input id="input_user_name" value="" name="name" type="text" class="form-control"
                     placeholder="{{ trans('users.form_control.input.name.placeholder')}}" />
                    <!-- error message -->
                    </div>
                    <!-- role -->
                    <div class="form-group">
                    <label for="select_user_role" class="font-weight-bold">
                        {{ trans('users.form_control.select.role.label')}}
                    </label>
                    <select id="select_user_role" name="role"
                    data-placeholder="{{ trans('users.form_control.select.role.placeholder')}}"
                        class="custom-select w-100">
                    </select>
                    <!-- error message -->
                    </div>
                    <!-- email -->
                    <div class="form-group">
                    <label for="input_user_email" class="font-weight-bold">
                        {{ trans('users.form_control.input.email.label')}}
                    </label>
                    <input id="input_user_email" value="" name="email" type="email" class="form-control"
                    placeholder="{{ trans('users.form_control.input.email.placeholder')}}"
                        autocomplete="email" />
                    <!-- error message -->
                    </div>
                    <!-- password -->
                    <div class="form-group">
                    <label for="input_user_password" class="font-weight-bold">
                        {{ trans('users.form_control.input.password.label')}}
                    </label>
                    <input id="input_user_password" name="password" type="password" class="form-control"
                    placeholder="{{ trans('users.form_control.input.password.placeholder')}}"
                        autocomplete="new-password" />
                    <!-- error message -->
                    </div>
                    <!-- password_confirmation -->
                    <div class="form-group">
                    <label for="input_user_password_confirmation" class="font-weight-bold">
                        {{ trans('users.form_control.input.password_confirmation.label')}}
                    </label>
                    <input id="input_user_password_confirmation" name="password_confirmation" type="password"
                        class="form-control"
                        placeholder="{{ trans('users.form_control.input.password_confirmation.placeholder')}}" autocomplete="new-password" />
                    <!-- error message -->
                    </div>
                    <div class="float-right">
                    <a class="btn btn-warning px-4 mx-2" href="">
                        {{ trans('users.button.back.value')}}
                    </a>
                    <button type="submit" class="btn btn-primary float-right px-4">
                        {{ trans('users.button.save.value')}}
                    </button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('css-external')
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css')}}">
@endpush

@push('javascript-external')
<script src="{{ asset('vendor/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('vendor/select2/js/i18n/' .app()->getLocale() . '.js')}}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function() {
            // select2 select_user_role
            $('#select_user_role').select2({
                theme: 'bootstrap4',
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                            return {
                                text: item.name,
                                id: item.id
                            }
                            })
                        };
                    }
                }
            });
        });
    </script>
@endpush