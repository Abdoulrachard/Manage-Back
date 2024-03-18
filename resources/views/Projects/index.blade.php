<x-app-layout>
@section('title', 'Les Projets')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1> <strong>LES PROJETS</strong></h1>
                        <a href="{{ route('project.create') }}" class="btn btn-primary">Ajouter un projet</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Année</th>
                            <th scope="col">NomProjet</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Devellopeur</th>
                            <th scope="col">Maitre D'oeuvre</th>
                            <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                            <th scope="row">{{ $project->id}}</th>
                            <td>{{ $project->year}}</td>
                            <td>{{ $project->project_name}}</td>
                            <td>{{ $project->city}}</td>
                            <td>{{ $project->developer}}</td>
                            <td>{{ $project->maitre_ouvre}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="{{ route('project.edit', $project)}}" class="btn btn-primary">Editer</a>
                                    <form action="{{ route('project.destroy', $project)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
