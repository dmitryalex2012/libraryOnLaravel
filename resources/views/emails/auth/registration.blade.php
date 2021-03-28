@component('mail::message')
# Introduction

Thanks for signing up. This is the password we generated for you: **{{ $password }}**

@component('mail::button', ['url' =>  route('login')])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
