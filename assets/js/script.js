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

function hapusTask(id) {
    if (confirm("Are you sure you want to delete this task?")) {
        // send AJAX request to delete task from database
        var xhr = new XMLHttpRequest();
        xhr.open('POST', './funcs/delete.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                // remove task from view if server confirms deletion
                var taskCard = document.getElementById('task-' + id);
                taskCard.parentNode.removeChild(taskCard);
            }
        };
        xhr.send('id=' + id);
    }
}