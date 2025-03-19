@extends('layouts.root')
@section('content')
<body class="page-login">
   <div class="wrapper">
      <section id="main" class="section content animated fadeInDown delayed_02s">
         <a>
         <img class="logo-form" src="/assets/img/logo.png">
         </a>
         <h1 class="fake-half">{{trans("root.signup",[],$language)}}</h1>
	 <p>{{trans('leads.leadDescription', ['ispName' => config("customer_portal.company_name")],$language)}}</p>
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
	 <div style="text-align: center; display: inline-block">
         <div class="label label-text" style="display: inline-block; width: 25%; float: left; text-align: left">
            <label>&nbsp;</label>
            {!! Form::text("phoneCountry",null,['id' => 'phoneCountry', 'disabled' => 'disabled', 'placeholder' => 'US&nbsp;+1']) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 46%; text-align: left">
            <label for="phone">{{trans("leads.phone",[],$language)}}</label>
            {!! Form::number("phone",null,['id' => 'phone', 'placeholder' => trans("leads.phone",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 25%; float: right; text-align: left">
            <label for="ext">{{trans("leads.ext",[],$language)}}</label>
            {!! Form::number("ext",null,['id' => 'ext', 'placeholder' => trans("leads.ext",[],$language)]) !!}
	 </div>
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
	 <div class="label label-text" style="display: inline-block; width: 69%">
            <label for="serviceLine1">{{trans("leads.addrLine1",[],$language)}}</label>
            {!! Form::text("serviceLine1",null,['id' => 'serviceLine1', 'placeholder' => trans("leads.location",[],$language)]) !!}
	 </div>
         <div class="label label-text" style="display: inline-block; width: 29%; float: right">
            <label for="serviceLine2">{{trans("leads.addrLine2",[],$language)}}</label>
            {!! Form::text("serviceLine2",null,['id' => 'serviceLine2', 'placeholder' => trans("leads.addrLine2",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 69%">
            <label for="serviceCity">{{trans("leads.addrCity",[],$language)}}</label>
            {!! Form::text("serviceCity",null,['id' => 'serviceCity', 'placeholder' => trans("leads.addrCity",[],$language)]) !!}
	 </div>
	 <div style="display: inline-block; width: 29%; float: right">
         <label>{{trans("leads.addrState",[],$language)}}</label>
         <select id="serviceState" name="serviceState" class="form-control">
         @foreach(getStateCodes() as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
         @endforeach
	 </select>
	 </div>
	 <div style="text-align: center; display: inline-block">
         <div class="label label-text" style="display: inline-block; width: 32%; float: left; text-align: left">
            <label for="serviceZip">{{trans("leads.addrZip",[],$language)}}</label>
            {!! Form::number("serviceZip",null,['id' => 'serviceZip', 'placeholder' => trans("leads.addrZip",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 32%; text-align: left">
            <label for="serviceLat">{{trans("leads.addrLat",[],$language)}}</label>
            {!! Form::number("serviceLat",null,['id' => 'serviceLat', 'placeholder' => trans("leads.addrLat",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 32%; float: right; text-align: left">
            <label for="serviceLong">{{trans("leads.addrLong",[],$language)}}</label>
            {!! Form::number("serviceLong",null,['id' => 'serviceLong', 'placeholder' => trans("leads.addrLong",[],$language)]) !!}
	 </div>
	 </div>
	 <h1 style="font-size: 20px">{{trans("leads.billingAddrHeader",[],$language)}}<a class="button" id="sameAddrBtn" style="margin: 0 0 0 10px">{{trans("leads.copyBtn",[],$language)}}</a></h1>
	 <div class="label label-text" style="display: inline-block; width: 69%">
            <label for="billingLine1">{{trans("leads.addrLine1",[],$language)}}</label>
            {!! Form::text("billingLine1",null,['id' => 'billingLine1', 'placeholder' => trans("leads.location",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 29%; float: right">
            <label for="billingLine2">{{trans("leads.addrLine2",[],$language)}}</label>
            {!! Form::text("billingLine2",null,['id' => 'billingLine2', 'placeholder' => trans("leads.addrLine2",[],$language)]) !!}
         </div>
         <div class="label label-text" style="display: inline-block; width: 69%">
            <label for="billingCity">{{trans("leads.addrCity",[],$language)}}</label>
            {!! Form::text("billingCity",null,['id' => 'billingCity', 'placeholder' => trans("leads.addrCity",[],$language)]) !!}
         </div>
         <div style="display: inline-block; width: 29%; float: right">
         <label>{{trans("leads.addrState",[],$language)}}</label>
         <select id="billingState" name="billingState" class="form-control">
         @foreach(getStateCodes() as $key => $value)
            <option value="{{$value}}">{{$value}}</option>
         @endforeach
         </select>
         </div>
         <div class="label label-text">
            <label for="billingZip">{{trans("leads.addrZip",[],$language)}}</label>
            {!! Form::number("billingZip",null,['id' => 'billingZip', 'placeholder' => trans("leads.addrZip",[],$language)]) !!}
	 </div>
         <div class="g-recaptcha" data-sitekey="{{getenv("CAPTCHA_SITE_KEY")}}"></div>
         <div class="half vcenter label" style="margin-top: 16px">
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
<script async src="https://maps.googleapis.com/maps/api/js?key={{getenv("PLACES_KEY")}}&loading=async&libraries=places&callback=initAutocomplete"></script>
<script nonce="{{ csp_nonce() }}" src="https://www.google.com/recaptcha/api.js" async defer></script>
<script nonce="{{ csp_nonce() }}">
// init google places autocomplete
let autocomplete;
let street1, apt1, city1, state1, zip1, lat1, lng1;
let street2, apt2, city2, state2, zip2;

document.addEventListener("DOMContentLoaded", (event) => {
    street1 = document.getElementById('serviceLine1');
    apt1 = document.getElementById('serviceLine2');
    city1 = document.getElementById('serviceCity');
    state1 = document.getElementById('serviceState');
    zip1 = document.getElementById('serviceZip');
    lat1 = document.getElementById('serviceLat');
    lng1 = document.getElementById('serviceLong');

    street1.addEventListener('keydown', (event) => {
	if (event.keyCode == 13) {
	    event.preventDefault();
	    return false;
	}
    });

    street2 = document.getElementById('billingLine1');
    apt2 = document.getElementById('billingLine2');
    city2 = document.getElementById('billingCity');
    state2 = document.getElementById('billingState');
    zip2 = document.getElementById('billingZip');

    street2.addEventListener('keydown', (event) => {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});

function initAutocomplete() {
    const center = { lat: 40, lng: -95 };
    // Create a bounding box with sides ~10km away from the center point
    const defaultBounds = {
        north: center.lat + 0.1,
        south: center.lat - 0.1,
        east: center.lng + 0.1,
        west: center.lng - 0.1,
    };

    const input1 = document.getElementById("serviceLine1");
    const options1 = {
        bounds: defaultBounds,
        componentRestrictions: { country: "us" },
	fields: ["address_components", "geometry"],
	types: ["address"],
        strictBounds: false,
    };
    autocomplete1 = new google.maps.places.Autocomplete(input1, options1);
    autocomplete1.addListener('place_changed', onPlaceChange1);

    const input2 = document.getElementById("billingLine1");
    const options2 = {
        bounds: defaultBounds,
        componentRestrictions: { country: "us" },
        fields: ["address_components"],
        types: ["address"],
        strictBounds: false,
    };
    autocomplete2 = new google.maps.places.Autocomplete(input2, options2);
    autocomplete2.addListener('place_changed', onPlaceChange2);
}

// funcs for updating search fields with google places info
function onPlaceChange1() {
    const place = autocomplete1.getPlace();

    if (!place.address_components) {
	return;
    }

    let street, city, state, zip, lat, lng;

    for (const component of place.address_components) {
	const componentType = component.types[0];
	switch (componentType) {
	    case "street_number": {
		street = component.long_name;
		break;
	    }
            case "route": {
                street += ' ' + component.long_name;
                break;
            }
            case "locality": {
                city = component.long_name;
                break;
            }
            case "administrative_area_level_1": {
                state = component.short_name;
                break;
            }
            case "postal_code": {
                zip = component.long_name;
                break;
            }
	}
    }

    if (place.geometry) {
	if (place.geometry.location) {
	    lat = place.geometry.location.lat();
	    lng = place.geometry.location.lng();
	} else {
	    lat = '';
	    lng = '';
	}
    } else {
	lat = '';
	lng = '';
    }

    street1.value = street;
    city1.value = city;
    state1.value = state;
    zip1.value = zip;
    lat1.value = lat;
    lng1.value = lng;
}

function onPlaceChange2() {
    const place = autocomplete2.getPlace();

    if (!place.address_components) {
        return;
    }

    let street, city, state, zip;

    for (const component of place.address_components) {
        const componentType = component.types[0];
        switch (componentType) {
            case "street_number": {
                street = component.long_name;
                break;
            }
            case "route": {
                street += ' ' + component.long_name;
                break;
            }
            case "locality": {
                city = component.long_name;
                break;
            }
            case "administrative_area_level_1": {
                state = component.short_name;
                break;
            }
            case "postal_code": {
                zip = component.long_name;
                break;
            }
        }
    }

    street2.value = street;
    city2.value = city;
    state2.value = state;
    zip2.value = zip;
}

// init google places autocomplete on successful script fetch
// main import places <script> tag calls this func on return
window.initAutocomplete = initAutocomplete;

// func for copying service addr to billing addr
function doSameAsAbove() {
    street2.value = street1.value;
    apt2.value = apt1.value;
    city2.value = city1.value;
    state2.value = state1.value;
    zip2.value = zip1.value;
}

document.getElementById("sameAddrBtn").addEventListener("click", doSameAsAbove);
</script>
<script type="text/javascript" src="/assets/libs/js-validation/jsvalidation.min.js"></script>
{!! JsValidator::formRequest('App\Http\Requests\LeadCreationRequest','#createForm') !!}
@endsection
