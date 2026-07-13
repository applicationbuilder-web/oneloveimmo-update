@extends('layouts.app')

@section('title', 'Accueil')

@section('content')

    @include('home.sections.hero')

    @include('home.sections.search')

    @include('home.sections.featured-properties')

    @include('home.sections.services')

    @include('home.sections.projects')

    @include('home.sections.why-us')

    @include('home.sections.statistics')

    @include('home.sections.testimonials')

@endsection