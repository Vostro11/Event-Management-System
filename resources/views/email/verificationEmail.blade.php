<!DOCTYPE html>
<html lang="en">
<head>
  <title>Verification EMail</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1> "Just one more step..." </h1>
</div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <h3>{{$text}}</h3>
      <a href="http://localhost:8000/auth/verify/{{$text}}" class="btn btn-success">Verify My Account</a>
     <!--  <form action="http://localhost:8000/auth/verify" method="post">
       <input type="hidden" name="verification_code" value="{{$text}}">
       <input type="submit" class="btn btn-success" value="Verify My Account">
     </form> -->
    </div>
  </div>
</div>

</body>
</html>
