<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @section('title' ,$category->exists ? "Modifier une categorie" : "Créer une categorie")

    <div class="container mt-5">
        <h1 class="pb-3 fw-bold h3">@yield('title')</h1>

        <form class="vstack gap-2" action="{{ route($category->exists ? 'category.update' : 'category.store', $category ) }}" method="post">
             {{-- @php 
                dd($category);
            @endphp --}}
            @csrf

            @method($category->exists ? 'PUT' : 'POST')
            <div class="row">
                <div class="col-md-12">
                    <x-forms.input name='name' :value="$category->name" label='Catégories' />
                </div>

                {{-- <div class="col-md-12 ">
                    <x-forms.textarea  name='desc' :value="$category->description" label='Descriptions' />
                </div> --}}
            </div>
            <div class="text-center mt-5">
                <button  class="btn btn-primary w-25">
                    @if($category->exists)
                      Modifier
                    @else
                      Créer
                    @endif
                </button>
            </div>
        </form>
    </div>
</x-app-layout>