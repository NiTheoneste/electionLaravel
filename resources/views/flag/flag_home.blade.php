<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Flag Home</title>
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
                    {{ __('Flags') }}
                </h2>
            </x-slot>
            <h1 style="text-align: center;">Flags of the States</h1>
            @if($flags->count() > 0 )
                <table class='table table-bordered table-responsive'>
                    <tr>
                    <th>Flag ID</th>
                    <th>Flag</th>
                    <th colspan="2" align="center">Actions</th>
                    </tr>
                    @foreach ($flags as $flag)
                        <tr>
                            <td>{{$flag->id}}</td>
                            <td><img src="{{ Storage::url($flag->imageUrl)}}" alt="" width="125px" height="84px"></td>
                            <td>
                            <form action="{{route('flag.edit', $flag->id)}}" method="GET" style="display:inline;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                            </td>
                            <td>
                            <form action="{{route('flag.delete', $flag->id)}}" method="post" 
                            style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this flag?')">
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
            <form method="GET" action="/flag/add">
                <input type="submit" value="+ Add New Flag">
            </form>
        </x-app-layout>
    </body>
</html>