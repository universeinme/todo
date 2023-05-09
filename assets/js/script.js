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

function createDialog() {
    return {
        createModal: false,
        openCreate() {
            this.createModal = true;
            document.body.classList.add("modal-open");
        },
        closeCreateModal() {
            this.createModal = false;
            document.body.classList.remove("modal-open");
        },
        isOpenCreateModal() {
            return this.createModal === true
        },
    }
}

function editDialog() {
    return {
        editModal: false,
        openEdit() {
            this.editModal = true;
            document.body.classList.add("modal-open");
        },
        closeEditModal() {
            this.editModal = false;
            document.body.classList.remove("modal-open");
        },
        isOpenEditModal() {
            return this.editModal === true
        },
    }
}

function hapusDialog() {
    return {
        hapusModal: false,
        openHapus() {
            this.editModal = true;
            document.body.classList.add("modal-open");
        },
        closeHapusModal() {
            this.hapusModal = false;
            document.body.classList.remove("modal-open");
        },
        isOpenHapusModal() {
            return this.hapusModal === true
        },
    }
}
