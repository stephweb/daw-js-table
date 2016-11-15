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
             * Le 1er paramètre est obligatoire (string - URL où faire la requète Ajax)
             * Le 2ème paramètres est optionel (object - éventuels paramètres à ajouter aux données à envoyer en GET en Ajax)
             */
            tableList('articles/index_with_ajax'/*, getOptions()*/);

            /**
             * En option, on peut ajouter des paramètres aux données à envoyer en GET en Ajax
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