<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Governor Home</title>
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
                    {{ __('Governors') }}
                </h2>
            </x-slot>
            <h1 style="text-align: center;">Governors of the States</h1>
            @if($governors->count() > 0 )
                <table>
                    <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>State</th>
                    <th>Party</th>
                    <th colspan="2" align="center">Actions</th>
                    </tr>
                    @foreach ($governors as $governor)
                        <tr>
                            <td>{{$governor->id}}</td>
                            <td>{{$governor->first_name}}</td>
                            <td>{{$governor->last_name}}</td>
                            @if($governor->gender == 1)
                                <td>Male</td>
                            @else
                                <td>Female</td>
                            @endif
                            <td>{{$governor->age}}</td>
                            <td>{{$governor->state->name}}</td>
                            <td>{{$governor->party->name}}</td>
                            <td>
                                <form action="{{route('governor.edit', $governor->id)}}" method="GET" style="display:inline;">
                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </td>
                            <td>
                            <form action="{{route('governor.delete', $governor->id)}}" method="post" 
                                style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                    onclick="return confirm('Are you sure you want to delete this governor?')">
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
            <form method="GET" action="/governor/add">
                <input type="submit" value="+ Add New Governor">
            </form>
        </x-app-layout>
    </body>
</html>