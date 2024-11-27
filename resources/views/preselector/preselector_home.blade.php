<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidential elector Home</title>
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
<h1 style="text-align: center;">Presidential Electors of the States</h1>
    @if($pres_electors->count() > 0 )
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
            @foreach ($pres_electors as $pres_elector)
                <tr>
                    <td>{{$pres_elector->id}}</td>
                    <td>{{$pres_elector->first_name}}</td>
                    <td>{{$pres_elector->last_name}}</td>
                    @if($pres_elector->gender == 1)
                        <td>Male</td>
                    @else
                        <td>Female</td>
                    @endif
                    <td>{{$pres_elector->age}}</td>
                    <td>{{$pres_elector->state->name}}</td>
                    <td>{{$pres_elector->party->name}}</td>
                    <td>
                    <form action="{{route('presElector.edit', $pres_elector->id)}}" method="GET" style="display:inline;">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </form>
                    </td>
                    <td>
                        <form action="{{route('presElector.delete', $pres_elector->id)}}" method="post" 
                        style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                            onclick="return confirm('Are you sure you want to delete this presidential elector?')">
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
    <form method="GET" action="/presElector/add">
        <input type="submit" value="+ Add New Presidential Elector">
    </form>
</body>
</html>