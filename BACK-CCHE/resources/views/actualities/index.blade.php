<x-app-layout>
    @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
      @endif
@section('title', 'Les actualités')

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
                        <h1> <strong>LES ACTUALITES</strong></h1>
                        <a href="{{ route('actuality.create') }}" class="btn btn-primary">Ajouter un actu</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Catégories</th>
                            <th scope="col">Date</th>
                            <th scope="col">Titre</th>
                            <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($actualities as $actuality)
                            <tr>
                            <th scope="row">{{ $actuality->id}}</th>
                            <td>{{ $actuality->category->name}}</td>
                            <td>{{ $actuality->created_at}}</td>
                            <td>{{ $actuality->title}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="{{ route('actuality.edit', $actuality)}}" class="btn btn-primary">Editer</a>
                                    <form action="{{ route('actuality.destroy', $actuality)}}" method="post">
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
                    {{ $actualities->links() }}
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
