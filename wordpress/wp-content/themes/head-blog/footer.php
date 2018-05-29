</div><!-- end main-container -->
</div><!-- end page-area -->
<?php if ( is_active_sidebar( 'head-blog-footer-area' ) ) { ?>
	<div id="content-footer-section" class="container-fluid clearfix">
		<div class="container">
			<?php dynamic_sidebar( 'head-blog-footer-area' ) ?>
		</div>
	</div>
<?php } ?>
<?php do_action( 'head_blog_before_footer' ); ?>
<footer id="colophon" class="footer-credits container-fluid">
	<div class="container footer">
		Site réalisé sous <a href="https://wordpress.org/">WordPress</a> |
		<a href="http://localhost/stage_Petanque_Radounaude/Site_Petanque_Radounaude/wordpress/index.php/politique-de-confidentialite/?preview_id=385&preview_nonce=3bc86d1b0a&_thumbnail_id=-1&preview=true">Politique de confidentialité</a> |
		Icones créée par <a href="https://www.flaticon.com/authors/zurb" title="Zurb">Zurb</a> de <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> est autorisé par <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>

	</div>
</footer>
<?php do_action( 'head_blog_after_footer' ); ?>
<?php wp_footer(); ?>

</body>
</html>
