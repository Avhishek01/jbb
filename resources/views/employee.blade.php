<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>employees management</title>
</head>
<body>
    <center>
        <form action="/employee" method="post">
            @csrf
            <h1> EMPLOYEE MANAGEMENT</h1>
            NAME <input type="text" name="name" placeholder="enter name"><br><br>
            EMAIL <input type="text" name="email" placeholder="enter email"><br><br>
            PROFILE <input type="text" name="profile" placeholder="enter profile"><br><br>
            <button type="submit">SUBMIT</button>
    
        </form>
    
    </body>
</html>
