
    function ambildata(idx) {
        var xambil = $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            method: "POST",
            url: "detail_barang",
            data: {
                id: idx
            }
        });
        xambil.done(function(data) {
            var mydata = JSON.parse(data);
            
            $("#img-img").attr('src', mydata.pGambar);
            $("#dt_nama_barang").text(mydata.nama_barang);
            $("#dt_harga").text("Rp " + mydata.harga.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "."));
            $("#dt_stok").text(mydata.stok);
            $("#dt_deskripsi").html("<p>" + mydata.deskripsi + "</p>");
            $("#btn-modal-beli").attr("onclick", "beli('" + mydata.id + "')");
            $("#myModal").modal("show");
        });
    }

    function beli(idx) {
        var xbeli = $.ajax({
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            method: "POST",
            url: "beli",
            data: {
                id: idx
            }
        });
        xbeli.done(function(data) {
            $('#jumlah-keranjang').text(data);
            masuk_keranjang();
        });
    }

    function silahkan_login() {
        $('#myModal').modal('hide');
        $('#belumLoginModal').modal('show');
    }

    function masuk_keranjang() {
        $('#myModal').modal('hide');
        swal({
            title: 'Berhasil!',
            text: 'Barang telah dimasukkan kedalam keranjang',
            type: 'success',
            confirmButtonClass: 'btn btn-confirm mt-2'
        });
    }