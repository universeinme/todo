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

/*function editDialog() {
    return {
        task: {},
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
        toggleEditModal() {
            this.editModal = !this.editModal;
        },
        editTask(id) {
            // Get the task data from the server using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    // Parse the JSON response
                    var task = JSON.parse(this.responseText);

                    // Populate the modal form with the task data
                    document.getElementById('task-id').value = task.id;
                    document.getElementById('task-title').value = task.judul;
                    document.getElementById('task-description').value = task.deskripsi;
                    document.getElementById('task-date').value = task.tgl_tempo;

                    this.openEdit();
                }
            };
            xhr.open('GET', 'pilih_task.php?id=' + id, true);
            xhr.send();
        }
    }
}*/

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

function editTask(id) {

	// Get the task data from the server using AJAX
	var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
		if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
			// Parse the JSON response
			var task = JSON.parse(this.responseText);

			// Populate the modal form with the task data
			document.getElementById('task-id').value = task.id;
			document.getElementById('task-title').value = task.judul;
			document.getElementById('task-description').value = task.deskripsi;
			document.getElementById('task-date').value = task.tgl_tempo;

		}
	};
	xhr.open('GET', './funcs/pilih_task.php?id=' + id, true);
	xhr.send();
}

// Show the modal dialog
var modal = document.getElementById('edit-modal');

// Open modal
var openModal = document.querySelector('#open-modal');
openModal.addEventListener('click', () => {
	modal.classList.remove('hidden');
});

// Close modal
const closeModal = document.getElementById('close-modal');
closeModal.addEventListener('click', () => {
	modal.classList.add('hidden');
});

// Cancel modal
const cancelModal = document.getElementById('cancel-modal');
cancelModal.addEventListener('click', () => {
	modal.classList.add('hidden');
});

// Close modal on overlay click
modal.addEventListener('click', (e) => {
	if (e.target === modal) {
		modal.classList.add('hidden');
	}
});