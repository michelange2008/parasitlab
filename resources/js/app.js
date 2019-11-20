require('./bootstrap');

require( 'datatables.net-dt' );
require( 'datatables.net-fixedheader-dt' );
require( 'datatables.net-responsive-dt' );

$(document).ready(function() {

  $('[data-toggle="tooltip"]').tooltip();

  $('#table-users').dataTable({
    responsive :true,
    fixedHeader: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
    }
  });

  $('#table-eleveurs').dataTable({
    responsive :true,
    fixedHeader: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
    }
  });

  $('#table-demandes').dataTable({
    responsive :true,
    fixedHeader: true,
    "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/French.json"
    }
  });

  $('#list-tab-eleveur a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
});

  Date.prototype.toDateInputValue = (function() {
    var local = new Date(this);
    local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
    return local.toJSON().slice(0,10);
  });
$('#reception').val(new Date().toDateInputValue());
});
