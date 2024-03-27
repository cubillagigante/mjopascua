<head>
    <link rel="shortcut icon" href="../../public/images/default/logo-ico.ico">
    <title>MJO - PASCUA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../public/css/tailwin.css">
    <link rel="stylesheet" href="../../webfont/tabler-icons.css">
    <script src="../../script/npm/qrcode.min.js"></script>
    <script src="../../script/npm/jquery.js"></script>
    <script src="../../node_modules/html5-qrcode/html5-qrcode.min.js"></script>
    <style type="text/css">

    .btn {
        background-color: rgba(0, 0, 0, 0.25);

    }

    .btn:hover {
        background-color: rgba(52, 47, 47, 0.25);
        cursor: pointer;
    }

    .ti {
        font-size: 1.25rem;
    }

    .ti-user-circle,
    .ti-puzzle,
    .ti-sunset-2,
    .ti-circle-check,
    .ti-exclamation-circle,
    .ti-arrow-big-right-filled {
        font-size: 6rem;
    }

    .ti-circle-check-filled,
    .ti-xbox-x {
        font-size: 10rem;
    }

    .content-input input,
    .content-select select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
    }

    .content-input input {
        visibility: hidden;
        position: absolute;
        right: 0;
    }

    .content-input {
        position: relative;
        margin-bottom: 30px;
        padding: 5px 0 5px 60px;
        /* Damos un padding de 60px para posicionar 
        el elemento <i> en este espacio*/
        display: block;
    }

    /* Estas reglas se aplicarán a todos las elementos i 
después de cualquier input*/
    .content-input input+i {
        background: #f0f0f0;
        border: 2px solid rgba(0, 0, 0, 0.2);
        position: absolute;
        left: 0;
        top: 0;
    }

    /* Estas reglas se aplicarán a todos los i despues 
de un input de tipo checkbox*/
    .content-input input[type=checkbox]+i {
        width: 52px;
        height: 30px;
        border-radius: 15px;
    }

    /*
Creamos el círculo que aparece encima de los checkbox
con la etqieta before. Importante aunque no haya contenido
debemos poner definir este valor.
*/
    .content-input input[type=checkbox]+i:before {
        content: '';
        /* No hay contenido */
        width: 26px;
        height: 26px;
        background: #fff;
        border-radius: 50%;
        position: absolute;
        z-index: 1;
        left: 0px;
        top: 0px;
        -webkit-box-shadow: 3px 0 3px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 3px 0 3px 0 rgba(0, 0, 0, 0.2);
    }

    .content-input input[type=checkbox]:checked+i:before {
        left: 22px;
        -webkit-box-shadow: -3px 0 3px 0 rgba(0, 0, 0, 0.2);
        box-shadow: 3px 0 -3px 0 rgba(0, 0, 0, 0.2);
    }

    .content-input input[type=checkbox]:checked+i {
        background: #2AC176;
    }

    .content-input input[type=checkbox]+i:after {
        content: '';
        position: absolute;
        font-size: 10px;
        color: rgba(255, 255, 255, 0.6);
        top: 8px;
        left: 4px;
        opacity: 0
            /* Ocultamos este elemento */
        ;
        transition: all 0.25s ease 0.25s;
    }

    /* Cuando esté checkeado cambiamos la opacidad a 1 y lo mostramos */
    .content-input input[type=checkbox]:checked+i:after {
        opacity: 1;
    }
    </style>
</head>