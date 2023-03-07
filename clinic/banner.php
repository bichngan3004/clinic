 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/fonts/glyphicons-halflings-regular.eot">
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/bootstrap.js"></script>
    
</head>
<body>
        <div class="banner" style=" height: 100%; width: 100%;"> 
            <img id="aaa" style="width:100%; height: 80%" src="./img/1.png"/>
        </div>
</body>
<script>
     var image=document.getElementById("aaa");
     var img_array=["img/1.png","img/5.png","img/2.png","img/6.png","img/7.png"];
     var index=0;
     function slide()
 {
     image.setAttribute("src",img_array[index]);
     index++;
     if(index>=img_array.length)
     {
    index=0;
     }
 }
 setInterval("slide()",4000);
</script>
</html> 

