window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message);
});
