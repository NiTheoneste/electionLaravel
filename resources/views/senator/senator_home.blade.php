<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senator Home</title>
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
@if($senators->count() > 0 )
        <table class='table table-bordered table-responsive'>
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
            @foreach ($senators as $senator)
                <tr>
                    <td>{{$senator->id}}</td>
                    <td>{{$senator->first_name}}</td>
                    <td>{{$senator->last_name}}</td>
                    @if($senator->gender == 1)
                        <td>Male</td>
                    @else
                        <td>Female</td>
                    @endif
                    <td>{{$senator->age}}</td>
                    <td>{{$senator->state->name}}</td>
                    <td>{{$senator->party->name}}</td>
                    <td>
                        <form action="{{route('senator.edit', $senator->id)}}" method="GET" style="display:inline;">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{route('senator.delete', $senator->id)}}" method="post" 
                        style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete this senator?')">
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
    <form method="GET" action="/senator/add">
        <input type="submit" value="+ Add New Senator">
    </form>
</body>
</html>