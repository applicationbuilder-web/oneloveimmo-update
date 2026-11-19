@extends('layouts.app')

@section('title', 'Immobilier et construction au Congo | OneLove Immo')

@section('meta_description', 'Découvrez nos biens immobiliers à vendre ou à louer et nos projets de construction au Congo. OneLove Immo vous accompagne dans vos projets immobiliers.')

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
