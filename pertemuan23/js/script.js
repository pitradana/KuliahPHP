$(document).ready(function() {
  // hilangkan tombol Cari
  $('#tombol-cari').hide();
  $('.loader').hide();

  // membuat event ketika keyword ditulis
  $('#keyword').on('keyup', function() {
    // memunculkan icon loading
    $('.loader').show();

    // ajax menggunakan load
    // $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());

    $.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {

      $('#container').html(data);

      $('.loader').hide();

    });
  });
});
