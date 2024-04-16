<x-app-layout>
    @section('title', 'Les Equipes')
    
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
                            <a href="{{ route('equipe.create') }}" class="d-flex align-items-center btn btn-primary">Ajouter une équipe <i class="fas fa-plus" style="margin-left:5px ;"></i></a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">Id</th>
                                {{-- <th scope="col">Nom</th> --}}
                                <th scope="col">Poste</th>
                                <th scope="col" class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($equipes as $equipe)
                                <tr>
                                <th scope="row">{{ $equipe->id}}</th>
                                {{-- <td>{{ $equipe->name}}</td> --}}
                                <td>{{ $equipe->posted}}</td>
                                <td >
                                    <div class="d-flex gap-2 justify-content-end w-100">
                                        <a href="{{ route('equipe.edit', $equipe)}}" class="d-flex align-items-center btn btn-primary">Editer<i class="far fa-pen-to-square"  style="margin-left:5px ;"></i></a>
                                        <form action="{{ route('equipe.destroy', $equipe)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="d-flex align-items-center btn btn-danger">Supprimer<i class="fas fa-trash" style="margin-left:5px ;"></i></button>
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
    