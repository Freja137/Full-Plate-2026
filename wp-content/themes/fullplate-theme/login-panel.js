// Account popup vindue
// Henter de nødvendige elementer i HTML'en
const userLogin = document.querySelector(".user-login");
const accountPanel = document.querySelector(".account-panel");
const accountOverlay = document.querySelector(".account-overlay");
const closeAccountButton = document.querySelector(".close-account");

// Åbner account-panelet
function openAccountPanel(event) {
    event.preventDefault();
    // Tilføjer open-classen, så panelet vises
    accountPanel.classList.add("open");
    accountOverlay.classList.add("open");
}

// Lukker account-panelet
function closeAccountPanel() {
    accountPanel.classList.remove("open");
    accountOverlay.classList.remove("open");
}

// Åbn med brugerikonet
userLogin.addEventListener("click", openAccountPanel);

// Luk med krydset
closeAccountButton.addEventListener("click", closeAccountPanel);

// Luk ved klik på det mørke overlay
accountOverlay.addEventListener("click", closeAccountPanel);

// Luk ved klik uden for panelet
document.addEventListener("click", function (event) {
    const panelIsOpen = accountPanel.classList.contains("open");
    const clickedInsidePanel = accountPanel.contains(event.target);
    const clickedUserIcon = userLogin.contains(event.target);

    if (panelIsOpen && !clickedInsidePanel && !clickedUserIcon) {
        closeAccountPanel();
    }
});

// Luk med Escape
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        closeAccountPanel();
    }
});