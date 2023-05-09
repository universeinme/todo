function isDialogOpen() {
    return {
        modal: false,
        open() {
            this.modal = true;
            document.body.classList.add("modal-open");
        },
        close() {
            this.modal = false;
            document.body.classList.remove("modal-open");
        },
        isOpen() {
            return this.modal === true
        },
    }
}

function reassignDialog() {
    return {
        reassignmodal: false,
        openReassign() {
            this.reassignmodal = true;
            document.body.classList.add("modal-open");
        },
        closeReassign() {
            this.reassignmodal = false;
            document.body.classList.remove("modal-open");
        },
        isOpenReassign() {
            return this.reassignmodal === true
        },
    }
}
