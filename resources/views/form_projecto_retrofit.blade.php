@if (auth::user()->tipo_user == 3)
@include('retrofit_project_forms.form_project_retrofit_demo')
@endif

@if (auth::user()->tipo_user != 3)
    @include('retrofit_project_forms.form_project_retrofit')
@endif
