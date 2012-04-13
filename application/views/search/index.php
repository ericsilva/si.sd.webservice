<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Droid+Sans" />
        <link rel="stylesheet" type="text/css" href="public/css/application.css" />
        <script type="text/javascript" src="http://jqueryjs.googlecode.com/files/jquery-1.3.js"></script>
        <script type="text/javascript" src="public/js/application.js"></script>
        <title>Google Books</title>
    </head>
    <body>
        <div class="main">
            <div class="header">
              Google Books
            </div>

            <div class="body">
                <form action="" method="get">
                    <input type="hidden" name="listBooks" value="" />
                    <input type="text" name="q" id="q" value="" />
                </form>
                <div id="result">
                <?php
                if(isset($params['books'])):
                    foreach($params['books'] as $book):
                        SearchView::renderBook($book);
                    endforeach;
                endif;
                ?>
                </div>
            </div>

            <div class="footer"></div>
        </div>
    </body>
    <script type="text/javascript">
    App.init();
    </script>
</html>