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
                            <h1> <strong>LES EQUIPES</strong></h1>
                            <a href="{{ route('equipe.create') }}" class="btn btn-primary">Ajouter une equipe</a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Poste</th>
                                <th scope="col">Domaine</th>
                                <th scope="col">Formation</th>
                                <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipes as $equipe)
                                <tr>
                                <th scope="row">{{ $equipe->id}}</th>
                                <td>{{ $equipe->name}}</td>
                                <td>{{ $equipe->posted}}</td>
                                <td>{{ $equipe->domaine_compentence}}</td>
                                <td>{{ $equipe->formations}}</td>
                                <td>
                                    <div class="d-flex gap-2 justify-content-end w-100">
                                        <a href="{{ route('equipe.edit', $equipe)}}" class="btn btn-primary">Editer</a>
                                        <form action="{{ route('equipe.destroy', $equipe)}}" method="post">
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
                        {{ $equipes->links() }}
                    </div>
                </div>
            </div>
        </div>
        
    </x-app-layout>
    