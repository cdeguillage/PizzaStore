// Redirection d'une page après timer défini
function redirection_timer(page, timing) {

    setTimeout(function () {
        window.location = page;
    }, timing);

    return page;

}
