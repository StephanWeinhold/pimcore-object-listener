<html>
<head>
<title>pimcore object listener</title>
</head>
<body>
    <main>
        <section id="object-container">
            <?php
            foreach ($this->objects as $object) {
                ?>
                <section class="object" 
                         data-oid="<?= $object->getId(); ?>" 
                         data-latest-version="<?= $object->getVersions()[0]->getDate(); ?>"
                >
                <?php
            }
            ?>
        </section>
    </main>
    
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="https://raw.githubusercontent.com/StephanWeinhold/pimcore-object-listener/master/ping.js"></script>
</body>
