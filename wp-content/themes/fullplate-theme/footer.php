<footer class="site-footer">
    <div class="footer-content">
        <div class="footer-logo">
            <a href="<?php echo site_url('/'); ?>">
                <img src="<?php echo get_theme_file_uri('/images/fullplate-logo-offwhite.svg'); ?>" alt="Full Plate Logo">
            </a>
        </div>

        <nav class="footer-column" aria-label="Good to know">
            <h3>GOOD TO KNOW</h3>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of use</a></li>
                <li><a href="#">Cookie Policy</a></li>
            </ul>
        </nav>
        <nav class="footer-column" aria-label="Explore">
            <h3>EXPLORE</h3>
            <ul>
                <li><a href="<?php echo get_post_type_archive_link('recipe'); ?>">Recipes</a></li>
                <li><a href="<?php echo get_post_type_archive_link('story'); ?>">Stories</a></li>
                <li><a href="<?php echo get_post_type_archive_link('tool'); ?>">Tools</a></li>
                <li><a href="<?php echo site_url('/about'); ?>">About</a></li>
            </ul>
        </nav>

        <div class="footer-right">
            <div class="footer-socials">
                <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook"></i></a>
            </div>
            <p>&copy; 2026 Full Plate</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>