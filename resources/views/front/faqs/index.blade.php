@extends('front.layout.master')

@section('content')

<div class="header">
    <div class="menu-button">
        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
            <path fill="currentColor" d="M3,6H21V8H3V6M3,11H21V13H3V11M3,16H21V18H3V16Z" />
        </svg>
    </div>
   <span>FAQ</span>
</div>

<div class="faqs">

    @foreach($faqs as $faq)
        <div class="faq">
            <div class="faq-header">
                <div class="faq-title">
                    <h2>{{$faq->title}}</h2>
                </div>
                <div class="faq-button" data-button="{{$faq->id}}">
                    <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                        <path d="M22,4V2H2V4H11V18.17L5.5,12.67L4.08,14.08L12,22L19.92,14.08L18.5,12.67L13,18.17V4H22Z" />
                    </svg>
                </div>
            </div>
            <div class="faq-description" data-content="{{$faq->id}}">
                <p>{{$faq->description}}</p>
            </div>
            
        </div>
    @endforeach
    
</div>

@endsection


