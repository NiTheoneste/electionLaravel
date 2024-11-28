<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit state</title>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Edit state') }}
            </h2>
        </x-slot>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class='text-red-500'>{{$error}}</div>
            @endforeach
        @endif
        <div class="clearfix"></div><br />
        <div class="container">
            <form method='post' action="{{route('state.update', $state->id)}}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <table class='table table-bordered'>
                    <tr>
                        <td>State Code: </td>
                        <td><input type='text' name='state_code' value="{{$state->code}}" class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td>State Name: </td>
                        <td><input type='text' name='state_name' value="{{$state->name}}" class='form-control' required></td>
                    </tr>
            
                    <tr>
                        <td>Flag: </td>
                        <td>
                            <img src="{{ Storage::url($state->flag->imageUrl)}}" alt="" width="125px" height="84px">
                        </td>
                    </tr>
                    <tr>
                        <td>If you want to change the flag:</td>
                        <td><input type='file' name='flag_image' accept="image/*" class='form-control'></td>
                    </tr>
            
                    <tr>
                        <td>GDP (in millions of US dollars): </td>
                        <td><input type='number' name='gdp' step="0.1" class='form-control' value="{{$state->gdp}}" required></td>
                    </tr>
                    
                    <tr>
                        <td>Area (in km²):</td>
                        <td><input type='number' name='area' step="0.1" class='form-control' value="{{$state->area}}" required></td>
                    </tr>
                    
                    <tr>
                        <td>Population: </td>
                        <td><input type='number' name='population' class='form-control' value="{{$state->population}}" required></td>
                    </tr>
            
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Edit State
                        </button>  
                        <a href="/states" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                        </td>
                    </tr>
            
                </table>
            </form>
        </div>
    </x-app-layout>
</body>
</html>