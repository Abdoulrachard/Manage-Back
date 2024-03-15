<x-app-layout>
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
                        <a href="" class="btn btn-primary">Ajouter un actu</a>
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
                            @foreach($actualities as $actualty)
                            <tr>
                            <th scope="row">{{ $actualty->id}}</th>
                            <td>{{ $actualty->created_at}}</td>
                            <td>{{ $actualty->title}}</td>
                            <td>{{ $actualty->category}}</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="javascript:void(0)" class="btn btn-primary">Editer</a>
                                    <form action="" method="post">
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
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1> <strong>LES PROJETS</strong></h1>
                        <a href="javascript:void(0)" class="btn btn-primary">Ajouter un projet</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom du projet</th>
                            <th scope="col">Ville et Pays</th>
                            <th scope="col">Année de creation</th>
                            <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="javascript:void(0)" class="btn btn-primary">Editer</a>
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1> <strong>LES EQUIPES</strong></h1>
                        <a href="javascript:void(0)" class="btn btn-primary">Ajouter un projet</a>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom et Prenom</th>
                            <th scope="col">Poste</th>
                            <th scope="col" class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <div class="d-flex gap-2 justify-content-end w-100">
                                    <a href="javascript:void(0)" class="btn btn-primary">Editer</a>
                                    <form action="" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">Supprimer</button>
                                    </form>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
