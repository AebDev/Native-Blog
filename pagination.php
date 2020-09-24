

<nav class="site-pagination">
    <?php
    

    $page_result = $page_query->fetch(PDO::FETCH_ASSOC);

    $total_records = $page_result['count'];

    $total_pages = ceil($total_records / $record_per_page);

    $start_loop = $page;
    $difference = $total_pages - $page;
    if ($difference <= 2) {
        $start_loop = $total_pages - 2;
    }
    $end_loop = $start_loop + 2;


    if ($page > 1) {
        ?>
        <span data-aos="fade-right"><a href="<?= $active_path ?>page=<?= ($page - 1) ?>">Prev Posts</a></span>
    <?php

    } else if ($page == 1) {
        ?>
        <span data-aos="fade-right"><a href="<?= $active_path ?>page=<?= ($page) ?>">Prev Posts</a></span>
    <?php } ?>
    <span data-aos="fade-up" class="page-number">Page <?= ($page) ?> of <?= ($total_pages) ?></span>
    <?php

    if ($page < $end_loop) {
        ?>
        <span data-aos="fade-right"><a href="<?= $active_path ?>page=<?= ($page + 1) ?>">Next Posts</a></span>
    <?php
    } else if ($page == $end_loop) {
        ?>
        <span data-aos="fade-right"><a href="<?= $active_path ?>page=<?= ($page) ?>">Next Posts</a></span>
    <?php

    }
    ?>
</nav>



