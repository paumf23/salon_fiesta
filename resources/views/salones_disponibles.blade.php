<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    
</head>
<body>
    <div class="navbar">
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('salones_disponibles', ['zona' => 'Ituzaingo']) }}">Salones Disponibles</a>
        <a href="{{ route('contacto', ['numero' => 0]) }}">Contacto</a>
    </div>

    <div class="content">
        <h1>Salones Disponibles</h1>
        <p>Aquí se muestran los salones disponibles.</p>
    </div>
</body>
</html>

<style>
        
        .navbar {
            background-color: #333;
            overflow: hidden;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 20px;
        }
    </style>

</html>