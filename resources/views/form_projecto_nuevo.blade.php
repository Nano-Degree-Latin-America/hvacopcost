@if (auth::user()->tipo_user == 3)
@include('new_project_forms.form_new_project_demo')
@endif

@if (auth::user()->tipo_user != 3)
    @include('new_project_forms.form_new_project')
@endif
