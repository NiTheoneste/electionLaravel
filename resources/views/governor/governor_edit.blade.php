<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit governor</title>
</head>
<body>
<div class="clearfix"></div><br />

<div class="container">

 	
    <form method='post' action="{{route('governor.update', $governor->id)}}">
            @method('PUT')
            @csrf
        <table class='table table-bordered'>
    
            <tr>
                <td>First name: </td>
                <td><input type='text' name='first_name' class='form-control' value="{{$governor->first_name}}" required></td>
            </tr>
    
            <tr>
                <td>Last name: </td>
                <td><input type='text' name='last_name' class='form-control' value="{{$governor->last_name}}" required></td>
            </tr>
    
            <tr>
                <td>Gender: </td>
                <td>
                <input type="radio" id="male" name="gender" @if($governor->gender == 1) checked @endif value="1">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" @if($governor->gender == 0) checked @endif value="0">
                        <label for="female">Female</label>
                </td>
            </tr>
    
            <tr>
                <td>Age: </td>
                <td><input type='number' name='age' class='form-control' value="{{$governor->age}}" required></td>
            </tr>
            
            <tr>
                <td>State:</td>
                <td>
                <select name="state">
                            @foreach($states as $state)
                                <option value="{{$state->id}}" @if($governor->state_id == $state->id) selected @endif>{{$state->name}}</option>
                            @endforeach
                        </select>
                </td>
            </tr>
            
            <tr>
                <td>Party</td>
                <td>
                <select name="party">
                            @foreach($parties as $party)
                                <option value="{{$party->id}}" @if($governor->party_id == $state->id) selected @endif>{{$party->name}}</option>
                            @endforeach
                        </select>
                </td>
            </tr>
    
            <tr>
                <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-save">
                <span class="glyphicon glyphicon-plus"></span> Edit Governor
                </button>  
                <a href="/governor" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                </td>
            </tr>
    
        </table>
    </form>
</div>
</body>
</html>