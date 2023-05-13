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
        task: {},
        editModal: false,
        setData(task) {
            this.task = task;
            this.openEdit();
            this.$nextTick(() => {
                this.$refs.judul.value = task.judul;
                this.$refs.deskripsi.value = task.deskripsi;
                this.$refs.tanggal.value = task.tanggal;
            });
        },
        openEdit() {
            dispatchEvent(new CustomEvent('edit-task', { detail: task }));
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
        toggleEditModal() {
            this.editModal = !this.editModal;
        },
        editTask(taskId) {
            const judul = this.$refs.judul.value;
            const deskripsi = this.$refs.deskripsi.value;
            const tanggal = this.$refs.tanggal.value;

            fetch(`./templates/todo.php=${taskId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    judul,
                    deskripsi,
                    tanggal,
                }),
            })
                .then(response => {
                    if (response.ok) {
                        // Do something on success
                        console.log('Task updated successfully');
                        this.closeEditModal();
                    } else {
                        // Do something on error
                        console.error('Error updating task');
                        this.closeEditModal();
                    }
                })
                .catch(error => {
                    // Handle network errors
                    console.error('Network error', error);
                });
        },
    }
}


/*function hapusDialog() {
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
        confirmedHapus(id) {
            fetch('./funcs/delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'id=' + id
            })
                .then(response => {
                    if (response.ok) {
                        // remove task from view if server confirms deleteion
                        var taskCard = document.getElementById('task-' + id);
                        taskCard.parentNode.removeChild(taskCard);
                        this.closeHapusModal();
                    }
                })
                .catch(error => console.error(error));
        }
    }
}*/

function hapusTask(id) {
    if (confirm("Are you sure you want to delete this task?")) {
        // send AJAX request to delete task from database
        fetch('./funcs/delete.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'id=' + id
        })
            .then(response => {
                if (response.ok) {

                    // remove task from view if server confirms deleteion
                    var taskCard = document.getElementById('task-' + id);
                    taskCard.parentNode.removeChild(taskCard);

                    // display success message
                    alert("Task successfully deleted!");
                }
            })
            .catch(error => console.error(error));
    }
}
