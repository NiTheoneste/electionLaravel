<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>State Home</title>
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
        <h1 style="text-align: center;">States of the US</h1>
        @if($states->count() > 0 )
            <table class='table table-bordered table-responsive'>
                <tr>
                <th>State Code</th>
                <th>State Name</th>
                <th>Flag</th>
                <th>GDP (in millions of US dollars)</th>
                <th>Area (in km²)</th>
                <th>Population</th>
                <th colspan="2" align="center">Actions</th>
                </tr>
                @foreach ($states as $state)
                    <tr>
                        <td>{{$state->code}}</td>
                        <td>{{$state->name}}</td>
                        <td><img src="{{ Storage::url($state->flag->imageUrl)}}" alt="" width="125px" height="84px"></td>
                        <td>{{$state->gdp}}</td>
                        <td>{{$state->area}}</td>
                        <td>{{$state->population}}</td>
                        <td>
                            <form action="{{route('state.edit', $state->id)}}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('state.delete', $state->id)}}" method="post" 
                            style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this state?')">
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
        <br>
        <form method="GET" action="/state/add">
            <input type="submit" value="+ Add New State">
        </form>
    </body>
</html>