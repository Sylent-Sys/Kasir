window.addEventListener('alert', event => {
    toastr[event.detail.type](event.detail.message);
});
function setRoleUser(input) {
    let id = parseInt($(input).attr('data-id'));
    let role = parseInt($(input).val());
    Livewire.emit('setRoleUser', id, role);
}
