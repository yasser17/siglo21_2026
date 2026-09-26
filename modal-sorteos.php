<script>
    jQuery(document).ready(function($) {
        $("#modal-sorteos").modal('show');
    });
</script>

<div class="modal fade" id="modal-sorteos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
            </button>
            <div class="modal-body">
                <div class="row">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <div class="col-sm-5">
                        <?php the_post_thumbnail( 'medium' ); ?>
                    </div>
                    <div class="col-sm-7">
                    <?php else : ?>
                    <div class="col-sm-12">
                    <?php endif; ?>
                        <p class="pretitle">¡Sorteo!</p>
                        <h3 class="title"><?php the_title(); ?></h3>
                        <div class="description"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>