$(document).ready(function() {

    let txt = "Selamat Datang di Stokis HNI-HPAI --- ";
    let kecepatan = 150;

    function bergerak() {
        document.title = txt;
        txt = txt.substring(1, txt.length) + txt.charAt(0);
        setTimeout(bergerak, kecepatan);
    }
    bergerak();

    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove(); 
        });
    }, 4000);

    const body = $('body');
    const modeBtn = $('#mode-gelap');

    function updateModeButton(isDark) {
        if (isDark) {
            modeBtn.html('<i class="fas fa-sun"></i> Mode Terang');
        } else {
            modeBtn.html('<i class="fas fa-moon"></i> Mode Gelap');
        }
    }

    if (localStorage.getItem('mode-gelap') === 'aktif') {
        body.addClass('mode-gelap');
        updateModeButton(true);
    } else {
        updateModeButton(false);
    }

    modeBtn.on('click', function(e) {
        e.preventDefault();
        body.toggleClass('mode-gelap');
        const isDarkMode = body.hasClass('mode-gelap');
        if (isDarkMode) {
            localStorage.setItem('mode-gelap', 'aktif');
            updateModeButton(true);
        } else {
            localStorage.setItem('mode-gelap', 'tidak aktif');
            updateModeButton(false);
        }
    });

    $('.form-checkbox').on('click', function() {
        const passwordInput = $('.form-password');
        passwordInput.attr('type', $(this).is(':checked') ? 'text' : 'password');
    });

    $('#togglePassword').on('click', function() {
        const passwordField = $('#passwordField');
        const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
        passwordField.attr('type', type);
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
    });

    const inputQty = $('#kuantitas');
    const inputHarga = $('#harga');
    const displayTotal = $('#display-total');
    const hiddenTotal = $('#total');

    function calculateTotal() {
        const qty = parseFloat(inputQty.val()) || 0;
        const harga = parseFloat(inputHarga.val()) || 0;
        const total = qty * harga;

        hiddenTotal.val(total);
        displayTotal.text(new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            maximumFractionDigits: 0
        }).format(total));
    }

    if (inputQty.length) {
        inputQty.on('input change', calculateTotal);
        calculateTotal();
    }
});