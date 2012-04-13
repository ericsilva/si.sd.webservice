<div class="livro">
    <div class="titulo">
        <?php echo $book->getTitulo(); ?>
        <?php echo $book->getSubTitulo(); ?>
        <a href="<?php echo $book->getLink(); ?>" target="_blank">(Ver livro)</a>
        <br />

        Ano de publica&ccedil;&atilde;o: <?php echo $book->getAnoPublicacao(); ?>
        <br />
        P&aacute;ginas: <?php echo $book->getNumPaginas(); ?>
        <br />

        <img src="<?php echo $book->getThumbnail(); ?>" border="0"/>
    </div>
    <div class="autores">
        <span></span>
    </div>
    <div class="descricao"><?php echo $book->getDescricao(); ?></div>
    <div class="categorias">
        <span></span>
    </div>
</div>
