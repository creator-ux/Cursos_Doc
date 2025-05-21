<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reconocimiento</title>
    <style>
        body {
            background-image: url('Plantillas/Reconocimiento.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            font-family: Arial, sans-serif;
            
            /* Asegura que el fondo se imprima */
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;

            margin: 0;
            padding: 0;
        }

        @page {
            size: letter portrait; /* Puedes cambiar a A4 u otro tamaño si es necesario */
            margin: 0;
        }

        .contenido {
            margin-top: 450px; /* Ajusta para posicionar el texto */
            text-align: center;
            color: #333;
        }
        .nombre {
            font-size: 40px;
            font-weight: bold;
            margin-top: 40px;
        }
        .detalle {
            margin-top: 40px;
            font-size: 21px;
            width: 70%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="contenido">
        <div class="nombre">
            <strong> {{ $nombre }} </strong>
        </div>
        <div class="detalle">
            Por haber participado en el curso titulado "<strong>{{ $curso }}</strong>" con número de registro 
            <strong>{{ $N_registro }}</strong>, realizado en el Instituto Tecnológico de Tizimín, del 
            <strong>{{ $fecha_inicio }}</strong> al <strong>{{ $fecha_final }}</strong> de enero de 2025, con una duración de 
            <strong>{{ $horas }}</strong> horas.
        </div>
    </div>
</body>
</html>