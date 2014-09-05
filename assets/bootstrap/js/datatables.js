$.extend( true, $.fn.dataTable.defaults, {
	"sDom": "<'row'<'col-6'f><'col-6'l>r>t<'row'<'col-6'i><'col-6'p>>",
	"sPaginationType": "bootstrap"
} );

$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				    '<ul class="pagination">'+
        '<li class="prev"><a href="#"><i class="icon-double-angle-left"></i> '+oLang.sPrevious+'</a></li>'+
        '<li class="next"><a href="#">'+oLang.sNext+' <i class="icon-double-angle-right"></i></a></li>'+
    '</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},

	}
} );

