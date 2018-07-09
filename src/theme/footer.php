<footer>
    <section class="address">
        <address>
        Tronio Reb s.r.o.<br>
        Měnín 561<br>
        664 57 Měnín<br>
        IČ: 037 39 881<br>
        DIČ: CZ03739881
        </address>
        <?= file_get_contents(get_template_directory() . '/img/logo.svg'); ?>
    </section>
    <section class="contact">
        <ul>
            <li>+420 797 970 413</li>
            <li><a href="mailto:info@cisteni-klimatizace-brno.cz">info@cisteni-klimatizace-brno.cz</a></li>
        </ul>
    </section>
    <section class="social">
        <ul>
            <li><a href="#"><?= file_get_contents(get_template_directory() . '/img/facebook.svg'); ?></a></li>
            <li><a href="#"><?= file_get_contents(get_template_directory() . '/img/instagram.svg'); ?></a></li>
        </ul>
    </section>
</footer>
<a name="kontakt"></a>
<?php wp_footer(); ?>
</body>
</html>
