<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add senetor</title>
</head>
<body>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class='text-red-500'>{{$error}}</div>
        @endforeach
    @endif
<div class="clearfix"></div><br />

<div class="container">

	<form method='post' action="{{route('senator.add')}}">
        @csrf
        <table class='table table-bordered'>
    
            <tr>
                <td>First name: </td>
                <td><input type='text' name='first_name' class='form-control' required></td>
            </tr>
    
            <tr>
                <td>Last name: </td>
                <td><input type='text' name='last_name' class='form-control' required></td>
            </tr>
    
            <tr>
                <td>Gender: </td>
                <td>
                    <input type="radio" id="male" name="gender" value="1">
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="gender" value="0">
                    <label for="female">Female</label>
                </td>
            </tr>
    
            <tr>
                <td>Age: </td>
                <td><input type='number' name='age' class='form-control' required></td>
            </tr>
            
            <tr>
                <td>State: </td>
                <td>
                    <select name="state">
                        @foreach($states as $state)
                            <option value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            
            <tr>
                <td>Party: </td>
                <td>
                    <select name="party">
                        @foreach($parties as $party)
                            <option value="{{$party->id}}">{{$party->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
    
            <tr>
                <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-save">
                <span class="glyphicon glyphicon-plus"></span> Create New Senator
                </button>  
                <a href="/senator" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                </td>
            </tr>
    
        </table>
    </form>
</div>
</body>
</html>