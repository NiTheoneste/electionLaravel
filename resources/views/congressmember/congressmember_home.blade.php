<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Congress Member Home</title>
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
    <h1 style="text-align: center;">Congress Members of the States</h1>
        @if($congress_members->count() > 0 )
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
                @foreach ($congress_members as $congress_member)
                    <tr>
                        <td>{{$congress_member->id}}</td>
                        <td>{{$congress_member->first_name}}</td>
                        <td>{{$congress_member->last_name}}</td>
                        @if($congress_member->gender == 1)
                            <td>Male</td>
                        @else
                            <td>Female</td>
                        @endif
                        <td>{{$congress_member->age}}</td>
                        <td>{{$congress_member->state->name}}</td>
                        <td>{{$congress_member->party->name}}</td>
                        <td>
                            <form action="{{route('congressMember.edit', $congress_member->id)}}" method="GET" style="display:inline;">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </form>
                        </td>
                        <td>
                        <form action="{{route('congressMember.delete', $congress_member->id)}}" method="post" 
                            style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                onclick="return confirm('Are you sure you want to delete this congress member?')">
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
        <form method="GET" action="/congressMember/add">
            <input type="submit" value="+ Add New Congress Member">
        </form>
    </body>
</html>