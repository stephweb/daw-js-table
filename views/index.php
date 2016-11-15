<?php // Cette vue est la vue des listing ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="assets/css.css">
</head>
<body>
    <div class="out-table-list">
        <div class="top-table-list">
            <div class="per-page-render"></div>

            <form id="search" action="#">
                <input type="search" name="search" placeholder="Rechercher..." value="">
            </form>
            
            <div style="clear: both;"></div>
        </div>

        <div class="table-list-render"></div>

        <div class="bottom-table-list">
            <div class="pagination-render"></div>
        </div>
    </div>
    
    <script type="text/javascript" src="assets/jquery-1.12.4.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            /**
             * Le 1er param�tre est obligatoire (string - URL o� faire la requ�te Ajax)
             * Le 2�me param�tres est optionel (object - �ventuels param�tres � ajouter aux donn�es � envoyer en GET en Ajax)
             */
            tableList('articles/index_with_ajax'/*, getOptions()*/);

            /**
             * En option, on peut ajouter des param�tres aux donn�es � envoyer en GET en Ajax
             */
            /*function getOptions() {
                var filter1 = $('input[name=filter1]:checked').val();
                var filter2 = $('input[name=filter2]:checked').val();

                var optionsRequestAjax = {
                    'filter1': filter1,
                    'filter2': filter2
                };

                return optionsRequestAjax;
            }*/
        });
    </script>
    <script type="text/javascript" src="assets/js.js"></script>
</body>
</html>