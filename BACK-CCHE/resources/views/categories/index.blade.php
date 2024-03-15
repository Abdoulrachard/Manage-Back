<x-app-layout>
@section('title', 'Les catégories')

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
                        <h1> <strong>LES CATEGORIES </strong></h1>
                        <a href="{{ route('category.create') }}" class="btn btn-primary">Ajouter une Catégorie</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Catégories</th>
                            <th scope="col">Descriptions</th>
                            <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                            <th scope="row">{{ $category->id}}</th>
                            <td>{{ $category->name}}</td>
                            <td>{{ $category->desc}}</td>
                          
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="{{ route('category.edit', $category)}}" class="btn btn-primary">Editer</a>
                                    <form action="{{ route('category.destroy', $category)}}" method="post">
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
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
