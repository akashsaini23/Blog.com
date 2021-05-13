
<h1>Add Post</h1>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .box{
            height: 400px;
            width: 80%;
            margin: auto;
            margin-top: 5%;
            border: 2px double;
        }
        input{
            display: block;
            margin: auto;
            margin-top: 10px;

        }
        input[type=text]{
            height: 40px;
           width: 60%;
           margin-bottom: 10px;
           margin-top: 30px
        }
        input[type=submit]{
            height: 40px;
            width: 20%;
            font-size:20px;
            background: rgb(250, 80, 80);
            color: white;
        }
    </style>
</head>
<body>
    <div class="box">
    <form method="POST">
        <input type="text" name="post_title" placeholder="Blog Tittle">
        <textarea name="post_msg"  cols="70" rows="15"></textarea>
        <input type="submit" name="post" value="Submit Post">
        <p><?php echo $msg;?></p>
    </form>
    </div>
</body>
</html>