@extends('layouts.root')
@section('content')
<body class="page-login">
   <div class="wrapper">
      <section id="main" class="section content animated fadeInDown delayed_02s">
         <a>
         <img class="logo-form" src="/assets/img/logo.png">
         </a>
         <h1 class="fake-half">{{trans("root.signup",[],$language)}}</h1>
         <p>{{trans("leads.leadDescription",[],$language)}}</p>
	 {!! Form::open(['action' => ['\App\Http\Controllers\AuthenticationController@createLead'], 'id' => 'createForm', 'method' => 'post']) !!}
         <div class="label label-text" style="display: inline-block; width: 49%">
            <label for="firstName">{{trans("leads.firstName",[],$language)}}</label>
            {!! Form::text("firstName",null,['id' => 'firstName', 'placeholder' => trans("leads.firstName",[],$language)]) !!}
	 </div>
         <div class="label label-text" style="display: inline-block; width: 49%; float: right">
            <label for="lastName">{{trans("leads.lastName",[],$language)}}</label>
            {!! Form::text("lastName",null,['id' => 'lastName', 'placeholder' => trans("leads.lastName",[],$language)]) !!}
	 </div>
         <div class="label label-text">
            <label for="companyName">{{trans("leads.companyName",[],$language)}}</label>
            {!! Form::text("companyName",null,['id' => 'companyName', 'placeholder' => trans("leads.companyName",[],$language)]) !!}
	 </div>
         <div class="label label-text">
            <label for="serviceAddress">{{trans("leads.serviceAddress",[],$language)}}</label>
            {!! Form::text("serviceAddress",null,['id' => 'serviceAddress', 'placeholder' => trans("leads.serviceAddress",[],$language)]) !!}
	 </div>
         <div class="label label-text">
            <label for="billingAddress">{{trans("leads.billingAddress",[],$language)}}</label>
            {!! Form::text("billingAddress",null,['id' => 'billingAddress', 'placeholder' => trans("leads.billingAddress",[],$language)]) !!}
         </div>
         <div class="label label-text">
            <label for="email">{{trans("leads.email",[],$language)}}</label>
            {!! Form::email("email",null,['id' => 'email', 'placeholder' => trans("leads.email",[],$language)]) !!}
         </div>
         <div class="label label-text">
            <label for="phone">{{trans("leads.phone",[],$language)}}</label>
            {!! Form::text("phone",null,['id' => 'phone', 'placeholder' => trans("leads.phone",[],$language)]) !!}
         </div>
         <div class="label label-text">
            <label for="plan">{{trans("leads.plan",[],$language)}}</label>
            {!! Form::text("plan",null,['id' => 'plan', 'placeholder' => trans("leads.plan",[],$language)]) !!}
	 </div>
         <div class="label label-text">
            <label for="currentProvider">{{trans("leads.currentProvider",[],$language)}}</label>
            {!! Form::text("currentProvider",null,['id' => 'currentProvider', 'placeholder' => trans("leads.currentProvider",[],$language)]) !!}
	 </div>
         <div class="label label-text">
            <label for="referrer">{{trans("leads.referrer",[],$language)}}</label>
            {!! Form::text("referrer",null,['id' => 'referrer', 'placeholder' => trans("leads.referrer",[],$language)]) !!}
         </div>
         <div class="half vcenter label">
            <div><button type="submit" value="{{trans("actions.signup",[],$language)}}">{{trans("actions.signup",[],$language)}}</button></div>
         </div>
         {!! Form::close() !!}
         <small><a href="{{action([\App\Http\Controllers\AuthenticationController::class, 'index'])}}">{{trans("register.back",[],$language)}}</a></small>
      </section>
   </div>
</body>
@endsection
@section('additionalJS')
<script nonce="{{ csp_nonce() }}">
window.onbeforeunload = function(e){
    document.getElementById('main').className = 'section content animated fadeOutUp';
}
var passwordStrength = {{config("customer_portal.password_strength_required")}};
</script>
<script type="text/javascript" src="/assets/js/pages/register/register.js"></script>
<script type="text/javascript" src="/assets/libs/js-validation/jsvalidation.min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\LeadCreationRequest','#createForm') !!}
@endsection
