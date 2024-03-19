<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 text-center">
        <h1> {{ Auth::user()->name }}   Welcome </h1>
    </div>
    <div class="d-flex justify-content-center gap-2">
        <a href="{{ route('actuality.index')}}" class="btn btn-primary">Actuality</a>
        <a href="{{ route('project.index')}}" class="btn btn-primary">Project</a>
        <a href="{{ route('category.index')}}" class="btn btn-primary">Catégory</a>
        <a href="{{ route('equipe.index')}}" class="btn btn-primary">Equipes</a>
    </div>
</x-app-layout>
