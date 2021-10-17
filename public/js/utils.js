

function showNotification(colorName, text, placementFrom, placementAlign, animateEnter, animateExit) {
    if (colorName === null || colorName === '') { colorName = 'pastel-danger'; }
    if (text === null || text === '') { text = 'alert'; }
    if (animateEnter === null || animateEnter === '') { animateEnter = 'animated fadeInDown'; }
    if (animateExit === null || animateExit === '') { animateExit = 'animated fadeOutUp'; }
    var allowDismiss = true;

    $.notify({
            message: text
        },
        {
            type: colorName,
            allow_dismiss: allowDismiss,
            newest_on_top: true,
            timer: 1000,
            placement: {
                from: placementFrom,
                align: placementAlign
            },
            animate: {
                enter: animateEnter,
                exit: animateExit
            },
    });
}

function createRatings(drating){
    var rating = ``;
    if (drating != 0){
        if (drating > 0)
            rating = `<span class="fa fa-star checked"></span>`;
        else
            rating = `<span class="fa fa-star"></span>`;
        if (drating > 1)
            rating = `${rating}<span class="fa fa-star checked"></span>`;
        else
            rating = `${rating}<span class="fa fa-star"></span>`;
        if (drating > 2)
            rating = `${rating}<span class="fa fa-star checked"></span>`;
        else
            rating = `${rating}<span class="fa fa-star"></span>`;
        if (drating > 3)
            rating = `${rating}<span class="fa fa-star checked"></span>`;
        else
            rating = `${rating}<span class="fa fa-star"></span>`;
        if (drating > 4)
            rating = `${rating}<span class="fa fa-star checked"></span>`;
        else
            rating = `${rating}<span class="fa fa-star"></span>`;
    }
    return rating;
}
