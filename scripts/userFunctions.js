document.getElementById('showAdsUploadForm').addEventListener('click', function() {
    var adsUploadForm = document.getElementById('AdsUploadForm');
    if (adsUploadForm.style.display === 'none') {
        adsUploadForm.style.display = 'block';
    } else {
        adsUploadForm.style.display = 'none';
    }
});
document.addEventListener( "DOMContentLoaded", function() {
    var UpdateUserMobile = document.getElementById("UpdateUserMobile");
    var UpdateUserPassword = document.getElementById("UpdateUserPassword");
    var UpdateUserRePassword = document.getElementById("UpdateUserRePassword");
    UpdateUserMobile.value = "";
    UpdateUserPassword.value = "";
    UpdateUserRePassword.value = "";
});

$('#modifyModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // A gomb, amelyre kattintottak
    var adId = button.data('ad-id'); // A hirdetés azonosítója, amelyet átadtak a gombhoz
    // Az adott hirdetés adatainak betöltése a modalban
    var modal = $(this);
    modal.find('.modal-body').load('modify.php?ad_id=' + adId);
});
// document.getElementById('modifyModal').addEventListener('show.bs.modal', function (event) {
//     var button = event.relatedTarget; // A gomb, amelyre kattintottak
//     var adId = button.getAttribute('data-ad-id'); // A hirdetés azonosítója, amelyet átadtak a gombhoz
//     // Az adott hirdetés adatainak betöltése a modalban
//     var modal = this;
//     var xhr = new XMLHttpRequest();
//     xhr.onload = function () {
//         if (xhr.status === 200) {
//             modal.querySelector('.modal-body').innerHTML = xhr.responseText;
//         }
//     };
//     xhr.open('GET', 'adsUserModify.php?ad_id=' + adId, true);
//     xhr.send();
// });