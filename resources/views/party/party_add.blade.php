<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add party</title>
</head>
<body>
    <div class="clearfix"></div><br />
    <div class="container">
        <form method='post' action="{{route('party.add')}}">
            @csrf
            <table class='table table-bordered'>
                <tr>
                    <td>Party Name: </td>
                    <td><input type='text' name='name' class='form-control' required></td>
                </tr>
        
                <tr>
                    <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                    <span class="glyphicon glyphicon-plus"></span> Create New Party
                    </button>  
                    <a href="/party" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to list</a>
                    </td>
                </tr>
        
            </table>
        </form>
    </div>
</body>
</html>