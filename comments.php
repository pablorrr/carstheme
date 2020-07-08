<div id="comments">
<?php 
    // Czy wpis jest chroniony hasłem?
    if ( post_password_required() ) : ?>
    <p class="nopassword">
        Ten wpis jest chroniony hasłem. Wpisz hasło.
    </p>
</div>
<?php
        // Powrót
        return;
    endif;

    // Sprawdzenie, czy są komentarze
    if ( have_comments() ) : ?>
    <h2 id="comments-title">
        Ten wpis <?php comments_number( 'nie ma komentarzy', 'ma jeden komentarz', 'ma % komentarzy' ); ?>
    </h2><br>


    <ol class="commentlist">
    <?php 
        // Wyświetlanie listy komentarzy
        wp_list_comments();
    ?>
    </ol>

   
<?php endif;?>


<br><div>
<?php 
    // Formularz dodawania komentarzy
    comment_form(); 
?>
</div>
</div>