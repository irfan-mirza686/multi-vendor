window.addContent = function (btn, creating) {
    $('#spinner').addClass('spinner-border spinner-border-sm');
    $(btn).text(creating);
}
window.removeContent = function (btn, btnVal) {
    $("#spinner").removeClass("spinner-border spinner-border-sm");
    // $(btn).text('');
    $(btn).text(btnVal);
}

window.showMsg = function (msgType, position, msgClass, message, sound) {
    console.log(position)

    Lobibox.notify(msgType, {
        pauseDelayOnHover: true,
        continueDelayOnInactiveTab: false,
        position: position,
        icon: msgClass,
        size: 'mini',
        msg: message,
        sound: sound
    });
}
