<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="image/photo_CV.jpg">
  <title>Bienvenue sur mon portfolio !</title>
  <style>
    html {
        height:100%;
        width:100%;
    }

    body {
        width:100%;
        height:100%;
        display:flex;
        margin:0;
    }
    #basique {
        width:50%;
        height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        background-image: url("./image/style_basique.png");
        background-position: center;
        background-repeat:no-repeat;
        transition: width 0.5s;
    }

    button {
        width:100%;
        height:100%;
        background:none;
        border:none;
        padding-top:10%;
    }

    button:hover {
        cursor:pointer;
    }

    #FM {
        width:50%;
        height:100%;
        display:flex;
        justify-content:center;
        align-items:center;
        background-image: url("./image/style_FM.png");
        background-position: center;
        background-repeat:no-repeat;
        transition: width 0.5s;
    }

    #basique button {
        font-size:2em;
        font-weight:bolder;
        color:black;
        text-shadow: 0 0 0.2em white, 0 0 0.2em white,
        0 0 0.2em white;
        
    }

    #FM button {
        font-size:2em;
        font-weight:bolder;
        color:white;
        text-shadow: 0 0 0.2em black, 0 0 0.2em black,
        0 0 0.2em black;
    }
  </style>
  <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
</head>
<body>
    <form id="basique" action="index.php" method="get">
        <input type="hidden" name="choix" value="basique">
        <button>Portfolio version basique</button>
    </form>
    
    <form id="FM" action="index.php" method="get">
        <input type="hidden" name="choix" value="FM">
        <button>Portfolio version Football Manager</button>
    </form>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#basique').hover( function() {
                $('#basique').css("width", "60%");
                $('#FM').css("width", "40%");
            });

            $('#FM').hover( function() {
                $('#FM').css("width", "60%");
                $('#basique').css("width", "40%");
            });
        });
    </script>
</body>
</html>