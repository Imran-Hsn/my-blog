@extends('layout.main')

@section('dashboard')

<div class="container-fluid overflow-hidden">
    <!-- <div class="row g-2"> -->
        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">LIVE BLOGS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">CATEGORIES LISTED</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">LISTED SUBCATEGORIES</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">TRASH BLOGS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">REGISTERED SUBADMINS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">APPROVED COMMENTS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">UNAPPROVED COMMENTS</span>
        </div>

        <div style="width: 30%; height: 120px;" class="d-inline-block position-relative p-3  m-1 col text-info border border-dark rounded rounded-3 align-items-center">
            <span id="dash_title">TOTAL SUBSCRIBERS</span>
        </div>

    <!-- </div> -->
</div>
@endsection()