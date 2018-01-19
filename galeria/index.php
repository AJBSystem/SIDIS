
<?php
require_once 'class/imagenes.php';

$obj = new Imagenes();

$cantImg = "3"; //Noticias por página

if (isset($_GET["pos"]))
    $inicio = $_GET["pos"];
else
    $inicio = 0;

$proxima = $inicio + $cantImg;

$datos = $obj->getImagenes($inicio, $cantImg);

$total = $obj->TotalImagenes();

$cantPag = $total / $cantImg;

if (isset($_GET["pos"]) and $_GET["pos"] > 0)
    $actual = $_GET["pos"] / $cantImg + 1;
else
    $actual = 1;
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Mini Galería</title>
        <meta charset="UTF-8">
        <link href="css/estilos.css" type="text/css" rel="stylesheet" />
        <link href="images/favicon.png" rel="icon" type="image/vnd.microsoft.icon"/>

        <!-- Rel next y prev -->



        <!-- Rel next y prev -->

        <script src="js/jquery-1.11.0.min.js"></script>
        <!-- Add mousewheel plugin (this is optional) -->
        <script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>
        <script type="text/javascript" src="js/funciones.js"></script>
        <!-- Add fancyBox main JS and CSS files -->
        <script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.5"></script>
        <link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.5" media="screen" />

        <!-- Add Button helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

        <!-- Add Thumbnail helper (this is optional) -->
        <link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

        <!-- Add Media helper (this is optional) -->
        <script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                /*
                 *  Simple image gallery. Uses default settings
                 */

                $('.fancybox').fancybox();

                /*
                 *  Different effects
                 */

                // Change title type, overlay closing speed
                $(".fancybox-effects-a").fancybox({
                    helpers: {
                        title: {
                            type: 'outside'
                        },
                        overlay: {
                            speedOut: 0
                        }
                    }
                });

                /*
                 *  Button helper. Disable animations, hide close button, change title type and content
                 */

                $('.fancybox-buttons').fancybox({
                    openEffect: 'none',
                    closeEffect: 'none',
                    prevEffect: 'none',
                    nextEffect: 'none',
                    closeBtn: false,
                    helpers: {
                        title: {
                            type: 'inside'
                        },
                        buttons: {}
                    },
                    afterLoad: function() {
                        this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
                    }
                });


                /*
                 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
                 */

                $('.fancybox-thumbs').fancybox({
                    prevEffect: 'none',
                    nextEffect: 'none',
                    closeBtn: false,
                    arrows: false,
                    nextClick: true,
                    helpers: {
                        thumbs: {
                            width: 50,
                            height: 50
                        }
                    }
                });

                /*
                 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
                 */
                $('.fancybox-media')
                        .attr('rel', 'media-gallery')
                        .fancybox({
                            openEffect: 'none',
                            closeEffect: 'none',
                            prevEffect: 'none',
                            nextEffect: 'none',
                            arrows: false,
                            helpers: {
                                media: {},
                                buttons: {}
                            }
                        });

                /*
                 *  Open manually
                 */

                $("#fancybox-manual-a").click(function() {
                    $.fancybox.open('1_b.jpg');
                });

            });
        </script>
        <style type="text/css">
            .fancybox-custom .fancybox-skin {
                box-shadow: 0 0 50px #222;
            }

        </style>

    </head>
    <body>
        <div id="wrapper">
            <header>
                <h1>Mi Galería</h1>
                <nav>
                    <ul>
                        <li class="activo">
                            <a href="subir.php">Agregar imagen</a>
                        </li>

                    </ul>
                </nav>
            </header>
            <div id="contenido">

                <?php
                foreach ($datos as $d) {
                    ?>
                    <article>
                        <div class="tituloPost">
                            <?php echo $d['titulo']; ?>
                            <a href="javascript:void(0);" onclick="eliminiar('delImagen.php', '<?php echo $d["idimagen"]; ?>')" title="Eliminar imagen">[ X ]</a>
                        </div>

                        <a class="fancybox" href="upload/<?php echo $d['imagen']; ?>" data-fancybox-group="gallery" title="<?php echo $d['titulo']; ?>">
                            <img src="upload/tumb_<?php echo $d["imagen"]; ?>"/>
                        </a>


                    </article>
                    <?php
                }
                ?>

                <!-- ******************************************************** -->
                <div style="clear:both; height:1px;font-size:0px; line-height: 0px;"></div>
                <!-- Fin #paginacion -->
                <div id="paginacion">
                    <?php
                    if ($inicio == 0) {
                        ?>
                        <span class="negrita">Anterior</span>
                        <?php
                    } else {
                        ?>
                        <a href="?pos=<?php echo $inicio - $cantImg; ?>">Anterior</a>
                        <?php
                    }
                    ?>

                    <?php
                    $a = 0;
                    $ultimaPag = 0;

                    if ($actual > 6) {
                        echo "...";
                    }

                    for ($i = 1; $i <= $cantPag; $i++) {
                        if ($i >= $actual - 5 && $i <= $actual + 5) {
                            if ($i == $actual) {
                                ?>	
                                <span> <?php echo $i; ?> </span>
                                <?php
                            } else {
                                ?>
                                <a href="?pos=<?php echo $a; ?>"> <?php echo $i . " "; ?> </a>
                                <?php
                            }
                        }
                        $a+=$cantImg;
                        $ultimaPag++;
                    }

                    $final = $ultimaPag * $cantImg;
                    $resto = $total - $final;

                    if ($final < $total) {
                        $ultimaPag++;

                        if ($actual == $ultimaPag) {
                            ?>
                            <span><?php echo $ultimaPag; ?></span>
                            <?php
                        } else {
                            ?>
                            <a href="?pos=<?php echo $final; ?>"><?php echo $ultimaPag; ?></a>
                            <?php
                        }
                    }

                    if ($ultimaPag - $actual > 5) {
                        echo "...";
                    }
                    ?>

                    <?php
                    if ($ultimaPag == $actual) {
                        ?>
                        <span>Siguiente</span>
                        <?php
                    } else {
                        ?>
                        <a href="?pos=<?php echo $inicio + $cantImg; ?>">Siguiente</a>
                        <?php
                    }
                    ?>

                </div>
                <!-- Fin #paginacion -->
                <!-- ****************************************************** -->
                <!-- Fin #post -->

            </div>	<!-- Fin #contenido -->

        </div>	<!-- Fin #wrapper -->
    </body>
</html>
