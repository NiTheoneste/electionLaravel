<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Party Home</title>
        <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            td, th {
                border: 1px solid #dddddd;
                text-align: center;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Parties') }}
                </h2>
            </x-slot>
            <h1 style="text-align: center;">Parties of the US</h1>
            @if($parties->count() > 0 )
                <table class='table table-bordered table-responsive'>
                    <tr>
                    <th>#</th>
                    <th>Party</th>
                    <th colspan="2" align="center">Actions</th>
                    </tr>
                    @foreach ($parties as $party)
                        <tr>
                            <td>{{$party->id}}</td>
                            <td>{{ $party->name }}</td>
                            <td>
                            <form action="{{route('party.edit', $party->id)}}" method="GET" style="display:inline;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                            </td>
                            <td>
                            <form action="{{route('party.delete', $party->id)}}" method="post" 
                            style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this party?')">
                                    Delete
                                </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else
            <span>No Records</span>
            @endif
            <form method="GET" action="/party/add">
                <input type="submit" value="+ Add New Party">
            </form>
        </x-app-layout>
    </body>
</html>