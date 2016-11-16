/**
 * Traitement d'affichage d'une liste d'éléments selon paramètres envoyés en GET
 * @param urlAjax - URL où faire la requete en Ajax
 * @param optionsRequestAjax - object - paramètres optionel pour ajouter des données à envoyer en GET
 */
function tableList(urlAjax, optionsRequestAjax) {
    var search = $('.out-table-list #search input[type=search]').val();
    var optionsDataAjax =  (optionsRequestAjax != undefined) ? optionsRequestAjax : 'NULL';
    var orderbyAndOrderDataAjax;

    var defaultPaginationP = 1;
    var defaultPaginationPP = 10;

    getList(urlAjax, defaultPaginationP, defaultPaginationPP, search, optionsDataAjax);

    /**
     * Pour éventuellement ajouter un orderby et un order aux données à envoyer en GET
     */
    $('.out-table-list').off().on('click', '.table-list th', function(){
        var orderby = $(this).attr('data-orderby');
        var order;

        if (orderby != undefined) {
            if ($(this).attr('data-order') == undefined) {
                $(this).attr('data-order', 'ASC');
            } else if ($(this).attr('data-order') == 'ASC') {
                $(this).attr('data-order', 'DESC');
            } else if ($(this).attr('data-order') == 'DESC') {
                $(this).attr('data-order', 'ASC');
            }

            order = $(this).attr('data-order');

            var orderbyAndOrder = {
                'orderby': orderby,
                'order': order
            };

            var paginationP = $('.out-table-list .pagination-active').html();
            var paginationPP = $('.out-table-list .per-page-render option:selected').val();
            search = $('.out-table-list #search input[type=search]').val();
            orderbyAndOrderDataAjax = (orderbyAndOrder != undefined) ? orderbyAndOrder : 'NULL';

            var paginationPSend = (paginationP != undefined) ? paginationP : defaultPaginationP;
            var paginationPPSend = (paginationPP != undefined) ? paginationPP : defaultPaginationPP;

            getList(urlAjax, paginationPSend, paginationPPSend, search, optionsDataAjax, orderbyAndOrderDataAjax);
        }
    });

    /**
     * Si search
     */
    $('.out-table-list #search').off().submit(function(e){
        e.preventDefault();

        var paginationPP = $('.out-table-list .per-page-render option:selected').val();
        search = $('.out-table-list #search input[type=search]').val();

        var paginationPPSend = (paginationPP != undefined) ? paginationPP : defaultPaginationPP;

        getList(urlAjax, defaultPaginationP, paginationPPSend, search, optionsDataAjax, orderbyAndOrderDataAjax);
    });

    /**
     * Pagination
     */
    $('.out-table-list .pagination-render').off().on('click', '.bloc-pagination a', function(e){
        e.preventDefault();

        if ($(this).attr('rel') == 'next') {
            var paginationP = $('.out-table-list .pagination-active').html();
            paginationP++;
        } else if ($(this).attr('rel') == 'prev') {
            var paginationP = $('.out-table-list .pagination-active').html();
            paginationP--;
        } else {
            var paginationP = $(this).html();
        }

        var paginationPP = $('.out-table-list select#nb-perpage option:selected').val();
        search = $('.out-table-list #search input[type=search]').val();

        var paginationPPSend = (paginationPP != undefined) ? paginationPP : defaultPaginationPP;

        getList(urlAjax, paginationP, paginationPPSend, search, optionsDataAjax, orderbyAndOrderDataAjax);
    });

    /**
     * Par page de la Pagination
     */
    $('.out-table-list .per-page-render').off().on('change', 'select#nb-perpage', function(){
        var paginationP = $('.out-table-list .pagination-active').html();
        var paginationPP = $(this).val();
        search = $('.out-table-list #search input[type=search]').val();

        var paginationPSend = (paginationP != undefined) ? paginationP : defaultPaginationP;

        getList(urlAjax, paginationPSend, paginationPP, search, optionsDataAjax, orderbyAndOrderDataAjax);
    });

}


/**
 * Afficher une liste d'éléments selon paramètres envoyés en GET
 * @param urlAjax - URL où faire la requete en Ajax
 * @param paginationP - page en cours
 * @param paginationPP - nombre d'éléments par page
 * @param search - si search
 * @param optionsDataAjax - object - pour éventuellement ajouter des données à envoyer en GET
 * @param orderbyAndOrderDataAjax - objet - pour éventuellement ajouter un orderby et order aux données à envoyer en GET
 */
function getList(urlAjax, paginationP, paginationPP, search, optionsDataAjax, orderbyAndOrderDataAjax) {
    var addData = '';

    if (orderbyAndOrderDataAjax != 'NULL' && orderbyAndOrderDataAjax != undefined) {
        for (var optionOrderbyAndOrder in orderbyAndOrderDataAjax) {
            addData += optionOrderbyAndOrder+'='+orderbyAndOrderDataAjax[optionOrderbyAndOrder]+'&';
        }
    }

    if (optionsDataAjax != 'NULL') {
        for (var option in optionsDataAjax) {
            addData += option+'='+optionsDataAjax[option]+'&';

            if (optionsDataAjax[option] != 'all') {
                var ifAddDataOtherOrderby = '';
            }
        }
    }

    addData += (search != '') ? 'search='+search+'&' : '';

    $.ajax({
        type: 'GET',
        url: urlAjax,
        data: addData+'page='+paginationP+'&pp='+paginationPP,
        success: function(data, textStatus, jqXHR){            
            $('.out-table-list .table-list-render').empty().append(data.table_list);

            if (data.pagination != undefined) {
                $('.out-table-list .pagination-render').empty().append(data.pagination);
            }

            if (data.per_page != undefined) {
                $('.out-table-list .per-page-render').empty().append(data.per_page);
            }

            if (data.count != undefined) {
                $('.out-table-list .bottom-table-list .count').empty();
                var s = (data.count > 1) ? 's' : '';
                var elementsFind =  (search !== '' || ifAddDataOtherOrderby != undefined) ? ' trouvé'+s : '';
                $('.out-table-list .bottom-table-list').append('<span class="count">'+data.count+' element'+s+''+elementsFind+'</span>');
            }

            $('.out-table-list .table-list th[data-orderby]').append('<span class="icon-without-order icon-without-order-2"></span>');

            if (orderbyAndOrderDataAjax != 'NULL' && orderbyAndOrderDataAjax != undefined) {
                $('.out-table-list .table-list th[data-orderby='+orderbyAndOrderDataAjax.orderby+'] .icon-without-order').remove();

                $('.out-table-list .table-list th[data-orderby='+orderbyAndOrderDataAjax.orderby+']')
                    .attr('data-order', orderbyAndOrderDataAjax.order)
                    .append('<span class="icon-order"></span>');

                if (orderbyAndOrderDataAjax.order == 'DESC') {
                    $('.out-table-list .table-list th .icon-order').addClass('icon-order-desc');
                }
            } else {
                if (data.orderby != undefined) {
                    $('.out-table-list .table-list th[data-orderby='+data.orderby['orderby']+'] .icon-without-order').remove();
                    
                    $('.out-table-list .table-list th[data-orderby='+data.orderby['orderby']+']')
                        .attr('data-order', data.orderby['order'])
                        .append('<span class="icon-order"></span>');
                }
            }
        },
        error: function(jqXHR, textStatus, errorThrown) { },
        complete : function(jqXHR, textStatus) { }
    });
}