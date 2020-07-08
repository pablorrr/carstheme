 <footer id="footer-container">
    <div class="pos-center">
        <nav>
            <?php wp_nav_menu( array( 'theme_location' => 'footer-menu'));?>
        </nav>
		<section class="menufooter">
             <h2>Samochody</h2>
					<br>
                    <ul>
                        <?php
							$cars_args = new WP_Query(array(
								'post_type' => 'samochody',
								'posts_per_page' => 3
							));
							
							while($cars_args->have_posts()): $cars_args->the_post();						
						?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
                    </ul>
         </section>
		
                
          <section class="menufooter">
                    <h2>Motory</h2>
					<br>
                    <ul>
                        <?php
							 $motor_args = new WP_Query(array(
								'post_type' => 'motory',
								'posts_per_page' => 3
							));
							
							while( $motor_args->have_posts()):  $motor_args->the_post();						
						?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
                    </ul>
                </section>
				      

               
			<section class="menufooter">
				<h2>Kontakt</h2>
				<br>
				<ul>
					<li>tel.:000-000-111</li>
					<li>email:jakisemail@io.pl</li>
				</ul>
			</section>
				
            </div>
			
			<p style="margin-right:55px;margin-top:45px;">
                    Copyright &copy; <?php echo date( 'Y' ); ?> <!--wyswietlenie roku-->
                    <a href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php bloginfo( 'name' ); ?><!--odnosnik bedacy nazwa bloga szablonu-->
                    </a>
            </p>
</footer> <!-- #footer-container - koniec -->
     

	  

<?php 
    // Zamknięcie WordPressa przed zamknięciem elementu body
    wp_footer();?>

</body>

</html>