<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit congress member</title>
</head>
<body>
    <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Edit congress member') }}
                </h2>
            </x-slot>
        <div class="clearfix"></div><br />

        <div class="container">

            
            <form method='post' action="{{route('congressMember.update', $congress_member->id)}}">
                    @method('PUT')
                    @csrf
                <table class='table table-bordered'>
            
                    <tr>
                        <td>First name: </td>
                        <td><input type='text' name='first_name' class='form-control' value="{{$congress_member->first_name}}" required></td>
                    </tr>
            
                    <tr>
                        <td>Last name: </td>
                        <td><input type='text' name='last_name' class='form-control' value="{{$congress_member->last_name}}" required></td>
                    </tr>
            
                    <tr>
                        <td>Gender: </td>
                        <td>
                        <input type="radio" id="male" name="gender" @if($congress_member->gender == 1) checked @endif value="1">
                                <label for="male">Male</label>
                                <input type="radio" id="female" name="gender" @if($congress_member->gender == 0) checked @endif value="0">
                                <label for="female">Female</label>
                        </td>
                    </tr>
            
                    <tr>
                        <td>Age: </td>
                        <td><input type='number' name='age' class='form-control' value="{{$congress_member->age}}" required></td>
                    </tr>
                    
                    <tr>
                        <td>State:</td>
                        <td>
                        <select name="state">
                                    @foreach($states as $state)
                                        <option value="{{$state->id}}" @if($congress_member->state_id == $state->id) selected @endif>{{$state->name}}</option>
                                    @endforeach
                                </select>
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Party</td>
                        <td>
                        <select name="party">
                                    @foreach($parties as $party)
                                        <option value="{{$party->id}}" @if($congress_member->party_id == $state->id) selected @endif>{{$party->name}}</option>
                                    @endforeach
                                </select>
                        </td>
                    </tr>
            
                    <tr>
                        <td colspan="2">
                        <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Edit Governor
                        </button>  
                        <a href="/congressMembers" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                        </td>
                    </tr>
            
                </table>
            </form>
        </div>
    </x-app-layout>
</body>
</html>