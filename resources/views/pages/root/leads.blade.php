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
	 <h1 style="font-size: 20px">{{trans("leads.infoHeader", [], $language)}}</h1>
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
            <label for="email">{{trans("leads.email",[],$language)}}</label>
            {!! Form::email("email",null,['id' => 'email', 'placeholder' => trans("leads.email",[],$language)]) !!}
         </div>
         <div class="label label-text">
            <label for="phone">{{trans("leads.phone",[],$language)}}</label>
            {!! Form::text("phone",null,['id' => 'phone', 'placeholder' => trans("leads.phone",[],$language)]) !!}
         </div>
         <label>{{trans("leads.plan",[],$language)}}</label>
         <select name="plan" class="form-control">
         @foreach(getSelectablePlans() as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
         @endforeach
         </select>
         <div class="label label-text">
            <label for="currentProvider">{{trans("leads.currentProvider",[],$language)}}</label>
            {!! Form::text("currentProvider",null,['id' => 'currentProvider', 'placeholder' => trans("leads.currentProvider",[],$language)]) !!}
         </div>
         <div class="label label-text">
            <label for="referrer">{{trans("leads.referrer",[],$language)}}</label>
            {!! Form::text("referrer",null,['id' => 'referrer', 'placeholder' => trans("leads.referrer",[],$language)]) !!}
         </div>
	 <h1 style="font-size: 20px">{{trans("leads.serviceAddrHeader",[],$language)}}</h1>
	 <div class="label label-text" style="display: inline-block; width: 79%">
            <label for="serviceLine1">{{trans("leads.addrLine1",[],$language)}}</label>
            {!! Form::text("serviceLine1",null,['id' => 'serviceLine1', 'placeholder' => trans("leads.addrLine1",[],$language)]) !!}
	 </div>
         <div class="label label-text" style="display: inline-block; width: 19%; float: right">
            <label for="serviceLine2">{{trans("leads.addrLine2",[],$language)}}</label>
            {!! Form::text("serviceLine2",null,['id' => 'serviceLine2', 'placeholder' => trans("leads.addrLine2",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 79%">
            <label for="serviceCity">{{trans("leads.addrCity",[],$language)}}</label>
            {!! Form::text("serviceCity",null,['id' => 'serviceCity', 'placeholder' => trans("leads.addrCity",[],$language)]) !!}
	 </div>
	 <div style="display: inline-block; width: 19%; float: right">
         <label>{{trans("leads.addrState",[],$language)}}</label>
         <select name="serviceState" class="form-control">
         @foreach(getStateCodes() as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
         @endforeach
	 </select>
	 </div>
	 <div style="text-align: center">
         <div class="label label-text" style="display: inline-block; width: 32%; float: left; text-align: left">
            <label for="serviceZip">{{trans("leads.addrZip",[],$language)}}</label>
            {!! Form::text("serviceZip",null,['id' => 'serviceZip', 'placeholder' => trans("leads.addrZip",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 32%; text-align: left">
            <label for="serviceLat">{{trans("leads.addrLat",[],$language)}}</label>
            {!! Form::text("serviceLat",null,['id' => 'serviceLat', 'placeholder' => trans("leads.addrLat",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 32%; float: right; text-align: left">
            <label for="serviceLong">{{trans("leads.addrLong",[],$language)}}</label>
            {!! Form::text("serviceLong",null,['id' => 'serviceLong', 'placeholder' => trans("leads.addrLong",[],$language)]) !!}
	 </div>
	 </div>
	 <h1 style="font-size: 20px">{{trans("leads.billingAddrHeader",[],$language)}}</h1>
	 <div class="label label-text" style="display: inline-block; width: 79%">
            <label for="billingLine1">{{trans("leads.addrLine1",[],$language)}}</label>
            {!! Form::text("billingLine1",null,['id' => 'billingLine1', 'placeholder' => trans("leads.addrLine1",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 19%; float: right">
            <label for="billingLine2">{{trans("leads.addrLine2",[],$language)}}</label>
            {!! Form::text("billingLine2",null,['id' => 'billingLine2', 'placeholder' => trans("leads.addrLine2",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 79%">
            <label for="billingCity">{{trans("leads.addrCity",[],$language)}}</label>
            {!! Form::text("billingCity",null,['id' => 'billingCity', 'placeholder' => trans("leads.addrCity",[],$language)]) !!}
         </div>
         <div style="display: inline-block; width: 19%; float: right">
         <label>{{trans("leads.addrState",[],$language)}}</label>
         <select name="billingState" class="form-control">
         @foreach(getStateCodes() as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
         @endforeach
         </select>
         </div>
         <div class="label label-text">
            <label for="billingZip">{{trans("leads.addrZip",[],$language)}}</label>
            {!! Form::text("billingZip",null,['id' => 'billingZip', 'placeholder' => trans("leads.addrZip",[],$language)]) !!}
         </div>
         <div class="half vcenter label">
            <div><button type="submit" value="{{trans("actions.submit",[],$language)}}">{{trans("actions.submit",[],$language)}}</button></div>
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
