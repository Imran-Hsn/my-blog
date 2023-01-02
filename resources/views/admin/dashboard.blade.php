@extends('layout.main')

@section('dashboard')

<div class="container overflow-hidden">
    <div class="row">
        <div style="width: 30%; height: 120px;" class="bg-info col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">LIVE BLOGS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="bg-success col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">CATEGORIES LISTED</span>
        </div>

        <div style="width: 30%; height: 120px;" class="bg-warning col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">LISTED TAGS</span>
        </div>
    </div>

    <div class="row">
        <div style="width: 30%; height: 120px;" class="bg-success col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">REGISTERED AUTHOR</span>
        </div>
        <div style="width: 30%; height: 120px;" class="bg-warning col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">TOTAL SUBSCRIBERS</span>
        </div>
        
        <div style="width: 30%; height: 120px;" class="bg-success col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">UNAPPROVED COMMENTS</span>
        </div>
    </div>
    <div class="row">
        <div style="width: 30%; height: 120px;" class="bg-info col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
        <span id="dash_title">APPROVED COMMENTS</span>
        </div>
        <div style="width: 30%; height: 120px;" class="bg-danger col col-md-3 col-lg-3 text-white d-inline-block position-relative p-2  m-1 col border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">TRASH BLOGS</span>
        </div>
    </div>
</div>
@endsection()