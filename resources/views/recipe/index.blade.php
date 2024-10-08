@extends('layouts.app')

@section('title')
    Browse Recipes
@endsection

@section('style')
    <link rel="stylesheet" href="resources/css/app.css">
@endsection

@section('content')
    <table class="spacious table">
        <thead>
            <tr>
                <th colspan=3><h3>Recipe</h3></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
                <tr>
                    <td><a href="recipe/{{$recipe->id}}" target="_blank">{{$recipe->name}}</a></td>
                    <td><a class="btn btn-md btn-primary" href="recipe/{{$recipe->id}}/edit">Edit</a></td>
                    <td>
                        <a class="btn btn-md btn-secondary" id="myForm" name="{{$recipe->id}}" href="/print/recipecost/{{$recipe->id}}" target="_blank" onclick="askUser(this)">Recipe Costing</a>
                    </td>
                    <td>
                        {{-- <a class="btn btn-danger" href={{ route('recipe.destroy', $recipe->id) }}>Delete</a> --}}
                        <form action="{{ route('recipe.destroy', $recipe->id) }}" method="post">
                            <button class="btn btn-danger" type="submit">Delete</button>
                            @method("DELETE")
                            @csrf
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
            function askUser(dom) {
    
                var batches = prompt("How many batches do you wish to price for?", 1);
    
                if(batches){
                    dom.href = "print/recipecost/" + dom.name + "/" + batches;
                    dom.target = "_blank";
                }
                else{
                    dom.href = "";
                    dom.target = "";
                }

                console.log(dom);
            }
    
        </script>
@endsection