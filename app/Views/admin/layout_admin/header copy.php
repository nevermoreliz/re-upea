<div class="page-title-container">
    <div class="row">
        <!-- Title Start -->
        <div class="col-12 col-md-7">
            <span class="align-middle text-muted d-inline-block lh-1 pb-2 pt-2 text-small">Dashboard</span>
            <?php $nombre = ucfirst(strtolower(session('nombre'))); ?>
            <?php $paterno = ucfirst(strtolower(session('paterno'))); ?>
            <?php $materno = ucfirst(strtolower(session('materno'))); ?>
            <?php $full =  $nombre . ' ' . $paterno . ' ' . $materno; ?>
            <?php $full =  (!is_null($paterno) || !empty($paterno)) ? $nombre . ' ' . $paterno : $nombre . ' ' . $materno; ?>
            <?php
            date_default_timezone_set('America/La_Paz');
            $today = getdate();
            $hora = $today["hours"];
            if ($hora < 6) {
                $saludo =  "Hoy has madrugado mucho...";
            } elseif ($hora < 12) {
                $saludo =  "Buenos días";
            } elseif ($hora <= 18) {
                $saludo =  "Buenas Tardes";
            } else {
                $saludo =  "Buenas Noches";
            }
            ?>
            <h1 class="mb-0 pb-0 display-4" id="title"><?= $saludo; ?>, <?= $full; ?>!</h1>
        </div>
        <!-- Title End -->
    </div>
</div>