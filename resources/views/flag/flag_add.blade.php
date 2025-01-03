<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Flag</title>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Add flag') }}
                </h2>
            </x-slot>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class='text-red-500'>{{$error}}</div>
                @endforeach
            @endif
            <div class="clearfix"></div><br />

            <div class="container">
                <form method='post' action="{{route('flag.add')}}">
                    @csrf
                    <table class='table table-bordered'>
                        <tr>
                            <td>Flag image: </td>
                            <td><input type='file' name='flag_image' accept="image/*" class='form-control' required></td>
                        </tr>
                
                        <tr>
                            <td colspan="2">
                            <button type="submit" class="btn btn-primary" name="btn-save">
                            <span class="glyphicon glyphicon-plus"></span> Create New Flag
                            </button>  
                            <a href="/flags" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                            </td>
                        </tr>
                
                    </table>
                </form>
            </div>
        </x-app-layout>
    </body>
</html>