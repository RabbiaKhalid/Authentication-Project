<!DOCTPE html>
<html>
<head>
<title>View Details</title>
<!-- <link href="./css/todo.css" rel="stylesheet"> -->
<!-- <link rel="stylesheet" href="{{ URL::asset('css/todo.css') }}" /> -->
<style>
    *{
    margin: 0;
    padding: 0;
}
.fl{
    float: left;
}
.warpper{
    width: 100%;
    height: 100vh;
   
    background-repeat: no-repeat;
    background-size: cover;
}
.main{
    width: 30%;
    height: 350px;
    background-color: #20b2aa;
    margin: 50px 35%;
    border-radius: 20px 20px 30px 30px;
}
.head{
    width: 100%;
    background-color: #f8B800;
    height: 40px;
    border-radius: 20px 20px 0 0;
}
.head p{
    line-height: 40px;
    text-align: center;
    font-size: 25px;
    font-weight: bold;
    color: #fff;
}
.form{
    width: 100%;
    height: 500px;
}
.name{
    font-size: 16px;
    color: #fff;
    margin: 15px 0 0 5%;
}
.name-inp{
    width: 90%;
    height: 30px;
    margin: 5px 0 0 5%;
    font-size: 16px;
    padding: 2px;
    color: rgb(114, 111, 111);
    border: 1px solid #20b2aa;
    background-color: rgb(231, 232, 250);
}
.sub{
    width: 90%;
    margin: 15px 0 0 5%;
    font-size: 16px;
    height: 40px;
    background-color: #031c30;
    border: 1px solid rgb(17, 67, 107);
    color: #fff;
}
.table{
    
    width:40%;
    height:40%;
    margin-right: auto;
    margin-left: auto;
    
}
.alert{
    color: #FF0000;
    padding-left: 15%
    
    
}
</style>

</head>
<body>
<br><br>
    <div class="warpper fl">
        <div class="main">
            <div class="head">
<p>
Device Data Form</p>
</div>
<div class="form fl">

              <form method="POST" action='store-data'>
                  @csrf
                 
                    <p class="name">
 NAME :</p>
<p>
<input type="text" name="name" placeholder=" Enter Name" class="name-inp" class="@error('name') is-invalid @enderror">
@error('name')
    <div class="alert">{{ $message }}</div>
@enderror</p>
<p class="name">
MEMBER ID :</p>
<p>
<input type="number" name="member_id" placeholder="Enter Member ID" class="name-inp" class="@error('member_id') is-invalid @enderror">
@error('member_id')
    <div class="alert">{{ $message }}</div>
@enderror</P>
<p>
<input type="submit" name="sb" value="Submit Form" class="sub"></p>
</form>
</div>
</div>
</body>
</html>