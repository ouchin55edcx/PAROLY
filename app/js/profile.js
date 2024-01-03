document.addEventListener("DOMContentLoaded", function() {
    const editProfileModal = document.getElementById("editProfileModal");

    const editProfileBtn = document.getElementById("editProfileBtn");

    const closeAddPlaylistModalBtn = document.getElementById("cancelAddPlaylistBtn");
    const closeEditProfileModalBtn = document.getElementById("cancelEditProfileBtn");

    const profileUpdateForm = document.getElementById("profileUpdateForm");

    const closeModal = function(modal) {
        modal.style.display = "none";
    };

    const openModal = function(modal) {
        modal.style.display = "block";
    };

    addPlaylistBtn.addEventListener("click", function() {
        openModal(addPlaylistModal);
    });

    editProfileBtn.addEventListener("click", function() {
        let name = document.getElementById("profileName").innerText;
        document.getElementById("newProfileName").value = name;
        openModal(editProfileModal);
    });
    

    closeAddPlaylistModalBtn.addEventListener("click", function() {
        closeModal(addPlaylistModal);
    });

    closeEditProfileModalBtn.addEventListener("click", function() {
        closeModal(editProfileModal);
    });
    

    

    window.addEventListener("click", function(event) {
        if (event.target === addPlaylistModal || event.target === editProfileModal) {
            closeModal(event.target);
        }
    });
});